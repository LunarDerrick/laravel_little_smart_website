<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Entry - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <a href="{{ route('roster') }}">Go Back</a>

        <section>
            <div class="container">
                <div class="container section-title ">
                    <h1>New Entry</h1>
                </div>

                <form action="{{ route('roster.add') }}" method="POST" id="rosterForm">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 form-label">
                                <label for="name"><b>Name</b></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="age"><b>Age</b></label>
                                <input type="number" min="1" id="age" name="age" class="form-control" required title="please enter numbers only.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="telno"><b>Phone Number</b></label>
                                <input type="tel"  id="telno" name="telno" class="form-control" required
                                pattern="([0-9]{3}-[0-9]{7})|([0-9]{3}-[0-9]{8})" placeholder="Example: 012-3456789"
                                title="format: 012-3456789 OR 011-34567890"> {{-- Custom tooltip/hover message --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="school"><b>Primary School</b></label>
                                <input type="text" id="school" name="school" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="standard"><b>Standard</b></label>
                                <select type="standard" id="standard" name="standard" class="form-select" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <h4>Exam Scores</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="mandarin"><b>Mandarin</b></label>
                                <input type="number" min="0" max="100" id="mandarin" name="mandarin" class="form-control" required title="please enter numbers only.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="english"><b>English</b></label>
                                <input type="number" min="0" max="100" id="english" name="english" class="form-control" required title="please enter numbers only.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="malay"><b>Malay</b></label>
                                <input type="number" min="0" max="100" id="malay" name="malay" class="form-control" required title="please enter numbers only.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="math"><b>Mathematics</b></label>
                                <input type="number" min="0" max="100" id="math" name="math" class="form-control" required title="please enter numbers only.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="science"><b>Science</b></label>
                                <input type="number" min="0" max="100" id="science" name="science" class="form-control" required title="please enter numbers only.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <input type="submit" value="Add Entry" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
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
