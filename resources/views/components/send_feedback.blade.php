<!-- Bootstrap Icon -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="message-box position-fixed bottom-0 start-0">
    <div class="message-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Send Feedback</h5>
        <button type="button" class="btn btn-sm p-0" data-bs-toggle="collapse" data-bs-target="#messageBoxBody" aria-expanded="true" aria-controls="messageBoxBody">
            <i class="bi bi-dash-square-fill" id="toggleIcon"></i>
        </button>
    </div>
    <div class="collapse show message-body" id="messageBoxBody">
        <form action="{{ route('feedback.add') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col form-label">
                        Sending as:
                        @auth
                            <span translate="no">{{ Auth::user()->name }}</span>
                        @else
                            Anonymous
                        @endauth
                    </div>
                </div>
                <div class="row">
                    <div class="col form-label">
                        <input type="checkbox" id="guest" name="guest"
                        @guest
                            checked disabled
                        @endguest
                        >
                        <label for="guest">Anonymous</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-label">
                        <label for="title"><b>Title</b></label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-label">
                        <label for="description"><b>Description</b></label>
                        <textarea id="description" name="description" rows="3" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="SEND" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // swap button icon on hide/show
    document.addEventListener('DOMContentLoaded', function() {
        const toggleIcon = document.querySelector('#toggleIcon');
        const messageBoxBody = document.querySelector('#messageBoxBody');

        // user manual interaction
        document.addEventListener('shown.bs.collapse', function () {
            toggleIcon.classList.remove('bi-plus-square-fill');
            toggleIcon.classList.add('bi-dash-square-fill');
        });

        document.addEventListener('hidden.bs.collapse', function () {
            toggleIcon.classList.remove('bi-dash-square-fill');
            toggleIcon.classList.add('bi-plus-square-fill');
        });

        // save state carry over to other pages
        function updateIcon(isCollapsed) {
            if (isCollapsed) {
                toggleIcon.classList.remove('bi-dash-square-fill');
                toggleIcon.classList.add('bi-plus-square-fill');
            } else {
                toggleIcon.classList.remove('bi-plus-square-fill');
                toggleIcon.classList.add('bi-dash-square-fill');
            }
        }

        function loadState() {
            const isCollapsed = localStorage.getItem('messageBoxCollapsed') === 'true';
            if (isCollapsed) {
                messageBoxBody.classList.remove('show');
                messageBoxBody.classList.add('hide');
            } else {
                messageBoxBody.classList.add('show');
                messageBoxBody.classList.remove('hide');
            }
            updateIcon(isCollapsed);
        }

        function saveState(isCollapsed) {
            localStorage.setItem('messageBoxCollapsed', isCollapsed);
        }

        messageBoxBody.addEventListener('shown.bs.collapse', function () {
            saveState(false);
            updateIcon(false);
        });

        messageBoxBody.addEventListener('hidden.bs.collapse', function () {
            saveState(true);
            updateIcon(true);
        });

        loadState();
    });
</script>
