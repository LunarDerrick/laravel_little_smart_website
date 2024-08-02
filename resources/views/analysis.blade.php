<!DOCTYPE html>
<html lang="en">

<head>
    <title>Exam Analysis - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')
        @include('components.btn_admin')

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
                            @if (empty($topScores))
                                @include('components.no_records')
                            @else
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
                            @endif
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

    @include('components.footer')

    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- JS chart library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>

    <script>
        $(document).ready(function() {
            showChart1();
            showChart2();
            showChart3();
        });

        const showChart1 = () => {
            // browser "localhost:8000/chart-data-1" to check if js receives datatable
            $.get("{{ url('/chart-data-1') }}", function(data) {
                if (!data.datasets) { // if empty data array
                    showNoData('#barchart_passingrate');
                } else {
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
                }
            }).fail(function() {
                showNoData('#barchart_passingrate');
            });
        }

        const showChart2 = () => {
            // browser "localhost:8000/chart-data-2" to check if js receives datatable
            $.get("{{ url('/chart-data-2') }}", function(data) {
                if (!data.datasets) { // if empty data array
                    showNoData('#piechart_gradescience');
                } else {
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
                }
            }).fail(function() {
                showNoData('#piechart_gradescience');
            });
        }

        const showChart3 = () => {
            // browser "localhost:8000/chart-data-3" to check if js receives datatable
            $.get("{{ url('/chart-data-3') }}", function(data) {
                if (!data.datasets) { // if empty data array
                    showNoData('#barchart_avgscore');
                } else {
                    // importing datalabel plugin
                    Chart.register(ChartDataLabels);

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
                }
            }).fail(function() {
                showNoData('#barchart_avgscore');
            });
        }

        // placeholder when fetched no data
        const showNoData = (selector) => {
            const chartContainer = $(selector).parent();
            chartContainer.empty(); // clear container before appending
            $.get("{{ url('/no-record') }}", function(data) {
                chartContainer.append(data);
            });
        };
    </script>
</body>

</html>
