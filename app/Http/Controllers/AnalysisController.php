<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class AnalysisController extends Controller
{
    public function index()
    {
        $Score = new Score();
        $scores = $Score->fetchScores();

        return view('analysis', compact('scores'));
    }
}
