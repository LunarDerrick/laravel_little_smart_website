<!DOCTYPE html>
<html lang="en">

<head>
    <title>Roster - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')
        @include('components.btn_admin')

        <h1><span>Tuition Roster</span></h1>
        <br>

        @if ($students->isEmpty())
            @include('components.no_records')
        @else
            <div id="roster">
                <p><small><i>Click on any column to sort table in ascending or descending order.</i></small></p>
                <table id="rosterTable">
                    <tr>
                        <th>Actions</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone Number</th>
                        <th>School</th>
                        <th>Standard</th>
                        <th>Mandarin</th>
                        <th>English</th>
                        <th>Malay</th>
                        <th>Mathematics</th>
                        <th>Science</th>
                        <th>History</th>
                    </tr>
                    @foreach($students as $student)
                        <tr translate="no">
                            <td>
                                <a class="img-btn" href="{{ route('roster.edit', ['id' => $student->id]) }}">
                                    <img src="{{ asset('media/edit_img.png') }}" alt="edit">
                                </a>
                                <a class="img-btn" href="#" data-bs-target="#deleteModal" data-bs-toggle="modal" data-bs-id="{{ $student->id }}">
                                    <img src="{{ asset('media/delete_img.png') }}" alt="delete">
                                </a>
                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->telno }}</td>
                            <td>{{ $student->school }}</td>
                            <td>{{ $student->standard }}</td>
                            {{-- fetch associated data in a separate but nested manner --}}
                            @foreach($student->scores as $score)
                                <td>{{ $score->mandarin }}</td>
                                <td>{{ $score->english }}</td>
                                <td>{{ $score->malay }}</td>
                                <td>{{ $score->math }}</td>
                                <td>{{ $score->science }}</td>
                                <td>{{ $score->history }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
        <br>
        <button type="button" class="btn btn-primary crud" onclick="window.location='{{ route('add_roster') }}'">ADD</button>

        <!-- delete modal -->
        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete?</p>
                        <strong>There is no way to revert the action!</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark mx-2" data-bs-postid="" id="modalDeleteBtn">
                            Delete
                        </button>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal" id="modalKeepBtn">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br>

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
            var headers = document.querySelectorAll("#roster th");
            headers.forEach(function(header, index) {
                if (index !== 0) { // exclude first column
                    header.addEventListener('click', function() {
                        sortTable(index, "#roster table");
                    });
                }
            });
        });

        // delete modal handling
        var deleteModal = document.getElementById('deleteModal');
        var modalKeepBtn = document.getElementById('modalKeepBtn');
        var modalDeleteBtn = document.getElementById('modalDeleteBtn');
        var notyf = new Notyf();

        deleteModal.addEventListener('shown.bs.modal', (event) => {
            modalKeepBtn.focus();

            var button = event.relatedTarget;
            var studentID = button.getAttribute('data-bs-id');

            modalDeleteBtn.setAttribute('data-bs-id', studentID);
        })

        modalDeleteBtn.onclick = function () {
            var studentID = modalDeleteBtn.getAttribute('data-bs-id');
            var csrfToken = '{{ csrf_token() }}';

            fetch(`/roster/${studentID}`, {
                // method: 'DELETE',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    _method: 'DELETE' // Fake the DELETE method
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
                } else {
                    notyf.error(data.error);
                }
            })
            .catch(error => {
                notyf.error('We encountered an error when deleting the entry.');
            });
        };
    </script>
</body>

</html>
