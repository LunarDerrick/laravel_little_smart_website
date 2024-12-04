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
                    <h1><span>New Post</span></h1>
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
                            <!--<div class="col-md-3">-->
                            <div class="col-md-7">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <input type="submit" value="Add Post" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="row mt-4">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-info btn-fb d-flex align-items-center ps-0">
                                            <div class="ps-2"><img src="{ asset('media/facebook_logo.png') }}" alt="fb_logo" /></div>
                                            <div class="ps-lg-1">Post to Both</div>
                                        </button>
                                        <small><i id="fb_prompt" class="hidden">Please sign-in to Facebook in profile page.</i></small>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-5">
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="video"><b>Video URL</b></label>
                                        <input type="url" id="video" name="video" class="form-control" aria-describedby="videoHelp" placeholder="Enter video URL...">
                                        <small id="videoHelp" class="form-text text-muted">Please ensure full URL is provided to prevent errors.</small>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="images"><b>Image</b></label>
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

    @include('components.facebook_plugin')
    @include('components.footer')
    @include('components.font-check')

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

    <!-- Facebook SDK for JS -->
    <!-- requires HTTPS testing -->
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

        document.querySelector('.btn-fb').addEventListener('click', function(event) {
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    // User is logged in, proceed with post creation
                    const accessToken = response.authResponse.accessToken;

                    // Proceed with the post creation logic
                    createPost(accessToken);
                } else {
                    document.getElementById('fb_prompt').classList.remove('hidden');
                }
            });
        });

        function createPost(accessToken) {
            if (accessToken) console.log("access token loaded");
        }
    </script>
</body>

</html>
