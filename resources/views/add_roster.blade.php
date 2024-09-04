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
            <div class="container roster-form">
                <div class="row sticky">
                    <div class="col">
                        <h1>New Entry</h1>
                    </div>
                </div>
                <form action="{{ route('roster.add') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col form-label">
                            <label for="name"><b>Name</b></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="age"><b>Age</b></label>
                            <input type="number" min="1" id="age" name="age" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="telno"><b>Phone Number</b></label>
                            <input type="tel" id="telno" name="telno" class="form-control" required
                            pattern="([0-9]{3}-[0-9]{7})|([0-9]{3}-[0-9]{8})"
                            oninvalid="this.setCustomValidity('Invalid phone number. Example: 012-3456789')" onchange="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="school"><b>Primary School</b></label>
                            <input type="text" id="school" name="school" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
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
                        <div class="col form-label">
                            <h4>Exam Scores</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="mandarin"><b>Mandarin</b></label>
                            <input type="number" min="0" max="100" step="0.1" id="mandarin" name="mandarin" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="english"><b>English</b></label>
                            <input type="number" min="0" max="100" step="0.1" id="english" name="english" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="malay"><b>Malay</b></label>
                            <input type="number" min="0" max="100" step="0.1" id="malay" name="malay" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="math"><b>Mathematics</b></label>
                            <input type="number" min="0" max="100" step="0.1" id="math" name="math" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-label">
                            <label for="science"><b>Science</b></label>
                            <input type="number" min="0" max="100" step="0.1" id="science" name="science" class="form-control" required>
                        </div>
                    </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('telno');

            phoneInput.addEventListener('input', function(e) {
                let value = phoneInput.value;

                // Remove existing dashes to prevent repeated dashes
                value = value.replace(/-/g, '');

                // Insert a dash after the third digit
                if (value.length > 3) {
                    value = value.slice(0, 3) + '-' + value.slice(3);
                }

                phoneInput.value = value;
            });
        });
    </script>
</body>

</html>
