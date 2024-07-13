<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback Inbox - Little Smart Day Care Centre</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap implementation-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--CSS overwrite-->
    <link rel="stylesheet" href="{{ mix('style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-custom">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('media/logo.png') }}" class="d-inline-block align-top" alt="day care centre logo">
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <b><a class="nav-link" href="{{ route('roster') }}">{{ Auth::user()->name }}</a></b>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
        </ul>
    </nav>

    <section>
        <p id="PC">You are now viewing as <b>Computer</b>.</p>
        <p id="tablet">You are now viewing as <b>Tablet</b>.</p>
        <p id="mobile">You are now viewing as <b>Mobile Device</b>.</p>

        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('roster') }}'">Name List</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('analysis') }}'">Exam Analysis</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('feedback') }}'">Feedback Inbox</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('list_post') }}'">Edit Post</button>
        <form method="POST" action="{{ route('logout') }}" id="logout">
            @csrf
            <button type="submit" class="btn btn-primary mobile">Logout</button>
        </form>
        <h1>Feedback Inbox</h1>
        <br>

    </section>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>
</body>

</html>
