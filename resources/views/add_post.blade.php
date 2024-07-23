<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Post - Little Smart Day Care Centre</title>

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
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <p id="PC">You are now viewing as <b>Computer</b>.</p>
        <p id="tablet">You are now viewing as <b>Tablet</b>.</p>
        <p id="mobile">You are now viewing as <b>Mobile Device</b>.</p>

        <a href="{{ route('list_post') }}">Go Back</a>

        <section>
            <div class="container">
                <div class="container section-title ">
                    <h1>New Post</h1>
                </div>

                <form action="{{ route('post.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 form-label">
                                <label for="title"><b>Title</b></label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-label">
                                <label for="content"><b>Description</b></label>
                                <textarea id="content" name="description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <input type="submit" value="Add Post" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col">
                                        <label for="image"><b>Image</b></label>
                                        <input type="file" accept="image/*" id="image" name="image" class="form-control" required>
                                        <picture>
                                            <img id="img-preview" src="media/placeholder.png" class="img-fluid card-img-top" alt="...">
                                        </picture>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <br>

    </section>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>

    <!-- rich text editor, custom built -->
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        // initialise richtext editor
        ClassicEditor
            .create( document.querySelector('#content'),
                // remove media embed, not available for markdown
                // remove code-related markups
                {
                    removePlugins:  ['MediaEmbed', 'Code', 'CodeBlock', 'SourceEditing']
                }
            )
            .then( newEditor => {
                // save editor to variable for later access
                editor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );

        // check if editor has anything
        document.forms[0].onsubmit = evt => {
            if (editor.getData().trim() == "") {
                alert("No content is provided.");
                // prevent form submitting
                return false;
            }
        };

        // show image preview when choosing image
        document.getElementById("image").onchange = evt => {
            const [file] = document.getElementById("image").files
            if (file) {
                document.getElementById("img-preview").src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>
