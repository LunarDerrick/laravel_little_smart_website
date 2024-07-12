<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RosterController extends Controller
{
    // CRUD read
    public function index()
    {
        $students = User::with('scores')
                        ->where('role', 'student') // redundancy in User.php scopeStudents(), but current version didn't filter properly, thus it is repeated here for frontend consistency.
                        ->get();

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
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('roster')->with('status', 'Added new record.');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();

            return redirect()->back()->with('error', 'Failed to add new record.');
        }
    }

}
