<nav class="navbar navbar-expand navbar-light bg-custom">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('media/logo.png') }}" class="d-inline-block align-top" alt="day care centre logo">
    </a>

    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            @auth
                <b><a class="nav-link" href="{{ route('roster') }}" translate="no">{{ Auth::user()->name }}</a></b>
            @else
                <a class="nav-link" href="{{ route('login') }}">Teacher Login</a>
            @endauth
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
    </ul>
</nav>
