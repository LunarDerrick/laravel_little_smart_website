<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post List - Little Smart Day Care Centre</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap implementation-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--CSS overwrite-->
        <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-custom">
        <a class="navbar-brand" href="index.html">
            <img src="media/logo.png" class="d-inline-block align-top" alt="day care centre logo">
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <b>
                <a class="nav-link" href="roster.php">ADMIN</a>
                </b>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
        </ul>
    </nav>

    <section>
        <p id="PC">You are now viewing as <b>Computer</b>.</p>
        <p id="tablet">You are now viewing as <b>Tablet</b>.</p>
        <p id="mobile">You are now viewing as <b>Mobile Device</b>.</p>

        <button type="button" class="btn btn-primary mobile" onclick="document.location='roster.php'">Name List</button>
        <button type="button" class="btn btn-primary mobile" onclick="document.location='analysis.php'">Exam Analysis</button>
        <button type="button" class="btn btn-primary mobile" onclick="document.location='feedback.html'">Feedback Inbox</button>
        <button type="button" class="btn btn-primary mobile" onclick="document.location='list_post.html'">Edit Post</button>
        <button type="button" class="btn btn-primary mobile" onclick="document.location='index.html'">Logout</button>
        <h1>Post List</h1>
        <br>

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
            <tr>
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
            </tr>
            <tr>
                <td class="line_break">2024-03-06-15-34-00</td>
                <td>Title Text B</td>
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
            </tr>
        </table>
        <br>
        <button type="button" class="btn btn-primary crud" onclick="document.location='add_post.html'">New Post</button>
    </section>

    <br><br>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>
</body>

</html>
