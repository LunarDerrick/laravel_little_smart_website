<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RosterModel;

class RosterController extends Controller
{
    public function index()
    {
        $rosterModel = new RosterModel();
        $students = $rosterModel->fetchStudents();

        return view('roster', compact('students'));
    }
}
