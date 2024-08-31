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

        @if(Auth::check() && roleHelper::roleCheck())
            <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('roster') }}'">Admin Panel</button>
        @endif
        <form method="POST" action="{{ route('logout') }}" id="logout">
            @csrf
            <button type="submit" class="btn btn-primary mobile">Logout</button>
        </form>

    </section>

    @include('components.send_feedback')
    @include('components.footer')
</body>

</html>
