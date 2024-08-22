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
                                            <button type="button" class="btn btn-danger" id="deleteimg-btn" data-bs-toggle="modal" data-bs-target="#imageDeleteModal">Delete image</button>
                                            <input type="hidden" id="delete-selected-img" name="delete-selected-img">
                                        </div>
                                        <div class="col-auto d-flex align-items-center no-padding">
                                            <span id="selected-img-count"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="image"><b>Image</b></label>
                                            <input type="file" accept="image/*" id="images" name="images[]" class="form-control" multiple>
                                            <div id="preview-container">
                                                @if($post->images)
                                                    @foreach($post->images as $image)
                                                        <img src="{{ asset('storage/uploads/' . $image) }}" class="img-fluid card-img-top" alt="...">
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

        <!--image delete modal-->
        <div class="modal fade" id="imageDeleteModal" tabindex="-1" aria-labelledby="imageDeleteModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="imageDeleteModalLabel">Select Images to Delete</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-images-container">
                  <!-- Images will be dynamically added here -->
                </div>
                <div class="modal-footer">
                  <span id="selected-images-count">0 selected</span>
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
        window.images = @json($post->images);
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
        const deleteImgButton = document.getElementById('deleteimg-btn');
        const modal = new bootstrap.Modal(document.getElementById('imageDeleteModal'));
        const modalImagesContainer = document.getElementById('modal-images-container');
        const selectedImagesCount = document.getElementById('selected-images-count'); // Element to show selected count

        // Populate modal with existing images
        deleteImgButton.addEventListener('click', function () {
            if (window.images.length === 0) {
                // include('components.no_records')
                modalImagesContainer.innerHTML = `
                    <div class="text-center">
                        <img src="{{ asset('media/no_record.jpg') }}" alt="No records found" class="no-record"/>
                        <h2 class="text-secondary">No records found</h2>
                        <p class="text-secondary">This post has no image.</p>
                    </div>
                `;
                return; // Exit function since there's no content to process
            } else {
                modalImagesContainer.innerHTML = ''; // Clear existing content

                window.images.forEach(image => {
                    const imgDiv = document.createElement('div');
                    imgDiv.classList.add('image-container');
                    imgDiv.innerHTML = `
                        <div class="row">
                            <div class="col-1 d-flex align-items-center">
                                <input type="checkbox" name="delete_images[]" value="${image}">
                            </div>
                            <div class="col-11">
                                <img src="{{ asset('storage/uploads') }}/${image}" class="img-fluid card-img-top" alt="...">
                            </div>
                        </div>
                    `;
                    modalImagesContainer.appendChild(imgDiv);
                });
            }
        });

        // handle image selection within the modal
        modalImagesContainer.addEventListener('change', function () {
            const selectedImages = modalImagesContainer.querySelectorAll('input[type="checkbox"]:checked').length;
            selectedImagesCount.textContent = `${selectedImages} selected`;
        });

        // Send select request to form
        document.getElementById('confirm-delete').addEventListener('click', function () {
            const selectedImages = Array.from(modalImagesContainer.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);

            // Update select count outside of modal
            const selectedCount = selectedImages.length;
            document.getElementById('selected-img-count').textContent = `${selectedCount} image${selectedCount === 1 ? '' : 's'} selected`;

            // Update hidden input with selected images
            document.getElementById('delete-selected-img').value = selectedImages.join(',');

            modal.hide();
        });
    </script>
</body>

</html>
