<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\RosterModel;
use App\Models\User;

class RosterController extends Controller
{
    public function index()
    {
        $students = User::with('scores')
                        ->where('role', 'student') // redundancy in User.php scopeStudents(), but current version didn't filter properly, thus it is repeated here for frontend consistency.
                        ->get();

        return view('roster', compact('students'));
    }
}
