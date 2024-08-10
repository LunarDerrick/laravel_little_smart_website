<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <div id="form-container">
            <div>
                <h1>Teacher Login</h1>
            </div>
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username:</label>
                    <div class="col-sm">
                        <input type="text" class="form-control login-field" id="username" name="username" placeholder="type here..." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password:</label>
                    <div class="col-sm">
                        <input type="password" class="form-control login-field" id="password" name="password" placeholder="type here..." required>
                    </div>
                </div>
                <p></p>
                <div class="form-group row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </div>
            </form>
            <p></p>
            <div class="row" id="corner">
                <a href="#">Forgot password?</a>
            </div>
        </div>

        <br>
    </section>

    @include('components.footer')

    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->any())
                new Notyf().error("{{ $errors->first('login') }}");
            @endif
        });
    </script>
</body>

</html>
