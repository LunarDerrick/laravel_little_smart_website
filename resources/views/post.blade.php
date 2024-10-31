<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post List - Little Smart Day Care Centre</title>

    @include('components.header')
</head>

<body>
    @include('components.navbar')

    <section>
        @include('components.alert_notification')
        @include('components.btn_admin')

        <h1><span>Post List</span></h1>
        <br>

        @if ($posts->isEmpty())
            @include('components.no_records')
        @else
            <p><small><i>Click on any column to sort table in ascending or descending order.</i></small></p>
            <table id="post">
                <colgroup>
                    <col id="date">
                    <col id="title">
                    <col id="description">
                    <col id="action">
                </colgroup>
                <tr>
                    <th>Date</th>
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                @foreach ($posts as $post)
                    <tr translate="no">
                        <td class="line_break">{{ $post->createdtime->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ strip_tags($post->description) }}</td>
                        <td>
                            <button type="button" class="btn btn-info mobile tablet" onclick="window.location='{{ route('post.edit', ['id' => $post->postid, 'page' => $posts->currentPage()]) }}'">Edit</button>
                            <button type="button" class="btn btn-warning mobile tablet" data-bs-target="#deleteModal" data-bs-toggle="modal" data-bs-id="{{ $post->postid }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <!-- Pagination Links -->
            <nav aria-label="Page navigation">
                {{ $posts->links('pagination::bootstrap-4') }}
            </nav>
        @endif
        <button type="button" class="btn btn-primary crud" onclick="window.location='{{ route('add_post') }}'">New Post</button>

        <!-- delete modal -->
        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        // sort table in ascending or descending order
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchCount = 0;
            table = document.querySelector("#post");
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
            var headers = document.querySelectorAll("#post th");
            headers.forEach(function(header, index) {
                header.addEventListener('click', function() {
                    sortTable(index);
                });
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
            var postID = button.getAttribute('data-bs-id');

            modalDeleteBtn.setAttribute('data-bs-id', postID);
        })

        modalDeleteBtn.onclick = function () {
            var postID = modalDeleteBtn.getAttribute('data-bs-id');
            var csrfToken = '{{ csrf_token() }}';

            fetch(`/post/${postID}`, {
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
                notyf.error('We encountered an error when deleting the post.');
            });
        };
    </script>
</body>

</html>
