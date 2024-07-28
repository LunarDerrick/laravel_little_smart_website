<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use HTMLPurifier;
use HTMLPurifier_Config;

class PostController extends Controller
{
    // CRUD read
    public function indexHome()
    {
        // Retrieve all records from the 'posts' table
        // $posts = Post::orderBy('createdtime', 'desc')->get();

        // Split posts into several pages
        // Cut-off point is 15 pages (ellipsis will appear)
        $posts = Post::orderBy('createdtime', 'desc')->paginate(5); // number of records per page

        // pass an empty variable
        // $posts = collect();

        // Pass the posts data to the view
        return view('index', compact('posts'));
    }

    // CRUD read 2
    public function indexList()
    {
        // Retrieve all records from the 'posts' table
        // $posts = Post::orderBy('createdtime', 'desc')->get();
        $posts = Post::orderBy('createdtime', 'desc')->paginate(20);

        // Pass the posts data to the view
        return view('list_post', compact('posts'));
    }

    // validate input then add to database
    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png|max:2048' // must be JPEG or PNG, max size 2MB
        ]);

        // Ensure the images directory exists
        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'), 0755, true);
        }

        try {
            // Start transaction
            DB::beginTransaction();

            // Handle file upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/uploads');
                $imagePath = basename($imagePath);
            }

            // Sanitize description
            $config = HTMLPurifier_Config::createDefault();
            // // customize to permit rich text get saved as HTML entities
            // $config->set('HTML.Allowed', 'p,b,strong,i,em,u,a[href|title],ul,ol,li,br,span,h1,h2,h3,h4,h5,h6,img[src|alt|title|width|height],table,tr,td,th,thead,tbody,tfoot,blockquote,hr');
            $purifier = new HTMLPurifier($config);
            $sanitizedDescription = $purifier->purify($validated['description']);

            // CRUD create
            DB::table('posts')->insert([
                'userid' => Auth::id(), // Fetch current user's id
                'title' => $validated['title'],
                'description' => $sanitizedDescription,
                'image' => $imagePath, // images are stored in storage/app/imagePath
                'createdtime' => now(),
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('list_post')->with('status', 'Added new post.');

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
        return view('edit_post', compact('post'));
    }

    // CRUD update
    public function update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png|max:2048' // must be JPEG or PNG, max size 2MB
        ]);

        // Ensure the images directory exists
        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'), 0755, true);
        }

        try {
            // Start transaction
            DB::beginTransaction();

            // Update posts table
            $post = Post::findOrFail($id);

            // Handle file upload
            if ($request->has('clear-img')) {
                // true = user wants to get rid of image
                $imagePath = null;
                Storage::delete('public/uploads/' . $post->image);
            } else {
                // false = users wants to keep image
                $imagePath = $post->image;
            }

            if ($request->hasFile('image')) {
                // Delete the old image if exists
                if ($post->image) {
                    Storage::delete('public/uploads/' . $post->image);
                }

                $imagePath = $request->file('image')->store('public/uploads');
                $imagePath = basename($imagePath);
            }

            // Sanitize description
            $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            $sanitizedDescription = $purifier->purify($validated['description']);

            $post->update([
                'title' => $validated['title'],
                'description' => $sanitizedDescription,
                'image' => $imagePath, // images are stored in storage/app/imagePath
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('list_post')->with('status', 'Updated existing post.');

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
            if ($post->image) {
                Storage::delete('public/uploads/' . $post->image);
            }

            $post->delete();
            return response()->json(['success' => 'Entry is deleted.']);
        }

        return response()->json(['error' => 'Entry not found.'], 404);
    }
}
