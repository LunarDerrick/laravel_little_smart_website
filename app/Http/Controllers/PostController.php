<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Services\FileSyncService;
use HTMLPurifier;
use HTMLPurifier_Config;

class PostController extends Controller
{
    protected $fileSyncService;

    public function __construct(FileSyncService $fileSyncService)
    {
        $this->fileSyncService = $fileSyncService;
    }

    /**
     * (CRUD read)
     * Display a listing of the resource, exclusive for announcement page.
     *
     * Retrieves all records from 'posts' table, split into several pages,
     * pass final data to blade view.
     */
    public function indexHome()
    {
        // Cut-off point for page nav btn is 15 pages (ellipsis will appear)
        $posts = Post::orderBy('createdtime', 'desc')->paginate(5); // number of records per page

        // pass an empty variable
        // $posts = collect();

        return view('index', compact('posts'));
    }

    // CRUD read 2
    public function indexList()
    {
        // Retrieve all records from the 'posts' table
        // $posts = Post::orderBy('createdtime', 'desc')->get();
        $posts = Post::orderBy('createdtime', 'desc')->paginate(20);

        // Pass the posts data to the view
        return view('post', compact('posts'));
    }

    // validate input then add to database
    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'images.*' => 'nullable|mimes:jpeg,png,gif|max:5120' // accept jpg, png, gif max 5mb
        ]);

        try {
            // Start transaction
            DB::beginTransaction();

            // Handle multiple file uploads
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('public/uploads'); // images are stored in storage/app/imagePath
                    $imagePaths[] = basename($imagePath);
                    // replace symbolic link
                    $this->fileSyncService->sync(basename($imagePath));
                }
            }

            // Sanitize description
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            $sanitizedDescription = $purifier->purify($validated['description']);

            // CRUD create
            DB::table('posts')->insert([
                'userid' => Auth::id(), // Fetch current user's id
                'title' => $validated['title'],
                'description' => $sanitizedDescription,
                'images' => json_encode($imagePaths), // Store JSON-encoded array
                'createdtime' => now(),
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('post')->with('status', 'Added new post.');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            Log::info($e->getMessage());

            return redirect()->back()->with('error', 'Failed to add new post.');
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $page = request()->input('page', 1);
        return view('edit_post', compact('post', 'page'));
    }

    // CRUD update
    public function update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'images.*' => 'nullable|mimes:jpeg,png,gif|max:5120' // accept jpg, png, gif max 5mb
        ]);

        try {
            // Start transaction
            DB::beginTransaction();

            // Update posts table
            $post = Post::findOrFail($id);

            // Decode the existing image paths
            $imagePaths = $post->images;

            // Handle file upload
            if ($request->has('delete-selected-img')) {
                $selectedImages = explode(',', $request->input('delete-selected-img'));

                // Delete selected images
                foreach ($selectedImages as $image) {
                    if (($key = array_search($image, $imagePaths)) !== false) {
                        Storage::delete('public/uploads/' . $image);
                        // replace symbolic link
                        $this->fileSyncService->delete($image);
                        unset($imagePaths[$key]);
                    }
                }
                $imagePaths = array_values($imagePaths); // Reindex array
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('public/uploads');
                    $imagePaths[] = basename($imagePath);
                    // replace symbolic link
                    $this->fileSyncService->sync(basename($imagePath));
                }
            }

            // Sanitize description
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            $sanitizedDescription = $purifier->purify($validated['description']);

            $post->update([
                'title' => $validated['title'],
                'description' => $sanitizedDescription,
                'images' => $imagePaths, // Store JSON-encoded array [Eloquent no need encode, DB raw need encode]
            ]);

            // Commit the transaction
            DB::commit();

            $page = $request->input('page', 1);

            return redirect()->route('post', ['page' => $page])->with('status', 'Updated existing post.');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            Log::info($e->getMessage());

            return redirect()->back()->with('error', 'Failed to update post.');
        }
    }

    // CRUD destroy
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post) {
            // Delete image from storage
            foreach ($post->images as $image) {
                Storage::delete('public/uploads/' . $image);
                // replace symbolic link
                $this->fileSyncService->delete($image);
            }

            $post->delete();
            return response()->json(['success' => 'Post is deleted.']);
        }

        return response()->json(['error' => 'Post not found.'], 404);
    }
}
