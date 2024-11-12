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

    public function tableData()
    {
        // sort by subject
        $subjects = ['mandarin', 'english', 'malay', 'math', 'science', 'history'];
        $topScores = [];

        // comment 'foreach' to simulate pass no variable
        foreach ($subjects as $subject) {
            $topScore = User::select('users.name', 'users.standard', 'scores.'.$subject.' as score')
                ->join('scores', 'users.id', '=', 'scores.userid')
                ->orderBy('scores.'.$subject, 'desc')
                ->first();

            if ($topScore) {
                $topScores[] = [
                    'subject' => ucfirst($subject), // Capitalize first letter
                    'name' => $topScore->name,
                    'standard' => $topScore->standard,
                    'score' => $topScore->score
                ];
            }
        }

        // sort by standard
        $topAvgScoreStandard = User::select('users.name', 'users.standard',
            DB::raw("
                ROUND(
                    AVG(
                        (scores.mandarin + scores.english + scores.malay + scores.math + scores.science +
                        CASE WHEN users.standard >= 4 THEN COALESCE(scores.history, 0) ELSE 0 END) /
                        CASE WHEN users.standard BETWEEN 1 AND 3 THEN 5 ELSE 6 END
                    ), 1
                ) as score
            "))
            ->join('scores', 'users.id', '=', 'scores.userid')
            ->groupBy('users.standard', 'users.id', 'users.name') // retabulate fetched data for further arrangment
            ->orderBy('users.standard', 'asc')
            ->get()
            ->groupBy('standard') // group all occurences to respective groups
            ->map(function ($group) {
                return $group->sortByDesc('score')->first(); // finally fetch highest average scorers
            })
            ->values() // Reset keys to 0-based index for clean output (convert key-pair to regular array)
            ->toArray();

        // sort by specific student
        $allScore = User::select('users.name',
                'scores.mandarin', 'scores.english', 'scores.malay',
                'scores.math', 'scores.science', 'scores.history')
            ->join('scores', 'users.id', '=', 'scores.userid')
            ->where('users.id', 505515) // temp fixed data
            ->first();

        $allScores = [];
        if ($allScore) {
            foreach ($subjects as $subject) {
                if ($allScore->$subject !== null) {
                    $allScores[] = [
                        'name' => $allScore->name,
                        'subject' => ucfirst($subject),
                        'score' => $allScore->$subject
                    ];
                }
            }
        }

        return view('analysis', [
            'topScores' => $topScores,
            'topAvgScoreStandard' => $topAvgScoreStandard,
            'allScores' => $allScores,
        ]);
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
        // only std 4-6 take history, extra case to handle omission
        $query = "
            standard,
            COUNT(*) AS total_students,
            SUM(CASE WHEN mandarin >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN english >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN malay >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN math >= 40 THEN 1 ELSE 0 END) +
            SUM(CASE WHEN science >= 40 THEN 1 ELSE 0 END) +
            CASE
                WHEN users.standard >= 4 THEN SUM(CASE WHEN history >= 40 THEN 1 ELSE 0 END)
                ELSE 0
            END AS total_passed_subjects,
            CASE
                WHEN users.standard >= 4 THEN 6
                ELSE 5
            END AS total_subjects
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
                    'total_subjects' => $standard < 4 ? 5 : 6
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

    public function getAvgScoreStandard()
    {
        // Construct the query block as a single string
        // COALESCE is to check for NULL value and replace with another, as NULL in any calculation renders final result always NULL
        $query = "
            standard,
            (SUM(
                CASE
                    WHEN users.standard BETWEEN 1 AND 3 THEN
                        COALESCE(mandarin, 0) + COALESCE(english, 0) + COALESCE(malay, 0) +
                        COALESCE(math, 0) + COALESCE(science, 0)
                    WHEN users.standard BETWEEN 4 AND 6 THEN
                        COALESCE(mandarin, 0) + COALESCE(english, 0) + COALESCE(malay, 0) +
                        COALESCE(math, 0) + COALESCE(science, 0) + COALESCE(history, 0)
                END
            ) / (COUNT(*) * 100 *
                CASE
                    WHEN users.standard BETWEEN 1 AND 3 THEN 5
                    ELSE 6
                END
            )) * 100 AS avg_score_percentage
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid')
        ->select(DB::raw($query))
        ->whereBetween('users.standard', [1, 6]) // Filter for standards 1 through 6
        ->groupBy('users.standard')
        ->orderBy('users.standard')
        ->get();

        // logging to view the results obtain
        // Log::info('Query result:', $result->toArray());

        // Check for possible missing row and plug the gaps
        // eg. zero std 2 students, need to plug "std 2: 0" to make sure chart didn't squeeze to left
        $finalResult = collect();

        for ($standard = 1; $standard <= 6; $standard++) {
            $existingRow = $result->firstWhere('standard', $standard);

            if ($existingRow) {
                $finalResult->push($existingRow);
            } else {
                $finalResult->push((object)[
                    'standard' => $standard,
                    'avg_score_percentage' => 0
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
                        isset($result->avg_score_percentage)
                            ? (float)$result->avg_score_percentage
                            : 0 // Handle cases where there are no students
                    )->all()
                ]
            ]
        ];

        return response()->json($chartData);
    }

    // public function topAvgScoreStandard()
    // {
    //     $subjects = ['mandarin', 'english', 'malay', 'math', 'science', 'history'];
    //     $topScores = [];

    //     // comment 'foreach' to simulate pass no variable
    //     foreach ($subjects as $subject) {
    //         $topScore = User::select('users.name', 'users.standard', 'scores.'.$subject.' as score')
    //             ->join('scores', 'users.id', '=', 'scores.userid')
    //             ->orderBy('scores.'.$subject, 'asc')
    //             ->first();

    //         if ($topScore) {
    //             $topScores[] = [
    //                 'subject' => ucfirst($subject), // Capitalize first letter
    //                 'name' => $topScore->name,
    //                 'standard' => $topScore->standard,
    //                 'score' => $topScore->score
    //             ];
    //         }
    //     }

    //     return view('analysis', ['topScores' => $topScores]);
    // }

    public function getStd1Grade()
    {
        // Construct the query block as a single string
        $query = "
            standard,
            SUM(
                CASE WHEN mandarin >= 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 80 THEN 1 ELSE 0 END
            ) AS A,
            SUM(
                CASE WHEN mandarin >= 60 AND mandarin < 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 60 AND english < 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 60 AND malay < 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 60 AND math < 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 60 AND science < 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 60 AND COALESCE(history, 0) < 80 THEN 1 ELSE 0 END
            ) AS B,
            SUM(
                CASE WHEN mandarin >= 40 AND mandarin < 60 THEN 1 ELSE 0 END +
                CASE WHEN english >= 40 AND english < 60 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 40 AND malay < 60 THEN 1 ELSE 0 END +
                CASE WHEN math >= 40 AND math < 60 THEN 1 ELSE 0 END +
                CASE WHEN science >= 40 AND science < 60 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 40 AND COALESCE(history, 0) < 60 THEN 1 ELSE 0 END
            ) AS C,
            SUM(
                CASE WHEN mandarin >= 20 AND mandarin < 40 THEN 1 ELSE 0 END +
                CASE WHEN english >= 20 AND english < 40 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 20 AND malay < 40 THEN 1 ELSE 0 END +
                CASE WHEN math >= 20 AND math < 40 THEN 1 ELSE 0 END +
                CASE WHEN science >= 20 AND science < 40 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 20 AND COALESCE(history, 0) < 40 THEN 1 ELSE 0 END
            ) AS D,
            SUM(
                CASE WHEN mandarin < 20 THEN 1 ELSE 0 END +
                CASE WHEN english < 20 THEN 1 ELSE 0 END +
                CASE WHEN malay < 20 THEN 1 ELSE 0 END +
                CASE WHEN math < 20 THEN 1 ELSE 0 END +
                CASE WHEN science < 20 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 21) < 20 THEN 1 ELSE 0 END
            ) AS E
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid')
        ->select(DB::raw($query))
        ->where('users.standard', 1)
        ->groupBy('users.standard')
        ->first();

        // log for non-group query results
        // Log::info('Query result:', [$result]);

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

    public function getStd2Grade()
    {
        // Construct the query block as a single string
        $query = "
            standard,
            SUM(
                CASE WHEN mandarin >= 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 80 THEN 1 ELSE 0 END
            ) AS A,
            SUM(
                CASE WHEN mandarin >= 60 AND mandarin < 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 60 AND english < 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 60 AND malay < 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 60 AND math < 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 60 AND science < 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 60 AND COALESCE(history, 0) < 80 THEN 1 ELSE 0 END
            ) AS B,
            SUM(
                CASE WHEN mandarin >= 40 AND mandarin < 60 THEN 1 ELSE 0 END +
                CASE WHEN english >= 40 AND english < 60 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 40 AND malay < 60 THEN 1 ELSE 0 END +
                CASE WHEN math >= 40 AND math < 60 THEN 1 ELSE 0 END +
                CASE WHEN science >= 40 AND science < 60 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 40 AND COALESCE(history, 0) < 60 THEN 1 ELSE 0 END
            ) AS C,
            SUM(
                CASE WHEN mandarin >= 20 AND mandarin < 40 THEN 1 ELSE 0 END +
                CASE WHEN english >= 20 AND english < 40 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 20 AND malay < 40 THEN 1 ELSE 0 END +
                CASE WHEN math >= 20 AND math < 40 THEN 1 ELSE 0 END +
                CASE WHEN science >= 20 AND science < 40 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 20 AND COALESCE(history, 0) < 40 THEN 1 ELSE 0 END
            ) AS D,
            SUM(
                CASE WHEN mandarin < 20 THEN 1 ELSE 0 END +
                CASE WHEN english < 20 THEN 1 ELSE 0 END +
                CASE WHEN malay < 20 THEN 1 ELSE 0 END +
                CASE WHEN math < 20 THEN 1 ELSE 0 END +
                CASE WHEN science < 20 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 21) < 20 THEN 1 ELSE 0 END
            ) AS E
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid')
        ->select(DB::raw($query))
        ->where('users.standard', 2)
        ->groupBy('users.standard')
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

    public function getStd3Grade()
    {
        // Construct the query block as a single string
        $query = "
            standard,
            SUM(
                CASE WHEN mandarin >= 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 80 THEN 1 ELSE 0 END
            ) AS A,
            SUM(
                CASE WHEN mandarin >= 60 AND mandarin < 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 60 AND english < 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 60 AND malay < 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 60 AND math < 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 60 AND science < 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 60 AND COALESCE(history, 0) < 80 THEN 1 ELSE 0 END
            ) AS B,
            SUM(
                CASE WHEN mandarin >= 40 AND mandarin < 60 THEN 1 ELSE 0 END +
                CASE WHEN english >= 40 AND english < 60 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 40 AND malay < 60 THEN 1 ELSE 0 END +
                CASE WHEN math >= 40 AND math < 60 THEN 1 ELSE 0 END +
                CASE WHEN science >= 40 AND science < 60 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 40 AND COALESCE(history, 0) < 60 THEN 1 ELSE 0 END
            ) AS C,
            SUM(
                CASE WHEN mandarin >= 20 AND mandarin < 40 THEN 1 ELSE 0 END +
                CASE WHEN english >= 20 AND english < 40 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 20 AND malay < 40 THEN 1 ELSE 0 END +
                CASE WHEN math >= 20 AND math < 40 THEN 1 ELSE 0 END +
                CASE WHEN science >= 20 AND science < 40 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 20 AND COALESCE(history, 0) < 40 THEN 1 ELSE 0 END
            ) AS D,
            SUM(
                CASE WHEN mandarin < 20 THEN 1 ELSE 0 END +
                CASE WHEN english < 20 THEN 1 ELSE 0 END +
                CASE WHEN malay < 20 THEN 1 ELSE 0 END +
                CASE WHEN math < 20 THEN 1 ELSE 0 END +
                CASE WHEN science < 20 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 21) < 20 THEN 1 ELSE 0 END
            ) AS E
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid')
        ->select(DB::raw($query))
        ->where('users.standard', 3)
        ->groupBy('users.standard')
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

    public function getStd4Grade()
    {
        // Construct the query block as a single string
        $query = "
            standard,
            SUM(
                CASE WHEN mandarin >= 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 80 THEN 1 ELSE 0 END
            ) AS A,
            SUM(
                CASE WHEN mandarin >= 60 AND mandarin < 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 60 AND english < 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 60 AND malay < 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 60 AND math < 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 60 AND science < 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 60 AND COALESCE(history, 0) < 80 THEN 1 ELSE 0 END
            ) AS B,
            SUM(
                CASE WHEN mandarin >= 40 AND mandarin < 60 THEN 1 ELSE 0 END +
                CASE WHEN english >= 40 AND english < 60 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 40 AND malay < 60 THEN 1 ELSE 0 END +
                CASE WHEN math >= 40 AND math < 60 THEN 1 ELSE 0 END +
                CASE WHEN science >= 40 AND science < 60 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 40 AND COALESCE(history, 0) < 60 THEN 1 ELSE 0 END
            ) AS C,
            SUM(
                CASE WHEN mandarin >= 20 AND mandarin < 40 THEN 1 ELSE 0 END +
                CASE WHEN english >= 20 AND english < 40 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 20 AND malay < 40 THEN 1 ELSE 0 END +
                CASE WHEN math >= 20 AND math < 40 THEN 1 ELSE 0 END +
                CASE WHEN science >= 20 AND science < 40 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 20 AND COALESCE(history, 0) < 40 THEN 1 ELSE 0 END
            ) AS D,
            SUM(
                CASE WHEN mandarin < 20 THEN 1 ELSE 0 END +
                CASE WHEN english < 20 THEN 1 ELSE 0 END +
                CASE WHEN malay < 20 THEN 1 ELSE 0 END +
                CASE WHEN math < 20 THEN 1 ELSE 0 END +
                CASE WHEN science < 20 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 21) < 20 THEN 1 ELSE 0 END
            ) AS E
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid')
        ->select(DB::raw($query))
        ->where('users.standard', 4)
        ->groupBy('users.standard')
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

    public function getStd5Grade()
    {
        // Construct the query block as a single string
        $query = "
            standard,
            SUM(
                CASE WHEN mandarin >= 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 80 THEN 1 ELSE 0 END
            ) AS A,
            SUM(
                CASE WHEN mandarin >= 60 AND mandarin < 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 60 AND english < 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 60 AND malay < 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 60 AND math < 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 60 AND science < 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 60 AND COALESCE(history, 0) < 80 THEN 1 ELSE 0 END
            ) AS B,
            SUM(
                CASE WHEN mandarin >= 40 AND mandarin < 60 THEN 1 ELSE 0 END +
                CASE WHEN english >= 40 AND english < 60 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 40 AND malay < 60 THEN 1 ELSE 0 END +
                CASE WHEN math >= 40 AND math < 60 THEN 1 ELSE 0 END +
                CASE WHEN science >= 40 AND science < 60 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 40 AND COALESCE(history, 0) < 60 THEN 1 ELSE 0 END
            ) AS C,
            SUM(
                CASE WHEN mandarin >= 20 AND mandarin < 40 THEN 1 ELSE 0 END +
                CASE WHEN english >= 20 AND english < 40 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 20 AND malay < 40 THEN 1 ELSE 0 END +
                CASE WHEN math >= 20 AND math < 40 THEN 1 ELSE 0 END +
                CASE WHEN science >= 20 AND science < 40 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 20 AND COALESCE(history, 0) < 40 THEN 1 ELSE 0 END
            ) AS D,
            SUM(
                CASE WHEN mandarin < 20 THEN 1 ELSE 0 END +
                CASE WHEN english < 20 THEN 1 ELSE 0 END +
                CASE WHEN malay < 20 THEN 1 ELSE 0 END +
                CASE WHEN math < 20 THEN 1 ELSE 0 END +
                CASE WHEN science < 20 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 21) < 20 THEN 1 ELSE 0 END
            ) AS E
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid')
        ->select(DB::raw($query))
        ->where('users.standard', 5)
        ->groupBy('users.standard')
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

    public function getStd6Grade()
    {
        // Construct the query block as a single string
        $query = "
            standard,
            SUM(
                CASE WHEN mandarin >= 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 80 THEN 1 ELSE 0 END
            ) AS A,
            SUM(
                CASE WHEN mandarin >= 60 AND mandarin < 80 THEN 1 ELSE 0 END +
                CASE WHEN english >= 60 AND english < 80 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 60 AND malay < 80 THEN 1 ELSE 0 END +
                CASE WHEN math >= 60 AND math < 80 THEN 1 ELSE 0 END +
                CASE WHEN science >= 60 AND science < 80 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 60 AND COALESCE(history, 0) < 80 THEN 1 ELSE 0 END
            ) AS B,
            SUM(
                CASE WHEN mandarin >= 40 AND mandarin < 60 THEN 1 ELSE 0 END +
                CASE WHEN english >= 40 AND english < 60 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 40 AND malay < 60 THEN 1 ELSE 0 END +
                CASE WHEN math >= 40 AND math < 60 THEN 1 ELSE 0 END +
                CASE WHEN science >= 40 AND science < 60 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 40 AND COALESCE(history, 0) < 60 THEN 1 ELSE 0 END
            ) AS C,
            SUM(
                CASE WHEN mandarin >= 20 AND mandarin < 40 THEN 1 ELSE 0 END +
                CASE WHEN english >= 20 AND english < 40 THEN 1 ELSE 0 END +
                CASE WHEN malay >= 20 AND malay < 40 THEN 1 ELSE 0 END +
                CASE WHEN math >= 20 AND math < 40 THEN 1 ELSE 0 END +
                CASE WHEN science >= 20 AND science < 40 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 0) >= 20 AND COALESCE(history, 0) < 40 THEN 1 ELSE 0 END
            ) AS D,
            SUM(
                CASE WHEN mandarin < 20 THEN 1 ELSE 0 END +
                CASE WHEN english < 20 THEN 1 ELSE 0 END +
                CASE WHEN malay < 20 THEN 1 ELSE 0 END +
                CASE WHEN math < 20 THEN 1 ELSE 0 END +
                CASE WHEN science < 20 THEN 1 ELSE 0 END +
                CASE WHEN COALESCE(history, 21) < 20 THEN 1 ELSE 0 END
            ) AS E
        ";

        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->join('users', 'users.id', '=', 'scores.userid')
        ->select(DB::raw($query))
        ->where('users.standard', 6)
        ->groupBy('users.standard')
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

    // line graph query will be flawed until "score by year" feature is implemented
    public function getAvgScoreSpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'backgroundColor' => ["#fd7f6f", "#ffee65", "#bd7ebe", "#7eb0d5", "#b2e061", "#ffb55a"],
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

    public function getMandarinSpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'borderColor' => "lightpink",
                    'backgroundColor' => "#fa5e50",
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

    public function getEnglishSpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'borderColor' => "palegoldenrod",
                    'backgroundColor' => "darkkhaki",
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

    public function getMalaySpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'borderColor' => "plum",
                    'backgroundColor' => "#a45ee5",
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

    public function getMathSpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'borderColor' => "lightskyblue",
                    'backgroundColor' => "dodgerblue",
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

    public function getScienceSpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'borderColor' => "#73da5d",
                    'backgroundColor' => "#00b680",
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

    public function getHistorySpecific($userId)
    {
        // Perform the query using Laravel's query builder
        $result = DB::table('scores')
        ->select('scores.*')
        ->where('scores.userid', $userId)
        ->first();

        // Prepare the data for Chart.js
        $chartData = [
            'labels' => ['Std 1', 'Std 2', 'Std 3', 'Std 4', 'Std 5', 'Std 6'],
            'datasets' => [
                [
                    'borderColor' => "#ec9706",
                    'backgroundColor' => "#fc6a03",
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
