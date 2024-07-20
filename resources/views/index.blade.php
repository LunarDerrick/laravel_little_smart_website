<!DOCTYPE html>
<html lang="en">

<head>
    <title>Little Smart Day Care Centre</title>

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
                @auth
                    <b><a class="nav-link" href="{{ route('roster') }}">{{ Auth::user()->name }}</a></b>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Teacher Login</a>
                @endauth
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

        @auth
            <h1>Welcome, {{ Auth::user()->name }}.</h1>
        @else
            <h1>小聪明安亲班 Little Smart Day Care Centre</h1>
        @endauth
        <br>

        <div class="center">
            <h2>Announcement</h2>
            <!--one section per post-->
            @foreach ($posts as $post)
                <section>
                    <p>{{ $post->createdtime->format('Y-m-d H:i') }}</p>
                    {{-- <p>Posted by: {{ $post->user->name ?? 'Unknown' }}</p> --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="{{ $post->title }}" />
                    @endif
                    <h3>{{ $post->title }}</h3>
                    @if ($post->description)
                        <p>{{ $post->description }}</p>
                    @endif
                </section>
                <br>
            @endforeach
            {{-- <section>
                <p>3 April 2024 18:00</p>
                <img src="{{ asset('media/children.jpg') }}" alt="a group of children jumping in open field">
                <h3>Title Text</h3>
                <p>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."
                </p>
            </section>
            <br> --}}
        </div>
    </section>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>
</body>

</html>
