<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Post - Little Smart Day Care Centre</title>

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
                    <h1>Edit Post</h1>
                </div>

                @isset($post)
                    <form action="{{ route('post.update', ['id' => $post->postid]) }}" method="POST" enctype="multipart/form-data">
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
                                <div class="col-md-7">
                                    <div class="row mt-4">
                                        <div class="col-3">
                                            <input type="submit" value="Save Post" class="btn btn-primary">
                                        </div>
                                        {{-- <div class="col-9">
                                            <button type="button" class="btn btn-danger" data-bs-target="#clearModal" data-bs-toggle="modal">Clear Image</button>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="image"><b>Image</b></label>
                                            <input type="file" accept="image/*" id="image" name="image" class="form-control">
                                            <picture>
                                                <img id="img-preview" src="{{ asset('storage/uploads/' . $post->image) }}" class="img-fluid card-img-top" alt="...">
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

        <!-- clear image modal -->
        <div class="modal fade" id="clearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Image Cleared.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>If you save now, the image will be lost forever.</p>
                        <p>If you go back, the image will remain.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal" id="modalOKBtn">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <small><i>
            © 2024 Little Smart Day Care Centre
        </i></small>
    </footer>
    <br>

    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- rich text editor, custom built -->
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

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
                // Set editor content after initialization
                editor.setData(`{{ $post->description }}`);
            } )
            .catch( error => {
                console.error( error );
            } );

        // show image preview when choosing image
        document.getElementById("image").onchange = evt => {
            const [file] = document.getElementById("image").files
            if (file) {
                document.getElementById("img-preview").src = URL.createObjectURL(file)
            }
        }

        // clear image modal handling
        var clearModal = document.getElementById('clearModal');
        var notyf = new Notyf();

        clearModal.addEventListener('shown.bs.modal', (event) => {
            modalKeepBtn.focus();

            var button = event.relatedTarget;
            // var studentID = button.getAttribute('data-bs-id');

            // modalDeleteBtn.setAttribute('data-bs-id', studentID);
        })

        modalDeleteBtn.onclick = function () {
            // var studentID = modalDeleteBtn.getAttribute('data-bs-id');
            // var csrfToken = '{{ csrf_token() }}';

            // fetch(`/roster/${studentID}`, {
            //     method: 'DELETE',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': csrfToken
            //     }
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         deleteModal.classList.remove('show');
            //         notyf.success(data.success);
            //         setTimeout(() => {
            //             window.location.reload();
            //         }, 2500);
            //     } else {
            //         notyf.error(data.error);
            //     }
            // })
            // .catch(error => {
            //     notyf.error('We encountered an error when deleting the entry.');
            // });
        };
    </script>
</body>

</html>
