<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Post - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--CSS overwrite-->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
</head>

<body class="form">
    @include('components.navbar')

    <section>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @include('components.device_type')

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
                                        <input type="file" accept="image/*" id="image" name="image" class="form-control">
                                        <picture>
                                            <img id="img-preview" src="{{ asset('media/placeholder.png') }}" class="img-fluid card-img-top" alt="...">
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

    @include('components.footer')

    <!-- rich text editor, ckeditor5 builder -->
    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
        }
    }
    </script>
    <script type="module" src="{{ asset('js/ckeditor/main.js') }}"></script>
    <script type="module" src="{{ asset('js/ckeditor/init-addpost.js') }}"></script>

    <script>
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
