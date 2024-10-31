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

        <h1><span>Feedback</span></h1>
        <a href="{{ route('feedback.list', ['page' => request()->query('page', 1)]) }}">Go Back</a>
        <br><br>

        <div class="feedback">
            @if(empty($feedback->title) || empty($feedback->description) || empty($feedback->createdtime))
                @include('components.no_records')
            @else
                <div>
                    <h4>{{ $feedback->title }}</h4>
                    <i>{{ $feedback->createdtime->format('Y-m-d H:i:s') }}</i><br>
                    <p translate="no">{{ $feedback->user->name ?? 'Anonymous' }}</p>
                    {!! nl2br(e($feedback->description)) !!} {{-- include newline --}}
                </div>
                <br><br>
                <div class="feedback-action">
                    <form method="POST" action="{{ route('feedback.unread', ['id' => $feedback->msgid]) }}" id="mark-unread">
                        @csrf
                        <button type="submit" class="btn btn-primary">Mark Unread</button>
                    </form>
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
    @include('components.font-check')
</body>

</html>
