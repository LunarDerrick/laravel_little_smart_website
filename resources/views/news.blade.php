<!DOCTYPE html>
<html lang="en">

<head>
    <title>Announcement - Little Smart Day Care Centre</title>

    <!-- ensure libraries before custom css which is stored in header -->
    <!-- Slick Carousel CSS -->
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
            <h1>
                <span>Welcome,</span>
                <span translate="no">{{ Auth::user()->name }}</span><span>.</span>
            </h1>
        @else
            <h1>
                <span translate="no">小聪明安亲班</span>
                <span>Little Smart Day Care Centre</span>
            </h1>
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
                    @if (!empty($post->media))
                        <div class="slick-carousel">
                            @foreach ($post->media as $media)
                                @if ($media['type'] === 'image')
                                    <div><img src="{{ asset('storage/uploads/' . $media['url']) }}" alt="{{ $post->title }}" /></div>
                                @elseif ($media['type'] === 'video')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{ $media['url'] }}" allowfullscreen></iframe>
                                    </div>
                                @endif
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
    @include('components.font-check')

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
