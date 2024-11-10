<!DOCTYPE html>
<html lang="en">

@php
use App\Http\Helpers\roleHelper;
@endphp

<head>
    <title>Profile - Little Smart Day Care Centre</title>

    @include('components.header')
    <!--chatbot-->
    <script src="https://code.tidio.co/0i12wozmwajexcywukm95pjuqf8tphpx.js" async></script>
</head>

<body>
    @include('components.navbar')

    <section id="profile">
        <!-- required -->
        @include('components.alert_notification')

        <h1><span>Profile</span></h1>
        <br>

        <div class="container">
            @if(@isset($user))
                <div class="row mb-4">
                    <div class="col-3 col-md-2"><b>Name</b></div>
                    <div class="col-1"><b>:</b></div>
                    <div class="col">{{ $user->name }}</div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 col-md-2"><b>Role</b></div>
                    <div class="col-1"><b>:</b></div>
                    <div class="col">{{ $user->role }}</div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 col-md-2"><b>Email</b></div>
                    <div class="col-1"><b>:</b></div>
                    <div class="col">{{ $user->email }}</div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 col-md-2"><b>Password</b></div>
                    <div class="col-1"><b>:</b></div>
                    <div class="col-8 col-md overflow">last updated {{ $user->updated_at->diffForHumans() }}</div>
                    <div class="col-8 d-block d-md-none"></div>
                    <div class="col-4 col-md-2 col-lg-4">
                        <button class="btn btn-warning" data-bs-target="#changeModal" data-bs-toggle="modal">Change Password</button>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 col-md-2"><b>Facebook</b></div>
                    <div class="col-1"><b>:</b></div>
                    <div class="col-8 col-md overflow">-</div>
                    <div class="col-8 d-block d-md-none"></div>
                    <div class="col-4 col-md-2 col-lg-4">
                        <button class="btn btn-info btn-fb d-flex align-items-center px-0">
                            <div class="ps-2"><img src="{{ asset('media/Facebook_Logo_Primary.png') }}" alt="fb_logo" /></div>
                            <div class="ps-lg-1 pe-md-2 pe-lg-0">Link FaceBook</div>
                        </button>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col">
                        @include('components.no_records')
                    </div>
                </div>
            @endif
            <div class="row my-5">
                <div class="col action">
                    @if(Auth::check() && roleHelper::roleCheck())
                        <button type="button" class="btn btn-primary" onclick="window.location='{{ route('roster') }}'">Admin Panel</button>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" id="logout">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- change modal -->
        <div class="modal fade" id="changeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="changeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changeModalLabel">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to change password?</p>
                        <strong>An email with link will be sent to you.</strong>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('password.email_link') }}" method="POST" id="modalChangeBtn">
                            @csrf
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <button type="submit" class="btn btn-dark mx-2" id="submit-btn">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span id="button-text">Change</span>
                            </button>
                        </form>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal" id="modalKeepBtn">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.send_feedback')
    @include('components.footer')
    @include('components.font-check')
    @include('components.spinner')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>loadingPrompt('modalChangeBtn', 'submit-btn')</script>
</body>

</html>
