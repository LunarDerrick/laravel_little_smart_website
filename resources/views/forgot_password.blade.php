<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <div id="forgot">
            <small><i>
            Forgot your password? No problem. Just let us know your email address and we will
            email you a password reset link that will allow you to choose a new one.
            </i></small>
        </div>

        <div class="container form-center">
            <div class="row mt-5 pb-3">
                <h1>Forgot password</h1>
            </div>
            <div class="row">
                <form action="{{ route('password.email_link') }}" method="POST" id="forgotForm">
                    @csrf
                    <div class="form-group row pb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm">
                            <input type="email" class="form-control" id="email" name="email" placeholder="type here..." value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary" id="submit-btn">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span id="button-text">SEND</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('components.send_feedback')
    @include('components.footer')

    <script>
        document.getElementById('forgotForm').addEventListener('submit', function() {
            var button = document.getElementById('submit-btn');
            var spinner = button.querySelector('.spinner-border');
            var buttonText = document.getElementById('button-text');

            button.disabled = true;
            spinner.style.display = 'inline-block';
            buttonText.textContent = 'Loading...';
        });
    </script>
</body>

</html>
