<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback Inbox - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')
        @include('components.btn_admin')

        <h1>Feedback Inbox</h1>
        <br>

        @if ($feedbacks->isEmpty())
            <div class="text-center">
                @include('components.no_records')
            </div>
        @else
            <p><small><i>Click on any column to sort table in ascending or descending order.</i></small></p>
            <table id="feedback">
                <colgroup>
                    <col id="date">
                    <col id="name">
                    <col id="title">
                    <col id="description">
                    <col id="action">
                </colgroup>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td class="line_break">{{ $feedback->createdtime->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $feedback->userid }}</td>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ $feedback->description }}</td>
                        <td>
                            <a class="img-btn" href="#">
                                <img src="{{ asset('media/view.png') }}" alt="view">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    <br>
    </section>

    @include('components.footer')
</body>

</html>
