<!DOCTYPE html>
<html lang="en">

@php
use App\Helpers\roleHelper;
@endphp

<head>
    <title>Profile - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <h1>Profile</h1>
        <br>

        <div class="container">
            <div class="row mb-2">
                <div class="col-2"><b>Name:</b></div>
                <div class="col">John Doe</div>
            </div>
            <div class="row mb-2">
                <div class="col-2"><b>Role:</b></div>
                <div class="col">Teacher</div>
            </div>
            <div class="row mb-2">
                <div class="col-2"><b>Email:</b></div>
                <div class="col">name@example.com</div>
            </div>
            <div class="row mt-5">
                <div class="col action">
                    @if(Auth::check() && roleHelper::roleCheck())
                        <button type="button" class="btn btn-primary" onclick="window.location='{{ route('roster') }}'">Admin Panel</button>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" id="logout">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

    @include('components.send_feedback')
    @include('components.footer')
</body>

</html>