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
     * Fetch the count for unread feedbacks.
     * This method handles the AJAX request for the unread message count.
     */
    public function getUnreadCount()
    {
        $unreadCount = Feedback::where('is_read', false)->count();
        return response()->json(['unread_count' => $unreadCount]);
    }

    /**
     * Show the full information of the selected feedback.
     */
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->update(['is_read' => true]);

        return view('feedback', compact('feedback'));
    }

    /**
     * Mark selected feedbacks as read.
     */
    public function readSelected(Request $request)
    {
        $ids = $request->input('ids');
        Feedback::whereIn('msgid', $ids)->update(['is_read' => true]);
        return response()->json(['success' => 'Selected feedbacks marked as read.']);
    }

    /**
     * Mark the selected feedback as unread.
     */
    public function unread(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->is_read = false;
        $feedback->save();

        $page = $request->input('page', 1);

        return redirect()->route('feedback.list', ['page' => $page]);
    }

    /**
     * Mark selected feedbacks as unread.
     */
    public function unreadSelected(Request $request)
    {
        $ids = $request->input('ids');
        Feedback::whereIn('msgid', $ids)->update(['is_read' => false]);
        return response()->json(['success' => 'Selected feedbacks marked as unread.']);
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
     * Remove multiple specified resources from storage.
     */
    public function destroySelected(Request $request)
    {
        $ids = $request->input('ids');
        Feedback::whereIn('msgid', $ids)->delete();
        return response()->json(['success' => 'Feedbacks deleted successfully.']);
    }
}
