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
                <img src="{{ asset('media/no_record.jpg') }}" alt="No records found" class="no-record"/>
                <h2 class="text-secondary">No records found</h2>
                <p class="text-secondary">You're all caught up! Take a break.</p>
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
                    <th></th> {{-- ommited, too narrow to fit text --}}
                </tr>
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td class="line_break">{{ $feedback->createdtime->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $feedback->user->name ?? 'Anonymous' }}</td>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ $feedback->description }}</td>
                        <td>
                            <a class="img-btn" href="{{ route('feedback', ['id' => $feedback->msgid]) }}">
                                <img src="{{ asset('media/view.png') }}" alt="view">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <!-- Pagination Links -->
            <nav aria-label="Page navigation">
                {{ $feedbacks->links('pagination::bootstrap-4') }}
            </nav>
        @endif
        <br>
        <button type="button" class="btn btn-danger crud" data-bs-target="#deleteModal" data-bs-toggle="modal">Delete All</button>
        {{-- <button type="button" class="btn btn-primary mobile tablet" data-bs-target="#deleteModal" data-bs-toggle="modal" data-bs-id="{{ $post->postid }}">Delete</button> --}}

        <!-- delete modal -->
        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete All Feedbacks</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete?</p>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        // sort table in ascending or descending order
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchCount = 0;
            table = document.querySelector("#feedback");
            switching = true;
            dir = "asc";

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                    if (columnIndex === 0) { // separately handle datetime sorting
                        // parse dates into JavaScript Date objects
                        let dateX = new Date(x.innerHTML);
                        let dateY = new Date(y.innerHTML);

                        if (dir == "asc") {
                            if (dateX > dateY) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (dateX < dateY) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else if (Number.isInteger(parseInt(x.innerHTML)) && Number.isInteger(parseInt(y.innerHTML))) {
                        // sort numerically
                        if (dir == "asc") {
                            if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else {
                        // sort alphabetically
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchCount++;
                } else {
                    if (switchCount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }

            // Reset visual indicators
            resetSortingIndicators();

            // Set visual indicator for the current column
            let header = table.rows[0].getElementsByTagName("th")[columnIndex];
            if (dir == "asc") {
                indicator = ' ▲';
            } else if (dir == "desc") {
                indicator = ' ▼';
            }
            header.innerHTML += indicator;
        }

        function resetSortingIndicators() {
            let headers = document.getElementsByTagName("th");
            for (let i = 0; i < headers.length; i++) {
                headers[i].innerHTML = headers[i].innerHTML.split(" ")[0]; // Remove existing indicators
            }
        }

        // Event listeners for column headers to trigger sorting
        document.addEventListener('DOMContentLoaded', function() {
            var headers = document.querySelectorAll("#feedback th");
            headers.forEach(function(header, index) {
                header.addEventListener('click', function() {
                    sortTable(index);
                });
            });
        });

        // delete modal handling
        var modalKeepBtn = document.getElementById('modalKeepBtn');
        var modalDeleteBtn = document.getElementById('modalDeleteBtn');
        var notyf = new Notyf();

        modalDeleteBtn.onclick = function () {
            var csrfToken = '{{ csrf_token() }}';

            fetch(`/delete_all_feedbacks`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    deleteModal.classList.remove('show');
                    notyf.success(data.success);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2500);
                } else {
                    notyf.error(data.error);
                }
            })
            .catch(error => {
                notyf.error('We encountered an error when deleting feedbacks.');
            });
        };
    </script>
</body>

</html>
