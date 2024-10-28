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
            SUM(CASE WHEN science >= 60 THEN 1 ELSE 0 END) AS Science,
            SUM(CASE WHEN history >= 60 THEN 1 ELSE 0 END) AS History
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select(DB::raw($query))
        ->first();

        // Prepare the data for Chart.js
        // comment $chartData content to simulate pass no data
        $chartData = [
            'labels' => ['Mandarin', 'English', 'Malay', 'Math', 'Science', 'History'],
            'datasets' => [
                [
                    'backgroundColor' => ["#fd7f6f", "#ffee65", "#bd7ebe", "#7eb0d5", "#b2e061", "#ffb55a"],
                    'data' => [
                        ($result->Mandarin / $result->total),
                        ($result->English / $result->total),
                        ($result->Malay / $result->total),
                        ($result->Math / $result->total),
                        ($result->Science / $result->total),
                        ($result->History / $result->total)
                    ]
                ]
            ]
        ];

        return response()->json($chartData);
    }

    public function getAvgScore()
    {
        // Construct the query block as a single string
        $query = "
            AVG(mandarin) AS Mandarin,
            AVG(english) AS English,
            AVG(malay) AS Malay,
            AVG(math) AS Math,
            AVG(science) AS Science,
            AVG(history) AS History
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select(DB::raw($query))
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Mandarin', 'English', 'Malay', 'Math', 'Science', 'History'],
            'datasets' => [
                [
                    'backgroundColor' => ["#fd7f6f", "#ffee65", "#bd7ebe", "#7eb0d5", "#b2e061", "#ffb55a"],
                    'data' => [
                        $result->Mandarin,
                        $result->English,
                        $result->Malay,
                        $result->Math,
                        $result->Science,
                        $result->History,
                    ]
                ]
            ]
        ];

        return response()->json($chartData);
    }

    public function topScore()
    {
        $subjects = ['mandarin', 'english', 'malay', 'math', 'science', 'history'];
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

    public function getMandarinGrade()
    {
        // Construct the query block as a single string
        $query = "
            SUM(CASE WHEN mandarin >= 80 THEN 1 ELSE 0 END) AS 'A',
            SUM(CASE WHEN mandarin >= 60 AND mandarin < 80 THEN 1 ELSE 0 END) AS 'B',
            SUM(CASE WHEN mandarin >= 40 AND mandarin < 60 THEN 1 ELSE 0 END) AS 'C',
            SUM(CASE WHEN mandarin >= 20 AND mandarin < 40 THEN 1 ELSE 0 END) AS 'D',
            SUM(CASE WHEN mandarin < 20 THEN 1 ELSE 0 END) AS 'E'
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
                    'backgroundColor' => ["lightpink", "indianred", "lightcoral", "lightsalmon", "#fa5e50"],
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

    public function getEnglishGrade()
    {
        // Construct the query block as a single string
        $query = "
            SUM(CASE WHEN english >= 80 THEN 1 ELSE 0 END) AS 'A',
            SUM(CASE WHEN english >= 60 AND english < 80 THEN 1 ELSE 0 END) AS 'B',
            SUM(CASE WHEN english >= 40 AND english < 60 THEN 1 ELSE 0 END) AS 'C',
            SUM(CASE WHEN english >= 20 AND english < 40 THEN 1 ELSE 0 END) AS 'D',
            SUM(CASE WHEN english < 20 THEN 1 ELSE 0 END) AS 'E'
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
                    'backgroundColor' => ["burlywood", "darkkhaki", "khaki", "palegoldenrod", "wheat"],
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

    public function getMalayGrade()
    {
        // Construct the query block as a single string
        $query = "
            SUM(CASE WHEN malay >= 80 THEN 1 ELSE 0 END) AS 'A',
            SUM(CASE WHEN malay >= 60 AND malay < 80 THEN 1 ELSE 0 END) AS 'B',
            SUM(CASE WHEN malay >= 40 AND malay < 60 THEN 1 ELSE 0 END) AS 'C',
            SUM(CASE WHEN malay >= 20 AND malay < 40 THEN 1 ELSE 0 END) AS 'D',
            SUM(CASE WHEN malay < 20 THEN 1 ELSE 0 END) AS 'E'
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
                    'backgroundColor' => ["#a45ee5", "#e39ff6", "#b65fcf", "mediumpurple", "plum"],
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

    public function getMathGrade()
    {
        // Construct the query block as a single string
        $query = "
            SUM(CASE WHEN math >= 80 THEN 1 ELSE 0 END) AS 'A',
            SUM(CASE WHEN math >= 60 AND math < 80 THEN 1 ELSE 0 END) AS 'B',
            SUM(CASE WHEN math >= 40 AND math < 60 THEN 1 ELSE 0 END) AS 'C',
            SUM(CASE WHEN math >= 20 AND math < 40 THEN 1 ELSE 0 END) AS 'D',
            SUM(CASE WHEN math < 20 THEN 1 ELSE 0 END) AS 'E'
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
                    'backgroundColor' => ["cornflowerblue", "lightskyblue", "darkturquoise", "deepskyblue", "dodgerblue"],
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

    public function getScienceGrade()
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

    public function getHistoryGrade()
    {
        // Construct the query block as a single string
        $query = "
            SUM(CASE WHEN history >= 80 THEN 1 ELSE 0 END) AS 'A',
            SUM(CASE WHEN history >= 60 AND history < 80 THEN 1 ELSE 0 END) AS 'B',
            SUM(CASE WHEN history >= 40 AND history < 60 THEN 1 ELSE 0 END) AS 'C',
            SUM(CASE WHEN history >= 20 AND history < 40 THEN 1 ELSE 0 END) AS 'D',
            SUM(CASE WHEN history < 20 THEN 1 ELSE 0 END) AS 'E'
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
                    'backgroundColor' => ["#b56727", "#fc6a03", "#ec9706", "#be5504", "#ed820e"],
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

    public function nodata() {
        $chartData = [];

        return response()->json($chartData);
    }
}
