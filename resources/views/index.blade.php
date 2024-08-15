<!DOCTYPE html>
<html lang="en">

<head>
    <title>Little Smart Day Care Centre</title>

    <!-- Slick Carousel CSS -->
    <!-- ensure libraries before custom css which is stored in header -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
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
                    @if (!empty($post->images))
                        <div class="slick-carousel">
                            @foreach ($post->images as $image)
                                <div><img src="{{ asset('storage/uploads/' . $image) }}" alt="{{ $post->title }}" /></div>
                            @endforeach
                        </div>
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

    <!-- Slick Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script>
        $(document).ready(function(){
            $('.slick-carousel').slick({
                dots: true,
                adaptiveHeight: true,
            });
        });
    </script>
</body>

</html>
