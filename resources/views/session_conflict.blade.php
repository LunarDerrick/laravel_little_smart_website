<!DOCTYPE html>
<html lang="en">

@php
use App\Helpers\roleHelper;
@endphp

<head>
    <title>Multiple Login Detected - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <h1><span>Multiple Login Detected</span></h1>
        <br>

        <div class="center text">
            <img src="{{ asset('media/warning.png') }}" alt="warning" class="no-record"/><br>
            <br>
            Your account is already logged in on another device.<br>
            Please log out from the other device before logging in here.<br>
            If this is not you, please contact any admin for assistance.<br>
            <br>
            <form method="POST" action="{{ route('logout') }}" id="logout">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        <br>

    </section>

    @include('components.footer')
    @include('components.font-check')
</body>

</html>
