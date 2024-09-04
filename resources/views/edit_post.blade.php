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
                    <form action="{{ route('post.update', ['id' => $post->postid, 'page' => $page]) }}" method="POST" enctype="multipart/form-data" id="editpost-form">
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
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-danger" id="deletemedia-btn" data-bs-toggle="modal" data-bs-target="#mediaDeleteModal">Delete media</button>
                                            <input type="hidden" id="delete-selected-media" name="delete-selected-media">
                                        </div>
                                        <div class="col-auto d-flex align-items-center no-padding">
                                            <span id="selected-count"></span>
                                        </div>
                                    </div>
                                </div>
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
                                                @if($post->media)
                                                    @foreach($post->media as $image)
                                                        @if ($image['type'] === 'image')
                                                            <img src="{{ asset('storage/uploads/' . $image['url']) }}" class="img-fluid card-img-top" alt="...">
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <img src="{{ asset('media/placeholder.png') }}" class="img-fluid card-img-top" alt="...">
                                                @endif
                                            </div>
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

        <!--modal delete modal-->
        <div class="modal fade" id="mediaDeleteModal" tabindex="-1" aria-labelledby="mediaDeleteModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="mediaDeleteModalLabel">Select Images/Videos to Delete</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-media-container">
                  <!-- Media will be dynamically added here -->
                </div>
                <div class="modal-footer">
                  <span id="selected-media-count">0 selected</span>
                  <button type="button" class="btn btn-danger" id="confirm-delete">Delete Selected</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
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
        window.media = @json($post->media);
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            });
        });

        // image delete modal
        const deleteMediaButton = document.getElementById('deletemedia-btn');
        const modal = new bootstrap.Modal(document.getElementById('mediaDeleteModal'));
        const modalMediaContainer = document.getElementById('modal-media-container');
        const selectedMediaCount = document.getElementById('selected-media-count'); // Element to show selected count

        // Populate modal with existing images
        deleteMediaButton.addEventListener('click', function () {
            if (window.media.length === 0) {
                // include('components.no_records')
                modalMediaContainer.innerHTML = `
                    <div class="text-center">
                        <img src="{{ asset('media/no_record.jpg') }}" alt="No records found" class="no-record"/>
                        <h2 class="text-secondary">No records found</h2>
                        <p class="text-secondary">This post has no media.</p>
                    </div>
                `;
                return; // Exit function since there's no content to process
            } else {
                modalMediaContainer.innerHTML = ''; // Clear existing content

                window.media.forEach(media => {
                    const mediaDiv = document.createElement('div');
                    mediaDiv.classList.add('media-container');
                    if (media.type === 'image') {
                        mediaDiv.innerHTML = `
                            <div class="row">
                                <div class="col-1 d-flex align-items-center">
                                    <input type="checkbox" name="delete_images[]" value="${media.url}">
                                </div>
                                <div class="col-11">
                                    <img src="{{ asset('storage/uploads') }}/${media.url}" class="img-fluid card-img-top" alt="...">
                                </div>
                            </div>
                        `;
                    } else if (media.type === 'video') {
                        mediaDiv.innerHTML = `
                            <div class="row">
                                <div class="col-1 d-flex align-items-center">
                                    <input type="checkbox" name="delete_images[]" value="${media.url}">
                                </div>
                                <div class="col-11">
                                    <iframe src="${media.url}" class="embed-responsive-item" allowfullscreen></iframe>
                                </div>
                            </div>
                        `;
                    }
                    modalMediaContainer.appendChild(mediaDiv);
                });
            }
        });

        // handle image selection within the modal
        modalMediaContainer.addEventListener('change', function () {
            const selectedMedia = modalMediaContainer.querySelectorAll('input[type="checkbox"]:checked').length;
            selectedMediaCount.textContent = `${selectedMedia} selected`;
        });

        // Send select request to form
        document.getElementById('confirm-delete').addEventListener('click', function () {
            const selectedMedia = Array.from(modalMediaContainer.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);

            // Update select count outside of modal
            const selectedCount = selectedMedia.length;
            document.getElementById('selected-count').textContent = `${selectedCount} media selected`;

            // Update hidden input with selected images
            document.getElementById('delete-selected-media').value = selectedMedia.join(',');

            modal.hide();
        });
    </script>
</body>

</html>
