<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class RosterController extends Controller
{
    // CRUD read
    public function index()
    {
        $students = User::with('scores')
                        ->where('role', 'student') // redundancy in User.php scopeStudents(), but current version didn't filter properly, thus it is repeated here for frontend consistency.
                        ->get();

        // pass an empty variable
        // $students = collect();

        return view('roster', compact('students'));
    }

    // validate input then add to database
    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer|min:1',
            'telno' => 'required|regex:/^([0-9]{3}-[0-9]{7,8})$/',
            'school' => 'required|string',
            'standard' => 'required|integer|min:1|max:6',
            'mandarin' => 'required|integer|min:0|max:100',
            'english' => 'required|integer|min:0|max:100',
            'malay' => 'required|integer|min:0|max:100',
            'math' => 'required|integer|min:0|max:100',
            'science' => 'required|integer|min:0|max:100',
            'history' => 'nullable|integer|min:0|max:100',
        ]);

        try {
            // Start transaction
            DB::beginTransaction();

            $id = rand(100001, 999999); // temporary measure, may clash existing id
            $rememberToken = Str::random(10);

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
                'remember_token' => $rememberToken,
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
                'history' => $validated['history'],
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

    public function edit($id)
    {
        $student = User::with('scores')->findOrFail($id);
        return view('edit_roster', compact('student'));
    }

    // CRUD update
    public function update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer|min:1',
            'telno' => 'required|regex:/^([0-9]{3}-[0-9]{7,8})$/',
            'school' => 'required|string',
            'standard' => 'required|integer|min:1|max:6',
            'mandarin' => 'required|integer|min:0|max:100',
            'english' => 'required|integer|min:0|max:100',
            'malay' => 'required|integer|min:0|max:100',
            'math' => 'required|integer|min:0|max:100',
            'science' => 'required|integer|min:0|max:100',
            'history' => 'nullable|integer|min:0|max:100',
        ]);

        try {
            // Start transaction
            DB::beginTransaction();

            // Update users table
            $student = User::findOrFail($id);
            $student->update([
                'name' => $validated['name'],
                'age' => $validated['age'],
                'telno' => $validated['telno'],
                'school' => $validated['school'],
                'standard' => $validated['standard'],
            ]);

            // Update scores table
            $scores = $student->scores;
            // break down collection into elements (to resolve oneToMany relationship)
            foreach ($scores as $score) {
                $score->update([
                    'mandarin' => $validated['mandarin'],
                    'english' => $validated['english'],
                    'malay' => $validated['malay'],
                    'math' => $validated['math'],
                    'science' => $validated['science'],
                    'history' => $validated['history'],
                ]);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('roster')->with('status', 'Updated existing record.');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            Log::info($e->getMessage());

            return redirect()->back()->with('error', 'Failed to update record.');
        }
    }

    // CRUD destroy
    public function destroy($id)
    {
        $student = User::findOrFail($id);

        if ($student) {
            $student->scores()->delete();
            $student->delete();
            return response()->json(['success' => 'Entry is deleted.']);
        }

        return response()->json(['error' => 'Entry not found.'], 404);
    }
}
