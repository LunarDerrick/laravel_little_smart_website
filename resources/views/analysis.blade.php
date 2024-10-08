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
                                <canvas id="barchart_avgscore"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Average Score of All Subjects</h6>
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
                                        <tr translate="no">
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
                                <canvas id="piechart_grademandarin" class="piechart"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Mandarin</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="piechart_gradeenglish" class="piechart"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for English</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="piechart_grademalay" class="piechart"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Malay</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="piechart_grademath" class="piechart"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Math</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="piechart_gradescience" class="piechart"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Science</h6>
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

    <!-- passing data to analysis-chart.js -->
    <script>
        var chart_data_1 = "{{ url('/chart-data-1') }}";
        var chart_data_2 = "{{ url('/chart-data-2') }}";
        var chart_data_3 = "{{ url('/chart-data-3') }}";
        var chart_data_4 = "{{ url('/chart-data-4') }}";
        var chart_data_5 = "{{ url('/chart-data-5') }}";
        var chart_data_6 = "{{ url('/chart-data-6') }}";
        var chart_data_7 = "{{ url('/chart-data-7') }}";
        var no_record = "{{ url('/no-record') }}";
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
