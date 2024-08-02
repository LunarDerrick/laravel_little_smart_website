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
        $feedbacks = Feedback::orderBy('createdtime', 'desc')->get();

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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
