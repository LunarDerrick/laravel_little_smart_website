<!DOCTYPE html>
<html lang="en">

{{-- @php
include_once(app_path("Http/Helpers/helper_list_score.php"));
@endphp --}}

<head>
    <title>Exam Analysis - Little Smart Day Care Centre</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap implementation-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--CSS overwrite-->
    <link rel="stylesheet" href="{{ mix('style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-custom">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="media/logo.png" class="d-inline-block align-top" alt="day care centre logo">
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <b><a class="nav-link" href="{{ route('roster') }}">{{ Auth::user()->name }}</a></b>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
        </ul>
    </nav>

    <section>
        <p id="PC">You are now viewing as <b>Computer</b>.</p>
        <p id="tablet">You are now viewing as <b>Tablet</b>.</p>
        <p id="mobile">You are now viewing as <b>Mobile Device</b>.</p>

        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('roster') }}'">Name List</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('analysis') }}'">Exam Analysis</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('feedback') }}'">Feedback Inbox</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('list_post') }}'">Edit Post</button>
        <form method="POST" action="{{ route('logout') }}" id="logout">
            @csrf
            <button type="submit" class="btn btn-primary mobile">Logout</button>
        </form>
        <h1>Exam Analysis</h1>
        <br>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="barchart_passingrate"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Passing Rate of All Subjects</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="piechart_gradescience"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Science</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <table id="table-graph">
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Score</th>
                                </tr>
                                @isset($topScores)
                                    @foreach($topScores as $topScore)
                                    <tr>
                                        <td>{{ $topScore['name'] }}</td>
                                        <td>{{ $topScore['subject'] }}</td>
                                        <td>{{ $topScore['score'] }}</td>
                                    </tr>
                                    @endforeach
                                @endisset
                            </table>
                            <div class="card-body">
                                <h6>Top Scorer for Each Subject</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="barchart_avgscore"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Average Score of All Subjects</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <br><br>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>

    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- JS chart library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>
    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            showChart1();
            showChart2();
            showChart3();
        });

        const showChart1 = () => {
            // browser "localhost:8000/chart-data-1" to check if js receives datatable
            $.get("{{ url('/chart-data-1') }}", function(data) {
                // importing datalabel plugin
                Chart.register(ChartDataLabels);

                new Chart("barchart_passingrate", {
                    type: 'bar',
                    data: data,
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    // Convert decimal to percentage
                                    label: function(tooltipItem) {
                                        var value = Math.round(tooltipItem.raw * 100);
                                        return value + '%';
                                    }
                                }
                            },
                            datalabels: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                suggestedMin: 0, // Minimum value for the y-axis
                                suggestedMax: 1, // Maximum value for the y-axis
                                title: {
                                    display: true,
                                    text: 'Percentage(%)'
                                },
                                ticks: {
                                    // convert decimal to percentage
                                    callback: function(value, index, values) {
                                        return (value * 100) + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            })
        }

        const showChart2 = () => {
            // browser "localhost:8000/chart-data-2" to check if js receives datatable
            $.get("{{ url('/chart-data-2') }}", function(data) {
                // importing datalabel plugin
                Chart.register(ChartDataLabels);

                new Chart("piechart_gradescience", {
                    type: "pie",
                    data: data,
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                            },
                            datalabels: {
                                color: 'black',
                                labels: {
                                    title: {
                                        font: {
                                            weight: 'bold'
                                        }
                                    }
                                },
                                formatter: (value, ctx) => {
                                    let label = ctx.chart.data.labels[ctx.dataIndex];
                                    return label + ': ' + value;
                                }
                            }
                        }
                    }
                });
            })
        }

        const showChart3 = () => {
            // browser "localhost:8000/chart-data-3" to check if js receives datatable
            $.get("{{ url('/chart-data-3') }}", function(data) {
                // importing datalabel plugin
                Chart.register(ChartDataLabels);

                // const avg_score = data["avgscore_data"];
                // const avg_title = [].concat(...avg_score.map(obj => Object.keys(obj)));
                // const avg_value = [].concat(...avg_score.map(obj => Object.values(obj)));

                // draw vertical bar chart
                new Chart("barchart_avgscore", {
                    type: "bar",
                    data: data,
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    // round to nearest 1 decimal place
                                    label: function(tooltipItem) {
                                        var value = (Math.round(tooltipItem.raw * 10) /10).toFixed(1);
                                        return value;
                                    }
                                }
                            },
                            datalabels: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                suggestedMin: 0, // Minimum value for the y-axis
                                suggestedMax: 100, // Maximum value for the y-axis
                                title: {
                                    display: true,
                                    text: "Score"
                                },
                            }
                        }
                    }
                });
            })
        }
    </script>
</body>

</html>
