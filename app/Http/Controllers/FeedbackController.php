<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::with('user')->orderBy('createdtime', 'desc')->paginate(20);

        // pass an empty variable
        // $feedbacks = collect();

        return view('inbox', compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        try {
            // Start transaction
            DB::beginTransaction();

            // Checkbox validation
            if ($request->has('guest')) {
                $userid = null;
            } else {
                $userid = Auth::id();
            }

            // CRUD create
            DB::table('feedbacks')->insert([
                'userid' => $userid,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'createdtime' => now(),
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('status', 'Thank you for your feedback!');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            Log::info($e->getMessage());

            return redirect()->back()->with('error', 'Failed to send feedback.');
        }
    }

    /**
     * Show the profile for a given user.
     */
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->update(['is_read' => true]);

        return view('feedback', compact('feedback'));
    }

    /**
     * Mark all existing feedbacks as read.
     */
    public function readAll()
    {
        Feedback::where('is_read', false)->update(['is_read' => true]);

        return response()->json(['success' => 'All feedbacks marked as read.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);

        if ($feedback) {
            $feedback->delete();

            // return response()->json(['success' => 'Feedback is deleted.']);
            return redirect()->route('feedback.list')->with('status', 'Feedback deleted.');
        }

        // return response()->json(['error' => 'Feedback not found.'], 404);
        return redirect()->back()->with('error', 'Failed to delete feedback.');
    }

    /**
     * Remove all resources from storage.
     */
    public function destroyAll()
    {
        $feedbacks = Feedback::all();

        if ($feedbacks->isNotEmpty()) {
            // Delete each feedback record and associated resources if needed
            foreach ($feedbacks as $feedback) $feedback->delete();

            return response()->json(['success' => 'All feedbacks are deleted.']);
        }

        return response()->json(['error' => 'No feedbacks found.'], 404);
    }
}
