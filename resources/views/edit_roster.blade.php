<!DOCTYPE html>
<html lang="en">

@php
include_once(app_path('Http/Helpers/helper_list_roster.php'));
@endphp

<head>
    <title>Edit Entry - Little Smart Day Care Centre</title>

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
            <img src="{{ asset('media/logo.png') }}" class="d-inline-block align-top" alt="day care centre logo">
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
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <p id="PC">You are now viewing as <b>Computer</b>.</p>
        <p id="tablet">You are now viewing as <b>Tablet</b>.</p>
        <p id="mobile">You are now viewing as <b>Mobile Device</b>.</p>

        <a href="{{ route('roster') }}">Go Back</a>

        <section>
            <div class="container">
                <div class="container section-title ">
                    <h1>Edit Entry</h1>
                </div>

                @isset($student)
                    <form action="{{ route('roster.update', ['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 form-label">
                                    <label for="name"><b>Name</b></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $student->name }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-label">
                                    <label for="age"><b>Age</b></label>
                                    <input type="number" min="1" id="age" name="age" class="form-control" value="{{ $student->age }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-label">
                                    <label for="telno"><b>Phone Number</b></label>
                                    <input type="tel"  id="telno" name="telno" class="form-control" value="{{ $student->telno }}" required
                                    pattern="([0-9]{3}-[0-9]{7})|([0-9]{3}-[0-9]{8})" placeholder="Example: 012-3456789">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-label">
                                    <label for="school"><b>Primary School</b></label>
                                    <input type="text" id="school" name="school" class="form-control" value="{{ $student->school }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-label">
                                    <label for="standard"><b>Standard</b></label>
                                    <select type="standard" id="standard" name="standard" class="form-select" required>
                                        <?php preSelect($student->standard)?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-label">
                                    <h4>Exam Scores</h4>
                                </div>
                            </div>

                            @foreach($student->scores as $score)
                                <div class="row">
                                    <div class="form-label">
                                        <label for="mandarin"><b>Mandarin</b></label>
                                        <input type="number" min="0" max="100" id="mandarin" name="mandarin" class="form-control" value="{{ $score->mandarin }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-label">
                                        <label for="english"><b>English</b></label>
                                        <input type="number" min="0" max="100" id="english" name="english" class="form-control" value="{{ $score->english }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-label">
                                        <label for="malay"><b>Malay</b></label>
                                        <input type="number" min="0" max="100" id="malay" name="malay" class="form-control" value="{{ $score->malay }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-label">
                                        <label for="math"><b>Mathematics</b></label>
                                        <input type="number" min="0" max="100" id="math" name="math" class="form-control" value="{{ $score->math }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-label">
                                        <label for="science"><b>Science</b></label>
                                        <input type="number" min="0" max="100" id="science" name="science" class="form-control" value="{{ $score->science }}" required>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endisset

            </div>
        </section>
        <br>

    </section>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>
</body>

</html>
