<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <h1>Feedback</h1>
        <a href="{{ route('feedback.list') }}">Go Back</a>
        <br><br>

        <div class="feedback">
            @if(empty($feedback->title) || empty($feedback->description) || empty($feedback->createdtime))
                @include('components.no_records')
            @else
                <div>
                    <h4>{{ $feedback->title }}</h4>
                    <i>{{ $feedback->createdtime->format('Y-m-d H:i:s') }}</i><br>
                    <p>{{ $feedback->user->name ?? 'Anonymous' }}</p>
                    {{ $feedback->description }}
                </div>
                <div class="feedback-action">
                    <br><br>
                    <button type="button" class="btn btn-danger" onclick="window.location='{{ route('feedback.delete', ['id' => $feedback->msgid]) }}'">Delete</button>
                </div>
            @endif
        </div>

    </section>

    @include('components.footer')
</body>

</html>
