<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Post - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--CSS overwrite-->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
</head>

<body class="form">
    @include('components.navbar')

    <section>
        @include('components.alert_notification')

        <a href="{{ route('post', ['page' => $page]) }}">Go Back</a>

        <section>
            <div class="container">
                <div class="container section-title ">
                    <h1>Edit Post</h1>
                </div>

                @isset($post)
                    <form action="{{ route('post.update', ['id' => $post->postid, 'page' => $page]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 form-label">
                                    <label for="title"><b>Title</b></label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-label">
                                    <label for="content"><b>Description</b></label>
                                    <textarea id="content" name="description" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <input type="submit" value="Save Post" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row mt-4">
                                        <div class="col">
                                            <input type="checkbox" id="clear-img" name="clear-img" onclick="alert('If ticked, image will be gone forever once you save!');">
                                            <label for="clear-img">Clear image</label><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col">
                                            <label for="image"><b>Image</b></label>
                                            <input type="file" accept="image/*" id="image" name="image" class="form-control">
                                            <picture>
                                                @if($post->image == null)
                                                    <img id="img-preview" src="{{ asset('media/placeholder.png') }}" class="img-fluid card-img-top" alt="...">
                                                @else
                                                    <img id="img-preview" src="{{ asset('storage/uploads/' . $post->image) }}" class="img-fluid card-img-top" alt="...">
                                                @endif
                                            </picture>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endisset
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
    <script type="module" src="{{ asset('js/ckeditor/init-editpost.js') }}"></script>
    <script type="module">
        // convert server-side value to client-side value and pass to JS function
        window.editorInitialData = @json($post->description);
    </script>

    <script>
        // show image preview when choosing image
        document.getElementById("image").onchange = evt => {
            const [file] = document.getElementById("image").files;
            if (file) {
                document.getElementById("img-preview").src = URL.createObjectURL(file);
            }
        }
    </script>
</body>

</html>
