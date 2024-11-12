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

        <h1><span>Feedback Inbox</span></h1>
        <br>

        @if ($feedbacks->isEmpty())
            <div class="text-center">
                <img src="{{ asset('media/no_record.jpg') }}" alt="No records found" class="no-record"/>
                <h2 class="text-secondary">No records found</h2>
                <p class="text-secondary">You're all caught up! Take a break.</p>
            </div>
        @else
            <p><small><i>Click on any column to sort table in ascending or descending order.</i></small></p>
            <table id="feedback">
                <colgroup>
                    <col id="select">
                    <col id="date">
                    <col id="name">
                    <col id="title">
                    <col id="description">
                    <col id="action">
                </colgroup>
                <tr>
                    <th><input type="checkbox" id="select-all" /></th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th> {{-- ommited, too narrow to fit text --}}
                </tr>
                @foreach ($feedbacks as $feedback)
                    <tr class="{{ $feedback->is_read ? 'read' : 'unread' }}" translate="no">
                        <td><input type="checkbox" class="select-item" data-feedback-id="{{ $feedback->msgid }}" /></td>
                        <td class="line_break">{{ $feedback->createdtime->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $feedback->user->name ?? 'Anonymous' }}</td>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ $feedback->description }}</td>
                        <td>
                            <a class="img-btn" href="{{ route('feedback', ['id' => $feedback->msgid, 'page' => $feedbacks->currentPage()]) }}">
                                <img src="{{ asset('media/view.png') }}" alt="view">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <!-- Pagination Links -->
            <nav aria-label="Page navigation">
                {{ $feedbacks->links('pagination::bootstrap-4') }}
            </nav>
        @endif
        <div class="feedback-list-action">
            <button type="button" class="btn btn-info" id="btn-readSelected">Mark Read</button>
            <button type="button" class="btn btn-secondary" id="btn-unreadSelected">Mark Unread</button>
            <button type="button" class="btn btn-danger" data-bs-target="#deleteModal" data-bs-toggle="modal">Delete</button>
        </div>

        <!-- delete modal -->
        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Feedbacks</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these feedback?</p>
                        <strong>There is no way to revert the action!</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark mx-2" id="modalDeleteBtn">
                            Delete All
                        </button>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal" id="modalKeepBtn">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
    @include('components.font-check')
    @include('components.table-sort')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        // Event listeners for column headers to trigger sorting
        document.addEventListener('DOMContentLoaded', function() {
            var headers = document.querySelectorAll("#feedback th");
            headers.forEach(function(header, index) {
                if (index !== 0 && index !== (headers.length - 1)) { // exclude first and last column
                    header.addEventListener('click', function() {
                        sortTable(index, "#feedback");
                    });
                }
            });
        });

        // delete modal handling
        var modalKeepBtn = document.getElementById('modalKeepBtn');
        var modalDeleteBtn = document.getElementById('modalDeleteBtn');
        var notyf = new Notyf();

        modalDeleteBtn.onclick = function () {
            var selectedIds = Array.from(document.querySelectorAll('.select-item:checked')).map(function(checkbox) {
                return checkbox.getAttribute('data-feedback-id');
            });

            if (selectedIds.length === 0) {
                new Notyf().error("No feedbacks selected.");
                return;
            }

            var csrfToken = '{{ csrf_token() }}';

            fetch(`/delete_selected_feedbacks`, {
                // method: 'DELETE',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    _method: 'DELETE', // Fake the DELETE method
                    ids: selectedIds
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    deleteModal.classList.remove('show');
                    notyf.success(data.success);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2500);
                } else if (data.error) {
                    notyf.error(data.error);
                }
            })
            .catch(error => {
                notyf.error('Unable to delete feedbacks.');
            });
        };

        // Select/Deselect All Checkboxes
        document.getElementById('select-all').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.select-item');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = this.checked;
            }, this);
        });

        // Mark Selected as Read
        document.getElementById('btn-readSelected').addEventListener('click', function() {
            var selectedIds = Array.from(document.querySelectorAll('.select-item:checked')).map(function(checkbox) {
                return checkbox.getAttribute('data-feedback-id');
            });

            if (selectedIds.length === 0) {
                new Notyf().error("No feedbacks selected.");
                return;
            }

            var csrfToken = '{{ csrf_token() }}';

            fetch('{{ route('feedback.read_selected') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            })
            .catch(error => {
                new Notyf().error("Failed to mark as read.");
            });
        });

        // Mark Selected as Unread
        document.getElementById('btn-unreadSelected').addEventListener('click', function() {
            var selectedIds = Array.from(document.querySelectorAll('.select-item:checked')).map(function(checkbox) {
                return checkbox.getAttribute('data-feedback-id');
            });

            if (selectedIds.length === 0) {
                new Notyf().error("No feedbacks selected.");
                return;
            }

            var csrfToken = '{{ csrf_token() }}';

            fetch('{{ route('feedback.unread_selected') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            })
            .catch(error => {
                new Notyf().error("Failed to mark as unread.");
            });
        });
    </script>
</body>

</html>
