<button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('roster') }}'">Name List</button>
<button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('analysis') }}'">Exam Analysis</button>
<button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('feedback.list') }}'">Feedback Inbox</button>
<button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('post') }}'">Edit Post</button>
<form method="POST" action="{{ route('logout') }}" id="logout">
    @csrf
    <button type="submit" class="btn btn-primary mobile">Logout</button>
</form>
