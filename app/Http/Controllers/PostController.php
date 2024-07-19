<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    // validate input then add to database
    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png|max:2048' //must be JPEG or PNG, max size 2MB
        ]);

        // TODO: COMPLETE LINE 21 ONWARDS
        try {
            // Start transaction
            DB::beginTransaction();

            $id = rand(100001, 999999); // temporary measure, may clash existing id
            // $rememberToken = Str::random(10);

            // CRUD create
            DB::table('users')->insert([
                'id' => $id,
                'username' => 'student#' . $id,
                'name' => $validated['name'],
                'role' => 'student',
                'age' => $validated['age'],
                'telno' => $validated['telno'],
                'school' => $validated['school'],
                'standard' => $validated['standard'],
                'email' => 'student#' . $id . '@gmail.com', // to ensure unique email
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // the password is "password"
                // 'remember_token' => $rememberToken,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('scores')->insert([
                'userid' => $id,
                'mandarin' => $validated['mandarin'],
                'english' => $validated['english'],
                'malay' => $validated['malay'],
                'math' => $validated['math'],
                'science' => $validated['science'],
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('roster')->with('status', 'Added new record.');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            Log::info($e->getMessage());

            return redirect()->back()->with('error', 'Failed to add new record.');
        }
    }
}
