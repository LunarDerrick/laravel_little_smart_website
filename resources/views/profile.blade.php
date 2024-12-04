<!DOCTYPE html>
<html lang="en">

@php
use App\Http\Helpers\roleHelper;
@endphp

<head>
    <title>Profile - Little Smart Day Care Centre</title>

    @include('components.header')
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
                    <div class="col-8 col-md overflow" id="fb-name">
                        {{ session('fb_name', '-') }}
                    </div>
                    <div class="col-8 d-block d-md-none"></div>
                    <div class="col-4 col-md-2 col-lg-4">
                        <!-- link fb -->
                        <button class="btn btn-info btn-fb align-items-center px-0 {{ session('fb_name') ? 'hidden' : 'd-flex' }}">
                            <div class="ps-2"><img src="{{ asset('media/facebook_logo.png') }}" alt="fb_logo" /></div>
                            <div class="ps-lg-1 pe-md-2 pe-lg-0">Link Facebook</div>
                        </button>
                        <!-- unlink fb -->
                        <button class="btn btn-secondary btn-unlink-fb align-items-center justify-content-center {{ session('fb_name') ? 'd-flex' : 'hidden' }}">
                            Unlink Facebook
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
    @include('components.facebook_plugin')
    @include('components.footer')
    @include('components.font-check')
    @include('components.spinner')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- items for notification toast -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>loadingPrompt('modalChangeBtn', 'submit-btn')</script>

    <!-- Facebook SDK for JS -->
    <!-- requires HTTPS testing -->
    <script>
        document.querySelector('.btn-fb').addEventListener('click', function() {
            FB.login(function(response) {
                if (response.authResponse) {
                    const accessToken = response.authResponse.accessToken;
                    FB.api('/me', function(response) {
                        const notyf = new Notyf();
                        document.getElementById('fb-name').textContent = response.name;
                        // need to save "response" for variables to pass through sessions/page refresh
                        // Send the response.authResponse to your backend to handle the token
                        fetch("{{ route('profile.store_fb') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-Token": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                name: response.name,
                                access_token: accessToken,
                            })
                        }).then(res => res.json()).then(data => {
                            if (data.success) {
                                notyf.success(data.success);
                            } else if (data.error) {
                                notyf.error(data.error);
                            }
                        });
                    });
                    document.querySelector('.btn-fb').classList.add('hidden');
                    document.querySelector('.btn-fb').classList.remove('d-flex');
                    document.querySelector('.btn-unlink-fb').classList.remove('hidden');
                    document.querySelector('.btn-unlink-fb').classList.add('d-flex');
                } else {
                    const notyf = new Notyf({
                        duration: 0,
                        dismissible: true,
                    });
                    notyf.error('User cancelled login or did not fully authorize.');
                }
            }, {
                // Request required permissions here
                scope: 'public_profile',
                // scope: 'public_profile, pages_manage_posts',
            });
        });

        document.querySelector('.btn-unlink-fb').addEventListener('click', function() {
            const notyf = new Notyf();
            FB.getLoginStatus(function(response) {
                FB.logout(function(response) {
                    fetch("{{ route('profile.unlink_fb') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-Token": "{{ csrf_token() }}"
                        }
                    }).then(res => res.json()).then(data => {
                        if (data.success) {
                            notyf.success(data.success);
                            document.getElementById('fb-name').textContent = '-';
                            document.querySelector('.btn-fb').classList.add('d-flex');
                            document.querySelector('.btn-fb').classList.remove('hidden');
                            document.querySelector('.btn-unlink-fb').classList.remove('d-flex');
                            document.querySelector('.btn-unlink-fb').classList.add('hidden');
                        } else if (data.error) {
                            notyf.error(data.error);
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
