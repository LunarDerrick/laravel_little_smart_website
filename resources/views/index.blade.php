<!DOCTYPE html>
<html lang="en">

<head>
    <title>Little Smart Day Care Centre</title>

    @include('components.header')
    <!--CSS overwrite-->
    <style>
        table, th, td {
          border: 1px solid black;
        }
    </style>
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        @auth
            <h1>Welcome, {{ Auth::user()->name }}.</h1>
        @else
            <h1>小聪明安亲班 Little Smart Day Care Centre</h1>
        @endauth
        <br>

        <div class="center">
            <h2>Announcement</h2>

            @if ($posts->isEmpty())
                @include('components.no_records')
            @else
                <!--one section per post-->
                @foreach ($posts as $post)
                <section>
                    <p>{{ $post->createdtime->format('Y-m-d H:i') }}</p>
                    {{-- <p>Posted by: {{ $post->user->name }}</p> --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="{{ $post->title }}" />
                    @endif
                    <h3>{{ $post->title }}</h3>
                    @if ($post->description)
                        {!! $post->description !!}
                    @endif
                </section>
                <br>
                @endforeach

                <!-- Pagination Links -->
                <nav aria-label="Page navigation">
                {{ $posts->links('pagination::bootstrap-4') }}
                </nav>
            @endif
        </div>
    </section>

    @include('components.send_feedback')
    @include('components.footer')
</body>

</html>
