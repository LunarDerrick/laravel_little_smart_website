<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <div class="container form-center">
            <div class="row mt-5 pb-3">
                <h1><span>Teacher Login</span></h1>
            </div>
            <div class="row pb-3">
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-12 col-md-3 col-form-label">Username:</label>
                        <div class="col">
                            <input type="text" class="form-control login-field" id="username" name="username" placeholder="type here..." required>
                        </div>
                    </div>
                    <div class="form-group row pb-3">
                        <label for="password" class="col-12 col-md-3 col-form-label">Password&nbsp;:</label>
                        <div class="col">
                            <input type="password" class="form-control login-field" id="password" name="password" placeholder="type here..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <a href="{{ route('password.forgot') }}">Forgot password?</a>
            </div>
        </div>

        <br>
    </section>

    @include('components.send_feedback')
    @include('components.footer')
    @include('components.font-check')

    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        const notyf = new Notyf({
            duration: 0,
            dismissible: true,
        });

        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->any())
                notyf.error("{{ $errors->first('login') }}");
            @endif
        });
    </script>
</body>

</html>
