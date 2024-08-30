<!DOCTYPE html>
<html lang="en">

@php
include_once(app_path('Http/Helpers/helper_list_roster.php'));
@endphp

<head>
    <title>Edit Entry - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <a href="{{ route('roster') }}">Go Back</a>

        <section>
            <div class="container roster-form">
                <div class="row sticky">
                    <div class="col">
                        <h1>Edit Entry</h1>
                    </div>
                </div>
                <form action="{{ route('roster.update', ['id' => $student->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col form-label">
                            <label for="name"><b>Name</b></label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $student->name }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="age"><b>Age</b></label>
                            <input type="number" min="1" id="age" name="age" class="form-control" value="{{ $student->age }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="telno"><b>Phone Number</b></label>
                            <input type="tel" id="telno" name="telno" class="form-control" value="{{ $student->telno }}" required
                            pattern="([0-9]{3}-[0-9]{7})|([0-9]{3}-[0-9]{8})"
                            oninvalid="this.setCustomValidity('Invalid phone number. Example: 012-3456789')" onchange="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="school"><b>Primary School</b></label>
                            <input type="text" id="school" name="school" class="form-control" value="{{ $student->school }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="standard"><b>Standard</b></label>
                            <select type="standard" id="standard" name="standard" class="form-select" required>
                                <?php preSelect($student->standard)?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <h4>Exam Scores</h4>
                        </div>
                    </div>
                    @foreach($student->scores as $score)
                        <div class="row">
                            <div class="col form-label">
                                <label for="mandarin"><b>Mandarin</b></label>
                                <input type="number" min="0" max="100" step="0.1" id="mandarin" name="mandarin" class="form-control" value="{{ $score->mandarin }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-label">
                                <label for="english"><b>English</b></label>
                                <input type="number" min="0" max="100" step="0.1" id="english" name="english" class="form-control" value="{{ $score->english }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-label">
                                <label for="malay"><b>Malay</b></label>
                                <input type="number" min="0" max="100" step="0.1" id="malay" name="malay" class="form-control" value="{{ $score->malay }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-label">
                                <label for="math"><b>Mathematics</b></label>
                                <input type="number" min="0" max="100" step="0.1" id="math" name="math" class="form-control" value="{{ $score->math }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-label">
                                <label for="science"><b>Science</b></label>
                                <input type="number" min="0" max="100" step="0.1" id="science" name="science" class="form-control" value="{{ $score->science }}" required>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mt-4">
                        <div class="col">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <br>

    </section>

    @include('components.footer')
</body>

</html>
