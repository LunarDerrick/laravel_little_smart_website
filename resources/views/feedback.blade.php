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
                    {!! nl2br(e($feedback->description)) !!} {{-- include newline --}}
                </div>
                <div class="feedback-action">
                    <br><br>
                    <form method="POST" action="{{ route('feedback.delete', ['id' => $feedback->msgid]) }}" id="delete-feedback">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endif
        </div>

    </section>

    @include('components.footer')
</body>

</html>
