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
        @include('components.alert_notification')

        <a href="{{ route('post') }}">Go Back</a>

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
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="image"><b>Image</b></label>
                                        <input type="file" accept="image/*" id="images" name="images[]" class="form-control" multiple>
                                        <div id="preview-container">
                                            <img id="img-preview" src="{{ asset('media/placeholder.png') }}" class="img-fluid card-img-top" alt="...">
                                        </div>
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
        document.getElementById('images').addEventListener('change', function(event) {
            // catch non-image file uploads
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const files = Array.from(event.target.files);
            const invalidFiles = files.filter(file => !allowedTypes.includes(file.type));
            if (invalidFiles.length > 0) {
                alert('Only JPG, PNG, and GIF files are allowed.');
                event.target.value = ''; // Clear the input field
                return;
            }

            // preview images to be added
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // reset current selection

            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-fluid', 'card-img-top');
                    img.style.margin = '0px 0px 5px 0px';
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
</body>

</html>
