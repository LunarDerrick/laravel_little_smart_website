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

        <h1><span>Exam Analysis</span></h1>
        <br>

        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by
                <span id="selected-option" class="ms-2">Subject</span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="updateSelection('Subject')">Subject</a></li>
                <li><a class="dropdown-item" href="#" onclick="updateSelection('Standard')">Standard</a></li>
                <li><a class="dropdown-item" href="#" onclick="updateSelection('Specific Student')">Specific Student</a></li>
            </ul>
        </div>

        <section class="standard"></section>
        <section class="subject"></section>
        <section class="specific student"></section>

        <section class="overall">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="chartjs_01"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Passing Rate of All Subjects</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="chartjs_02"></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Average Score of All Subjects</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0" id="table-container">
                            @if (empty($topScores) && empty($topAvgScoreStandard) && empty($allScores))
                                @include('components.no_records')
                            @else
                                <table id="table-graph">
                                    <tr>
                                        <th>Name</th>
                                        <th id="table-header">Subject</th>
                                        <th>Score</th>
                                    </tr>
                                    <tbody id="data-body" data-type="Subject">
                                        @foreach($topScores as $topScore)
                                        <tr translate="no">
                                            <td>{{ $topScore['name'] }}</td>
                                            <td>{{ $topScore['subject'] }}</td>
                                            <td>{{ $topScore['score'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="data-body" data-type="Standard">
                                        @foreach($topAvgScoreStandard as $score)
                                        <tr translate="no">
                                            <td>{{ $score['name'] }}</td>
                                            <td>{{ $score['standard'] }}</td>
                                            <td>{{ $score['score'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="data-body" data-type="Specific Student">
                                        @foreach($allScores as $allScore)
                                        <tr translate="no">
                                            <td>{{ $allScore['name'] }}</td>
                                            <td>{{ $allScore['subject'] }}</td>
                                            <td>{{ $allScore['score'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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
                                <canvas id="chartjs_03" class='piechart'></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Mandarin</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="chartjs_04" class='piechart'></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for English</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="chartjs_05" class='piechart'></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Malay</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="chartjs_06" class='piechart'></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Math</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="chartjs_07" class='piechart'></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for Science</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0">
                            <picture>
                                <canvas id="chartjs_08" class='piechart'></canvas>
                            </picture>
                            <div class="card-body">
                                <h6>Grade Distribution for History</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <br><br>

    @include('components.footer')
    @include('components.font-check')

    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        var chart_data_8 = "{{ url('/chart-data-8') }}";
        var chart_data_9 = "{{ url('/chart-data-9') }}";
        var chart_data_10 = "{{ url('/chart-data-10') }}";
        var chart_data_11 = "{{ url('/chart-data-11') }}";
        var chart_data_12 = "{{ url('/chart-data-12') }}";
        var chart_data_13 = "{{ url('/chart-data-13') }}";
        var chart_data_14 = "{{ url('/chart-data-14') }}";
        var chart_data_15 = "{{ url('/chart-data-15') }}";
        var chart_data_16 = "{{ url('/chart-data-16') }}";
        // temporarily using fixed id for demo
        // var chart_data_17 = "{{ url('/chart-data-17') }}";
        var chart_data_17 = "{{ url('/chart-data-17/505515') }}";
        var chart_data_18 = "{{ url('/chart-data-18/505515') }}";
        var chart_data_19 = "{{ url('/chart-data-19/505515') }}";
        var chart_data_20 = "{{ url('/chart-data-20/505515') }}";
        var chart_data_21 = "{{ url('/chart-data-21/505515') }}";
        var chart_data_22 = "{{ url('/chart-data-22/505515') }}";
        var chart_data_23 = "{{ url('/chart-data-23/505515') }}";
        var chart_data_24 = "{{ url('/chart-data-24/505515') }}";
        var no_record = "{{ url('/no-record') }}";
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
