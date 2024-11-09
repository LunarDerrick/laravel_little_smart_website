<button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('roster') }}'">Name List</button>
<button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('analysis') }}'">Exam Analysis</button>
<button type="button" class="btn btn-primary mobile position-relative" onclick="window.location='{{ route('feedback.list') }}'">
    Feedback Inbox
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
</button>
<button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('post') }}'">Edit Post</button>
<form method="POST" action="{{ route('logout') }}" id="logout">
    @csrf
    <button type="submit" class="btn btn-danger mobile">Logout</button>
</form>

<!-- dynamically update unread counts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.get("{{ route('feedback.unread_count') }}", function(data) {
            const unreadCount = data.unread_count;
            if (unreadCount > 0) {
                $('.mobile.position-relative').css('margin-right', '10px');
                if (unreadCount > 99) {
                    $('.badge').text('99+');
                } else {
                    $('.badge').text(unreadCount);
                }
            } else {
                $('.mobile.position-relative').css('margin-right', '0px');
                $('.badge').text('');
            }
        });
    });
</script>
