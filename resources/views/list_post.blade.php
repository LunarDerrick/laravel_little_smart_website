<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post List - Little Smart Day Care Centre</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap implementation-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--CSS overwrite-->
    <link rel="stylesheet" href="{{ mix('style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-custom">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('media/logo.png') }}" class="d-inline-block align-top" alt="day care centre logo">
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <b><a class="nav-link" href="{{ route('roster') }}">{{ Auth::user()->name }}</a></b>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
        </ul>
    </nav>

    <section>
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <p id="PC">You are now viewing as <b>Computer</b>.</p>
        <p id="tablet">You are now viewing as <b>Tablet</b>.</p>
        <p id="mobile">You are now viewing as <b>Mobile Device</b>.</p>

        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('roster') }}'">Name List</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('analysis') }}'">Exam Analysis</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('feedback') }}'">Feedback Inbox</button>
        <button type="button" class="btn btn-primary mobile" onclick="window.location='{{ route('list_post') }}'">Edit Post</button>
        <form method="POST" action="{{ route('logout') }}" id="logout">
            @csrf
            <button type="submit" class="btn btn-primary mobile">Logout</button>
        </form>
        <h1>Post List</h1>
        <br>

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
                <tr>
                    <td class="line_break">{{ $post->createdtime->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <button type="button" class="btn btn-primary mobile tablet" onclick="window.location='{{ route('post.edit', ['id' => $post->postid]) }}'">Edit</button>
                        <button type="button" class="btn btn-primary mobile tablet">Delete</button>
                    </td>
                </tr>
            @endforeach
            {{-- <tr>
                <td class="line_break">2024-04-03-18-00-00</td>
                <td>Title Text A</td>
                <td>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."
                </td>
                <td>
                    <button type="button" class="btn btn-primary mobile tablet" onclick="document.location='edit_post.html'">Edit</button>
                    <button type="button" class="btn btn-primary mobile tablet">Delete</button>
                </td>
            </tr> --}}
        </table>
        <br>
        <button type="button" class="btn btn-primary crud" onclick="window.location='{{ route('add_post') }}'">New Post</button>
    </section>

    <br><br>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>

    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
    </script>
</body>

</html>
