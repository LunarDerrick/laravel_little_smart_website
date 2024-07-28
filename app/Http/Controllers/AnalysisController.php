<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// use App\Models\Score;

class AnalysisController extends Controller
{
    public function showNoRecords()
    {
        return view('components.no_records')->render();
    }

    public function getPassingRate()
    {
        // Construct the query block as a single string
        $query = "
            COUNT(*) AS total,
            SUM(CASE WHEN mandarin >= 60 THEN 1 ELSE 0 END) AS Mandarin,
            SUM(CASE WHEN english >= 60 THEN 1 ELSE 0 END) AS English,
            SUM(CASE WHEN malay >= 60 THEN 1 ELSE 0 END) AS Malay,
            SUM(CASE WHEN math >= 60 THEN 1 ELSE 0 END) AS Math,
            SUM(CASE WHEN science >= 60 THEN 1 ELSE 0 END) AS Science
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select(DB::raw($query))
        ->first();

        // Prepare the data for Chart.js
        // comment $chartData content to simulate pass no data
        $chartData = [
            'labels' => ['Mandarin', 'English', 'Malay', 'Math', 'Science'],
            'datasets' => [
                [
                    'backgroundColor' => ["#fd7f6f", "#7eb0d5", "#b2e061", "#bd7ebe", "#ffb55a"],
                    'data' => [
                        ($result->Mandarin / $result->total),
                        ($result->English / $result->total),
                        ($result->Malay / $result->total),
                        ($result->Math / $result->total),
                        ($result->Science / $result->total)
                    ]
                ]
            ]
        ];

        return response()->json($chartData);
    }

    public function getGradeDistribution()
    {
        // Construct the query block as a single string
        $query = "
            SUM(CASE WHEN science >= 80 THEN 1 ELSE 0 END) AS 'A',
            SUM(CASE WHEN science >= 60 AND science < 80 THEN 1 ELSE 0 END) AS 'B',
            SUM(CASE WHEN science >= 40 AND science < 60 THEN 1 ELSE 0 END) AS 'C',
            SUM(CASE WHEN science >= 20 AND science < 40 THEN 1 ELSE 0 END) AS 'D',
            SUM(CASE WHEN science < 20 THEN 1 ELSE 0 END) AS 'E'
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select(DB::raw($query))
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['A', 'B', 'C', 'D', 'E'],
            'datasets' => [
                [
                    'backgroundColor' => ["#0e6573", "#008e89", "#00b680", "#73da5d", "#e0f420"],
                    'data' => [
                        $result->A,
                        $result->B,
                        $result->C,
                        $result->D,
                        $result->E,
                    ]
                ]
            ]
        ];

        return response()->json($chartData);
    }

    public function topScore()
    {
        $subjects = ['mandarin', 'english', 'malay', 'math', 'science'];
        $topScores = [];

        // comment 'foreach' to simulate pass no variable
        foreach ($subjects as $subject) {
            $topScore = User::select('users.name', 'scores.'.$subject.' as score')
                ->join('scores', 'users.id', '=', 'scores.userid')
                ->orderBy('scores.'.$subject, 'desc')
                ->first();

            if ($topScore) {
                $topScores[] = [
                    'subject' => ucfirst($subject), // Capitalize first letter
                    'name' => $topScore->name,
                    'score' => $topScore->score
                ];
            }
        }

        return view('analysis', ['topScores' => $topScores]);
    }

    public function getAvgScore()
    {
        // Construct the query block as a single string
        $query = "
            AVG(mandarin) AS Mandarin,
            AVG(english) AS English,
            AVG(malay) AS Malay,
            AVG(math) AS Math,
            AVG(science) AS Science
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select(DB::raw($query))
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Mandarin', 'English', 'Malay', 'Math', 'Science'],
            'datasets' => [
                [
                    'backgroundColor' => ["#fd7f6f", "#7eb0d5", "#b2e061", "#bd7ebe", "#ffb55a"],
                    'data' => [
                        $result->Mandarin,
                        $result->English,
                        $result->Malay,
                        $result->Math,
                        $result->Science,
                    ]
                ]
            ]
        ];

        return response()->json($chartData);
    }
}
