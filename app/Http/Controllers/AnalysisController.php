<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// use App\Models\Score;
// use Illuminate\Support\Facades\Log;

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
            SUM(CASE WHEN mandarin >= 40 THEN 1 ELSE 0 END) AS Mandarin,
            SUM(CASE WHEN english >= 40 THEN 1 ELSE 0 END) AS English,
            SUM(CASE WHEN malay >= 40 THEN 1 ELSE 0 END) AS Malay,
            SUM(CASE WHEN math >= 40 THEN 1 ELSE 0 END) AS Math,
            SUM(CASE WHEN science >= 40 THEN 1 ELSE 0 END) AS Science,
            SUM(CASE WHEN history >= 40 THEN 1 ELSE 0 END) AS History
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

    public function getPassingRateStandard()
    {
        // Construct the query block as a single string
        $query = "
            standard,
            COUNT(*) AS total_students,
            SUM(CASE WHEN mandarin >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN english >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN malay >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN math >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN science >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN history >= 40 THEN 1 ELSE 0 END) AS total_passed_subjects,
            6 AS total_subjects
        ";

        // Perform the query using Laravel's query builder
        $results = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid') // include littlesmartdb.users standard field
        ->select(DB::raw($query))
        ->whereBetween('users.standard', [1, 6]) // Filter for standards 1 through 6
        ->groupBy('users.standard')
        ->orderBy('users.standard')
        ->get();

        // Check for possible missing row and plug the gaps
        // eg. zero std 2 students, need to plug "std 2: 0" to make sure chart didn't squeeze to left
        $finalResult = collect();

        for ($standard = 1; $standard <= 6; $standard++) {
            $existingRow = $results->firstWhere('standard', $standard);

            if ($existingRow) {
                $finalResult->push($existingRow);
            } else {
                $finalResult->push((object)[
                    'standard' => $standard,
                    'total_students' => 0,
                    'total_passed_subjects' => "0",
                    'total_subjects' => 6
                ]);
            }
        }

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'backgroundColor' => ["#fd7f6f", "#ffee65", "#bd7ebe", "#7eb0d5", "#b2e061", "#ffb55a"],
                    'data' => $finalResult->map(fn($result) =>
                        $result->total_students > 0
                            ? ($result->total_passed_subjects / ($result->total_students * $result->total_subjects))
                            : 0 // Handle cases where there are no students
                    )->all()
                ]
            ]
        ];

        return response()->json($chartData);
    }

    public function getScoreSpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Mandarin', 'English', 'Malay', 'Math', 'Science', 'History'],
            'datasets' => [
                [
                    'borderColor' => "#36a2eb",
                    'backgroundColor' => "rgba(54, 162, 235, 0.2)",
                    'data' => [
                        $result->mandarin,
                        $result->english,
                        $result->malay,
                        $result->math,
                        $result->science,
                        $result->history,
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
