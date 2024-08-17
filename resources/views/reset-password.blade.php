<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <div class="container form-center extend">
            <div class="row mt-5 pb-3">
                <h1>Reset password</h1>
            </div>
            <div class="row">
                <form action="{{ route('password.edit') }}" method="POST" id="resetForm">
                    @method('PUT')
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group row pb-2">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm">
                            <input type="email" class="form-control" id="email" name="email" placeholder="type here..." value="{{ old('email', $request->email) }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label long">New Password:</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" id="password" name="password" placeholder="type here..." required>
                        </div>
                    </div>
                    <div class="form-group row pb-3">
                        <label for="password_confirmation" class="col-sm-2 col-form-label long">Confirm Password:</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="type here..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

    @include('components.send_feedback')
    @include('components.footer')

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
                @foreach ($errors->all() as $error)
                    notyf.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>
</body>

</html>
