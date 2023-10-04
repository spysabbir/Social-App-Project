<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/img/logo.png">

    <link href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/slick/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/slick/slick/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/icons/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('frontend') }}/plugins/toastr/toastr.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="theme-switch-wrapper ms-3">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox">
            <span class="slider round"></span>
            <i class="icofont-ui-brightness"></i>
        </label>
        <em>Enable Dark Mode!</em>
    </div>

    <div class="web-none d-flex align-items-center px-3 pt-3">
        <a href="{{ route('index') }}" class="text-decoration-none">
            <img src="{{ asset('frontend') }}/img/logo.png" class="img-fluid logo-mobile" alt="brand-logo">
        </a>
        <button class="ms-auto btn btn-primary ln-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="material-icons">menu</span>
        </button>
    </div>

    <div class="py-4">
        <div class="container">
            <div class="row position-relative">

                <!-- Content Start -->
                @yield('content')
                <!-- Content End -->

                <!-- Sidebar Left Start -->
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="p-2 bg-light offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample">
                        <div class="sidebar-nav mb-3">
                            <div class="pb-4">
                                <a href="{{ route('index') }}" class="text-decoration-none">
                                    <img src="{{ asset('frontend') }}/img/logo.png" class="img-fluid logo" alt="brand-logo">
                                </a>
                            </div>
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="nav-item">
                                    <a href="{{ route('index') }}" class="nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><span class="material-icons me-3">house</span> <span>Feed</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profile') }}" class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"><span class="material-icons me-3">account_circle</span> <span>Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('follower') }}" class="nav-link {{ Route::currentRouteName() == 'follower' ? 'active' : '' }}"><span class="material-icons me-3">explore</span> <span>Follower</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('following') }}" class="nav-link {{ Route::currentRouteName() == 'following' ? 'active' : '' }}"><span class="material-icons me-3">local_fire_department</span> <span>Following</span></a>
                                </li>
                            </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-danger w-100 text-decoration-none rounded-4 py-3 fw-bold text-uppercase m-0" onclick="event.preventDefault();  document.getElementById('logout_btn').submit();">Log Out</a>
                        <form id="logout_btn" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <div class="ps-0 m-none fix-sidebar">
                        <div class="sidebar-nav mb-3">
                            <div class="pb-4 mb-4">
                                <a href="{{ route('index') }}" class="text-decoration-none">
                                    <img src="{{ asset('frontend') }}/img/logo.png" class="img-fluid logo" alt="brand-logo">
                                </a>
                            </div>
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="nav-item">
                                    <a href="{{ route('index') }}" class="nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><span class="material-icons me-3">house</span> <span>Feed</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('profile') }}" class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"><span class="material-icons me-3">account_circle</span> <span>Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('follower') }}" class="nav-link {{ Route::currentRouteName() == 'follower' ? 'active' : '' }}"><span class="material-icons me-3">explore</span> <span>Follower</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('following') }}" class="nav-link {{ Route::currentRouteName() == 'following' ? 'active' : '' }}"><span class="material-icons me-3">local_fire_department</span> <span>Following</span></a>
                                </li>
                            </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-danger w-100 text-decoration-none rounded-4 py-3 fw-bold text-uppercase m-0" onclick="event.preventDefault();  document.getElementById('logout_btn').submit();">Log Out</a>
                        <form id="logout_btn" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </aside>
                <!-- Sidebar Left End -->

                <!-- Sidebar Right Start -->
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="fix-sidebar">
                        <div class="side-trend lg-none">
                            <div class="sticky-sidebar2 mb-3">
                                <div class="input-group mb-4 shadow-sm rounded-4 overflow-hidden py-2 bg-white">
                                    <span class="input-group-text material-icons border-0 bg-white text-primary">search</span>
                                    <input type="text" class="form-control border-0 fw-light ps-1" placeholder="Search Vogel">
                                </div>

                                <!-- Follower -->
                                <div class="bg-white rounded-4 overflow-hidden shadow-sm account-follow mb-4">
                                    <h6 class="fw-bold text-body p-3 mb-0 border-bottom">Follower</h6>
                                    @forelse ($allFollower->take(5) as $follower)
                                    <div class="p-3 border-bottom d-flex text-dark text-decoration-none account-item">
                                        <a href="{{ route('timeline', $follower->relationToFollower->id) }}">
                                            <img src="{{ asset('uploads/profile_photo') }}/{{ $follower->relationToFollower->profile_photo }}" class="img-fluid rounded-circle me-3" alt="profile-img">
                                        </a>
                                        <div>
                                            <p class="fw-bold mb-0 pe-3 d-flex align-items-center"><a class="text-decoration-none text-dark" href="{{ route('timeline', $follower->relationToFollower->id) }}">{{ $follower->relationToFollower->name }}</a><span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                                            <div class="text-muted fw-light">
                                            <p class="mb-1 small">{{ $follower->relationToFollower->user_name }}</p>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            @php
                                                $followingStatus = App\Models\Follower::where('follower_id', $follower->relationToFollower->id)->where('following_id', auth()->user()->id)->first();
                                            @endphp
                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                            <input type="checkbox" class="btn-check followerStatusBtn" data-id="{{ $follower->relationToFollower->id }}" id="btncddheck{{ $follower->relationToFollower->id }}" {{ $followingStatus ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncddheck{{ $follower->relationToFollower->id }}">
                                                {{ $followingStatus ? 'Following' : 'Follow' }}
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="alert alert-primary">
                                        <strong>Follower Not Found</strong>
                                    </div>
                                    @endforelse
                                </div>

                                <!-- Following -->
                                <div class="bg-white rounded-4 overflow-hidden shadow-sm account-follow mb-4">
                                    <h6 class="fw-bold text-body p-3 mb-0 border-bottom">Following</h6>
                                    @forelse ($allFollowing as $following)
                                    <div class="p-3 border-bottom d-flex text-dark text-decoration-none account-item">
                                        <a href="{{ route('timeline', $following->relationTofollowing->id) }}">
                                            <img src="{{ asset('uploads/profile_photo') }}/{{ $following->relationTofollowing->profile_photo }}" class="img-fluid rounded-circle me-3" alt="profile-img">
                                        </a>
                                        <div>
                                            <p class="fw-bold mb-0 pe-3 d-flex align-items-center"><a class="text-decoration-none text-dark" href="{{ route('timeline', $following->relationTofollowing->id) }}">{{ $following->relationTofollowing->name }}</a><span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                                            <div class="text-muted fw-light">
                                            <p class="mb-1 small">{{ $following->relationTofollowing->username }}</p>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                @php
                                                    $followingStatus = App\Models\Follower::where('follower_id', $following->relationTofollowing->id)->where('following_id', auth()->user()->id)->first();
                                                @endphp
                                            <input type="checkbox" class="btn-check followerStatusBtn" data-id="{{ $following->relationTofollowing->id }}" id="btncddheck{{ $following->relationTofollowing->id }}" {{ $followingStatus ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncddheck{{ $following->relationTofollowing->id }}">
                                                {{ $followingStatus ? 'Following' : 'Follow' }}
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="alert alert-primary">
                                        <strong>Following Not Found</strong>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Right End -->
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="py-3 bg-white footer-copyright">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-8">
                <span class="me-3 small">{{ date('Y') }} <b class="text-primary">{{ config('app.name', 'Laravel') }}</b>. All rights reserved</span>
            </div>
            <div class="col-md-4 text-end">
                <a target="_blank" href="javascript:;" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-facebook"></i></a>
                <a target="_blank" href="javascript:;" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-twitter"></i></a>
                <a target="_blank" href="javascript:;" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-linkedin"></i></a>
                <a target="_blank" href="javascript:;" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-youtube-play"></i></a>
                <a target="_blank" href="javascript:;" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-instagram"></i></a>
            </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- createPostModal Start -->
    <div class="modal fade" id="createPostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 p-4 border-0 bg-light">
                <div class="modal-header d-flex align-items-center justify-content-start border-0 p-0 mb-3">
                    <a href="javascript:;" class="text-muted text-decoration-none material-icons" data-bs-dismiss="modal">arrow_back_ios_new</a>
                    <h5 class="modal-title text-muted ms-3 ln-0" id="staticBackdropLabel"><span class="material-icons md-32">account_circle</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data"  id="createPostForm">
                @csrf
                <div class="modal-body p-0 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control rounded-5 border-0 shadow-sm" name="content" placeholder="Enter content" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2" class="h6 text-muted mb-0">What's on your mind...</label>
                        <span class="text-danger error-text content_error"></span>
                    </div>
                    <div class="form-floating mt-2">
                        <img src="" alt="postImage" id="postImagePreview" width="200" height="180">
                        <br>
                        <span class="text-danger error-text image_path_error"></span>
                    </div>
                </div>
                <div class="modal-footer justify-content-start px-1 py-1 bg-white shadow-sm rounded-5">
                    <div class="rounded-4 m-0 px-3 py-2 d-flex align-items-center justify-content-between w-75">
                        <input type="file" class="form-control" name="image_path" id="postImage" accept=".jpeg, .jpg, .png, .webp">
                    </div>
                    <div class="ms-auto m-0">
                        <button type="submit" class="btn btn-primary rounded-5 fw-bold px-3 py-2 fs-6 mb-0 d-flex align-items-center"><span class="material-icons me-2 md-16">send</span>Post</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- createPostModal End -->

    <!-- editPostModal Start -->
    <div class="modal fade" id="editPostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 p-4 border-0 bg-light">
                <div class="modal-header d-flex align-items-center justify-content-start border-0 p-0 mb-3">
                    <a href="javascript:;" class="text-muted text-decoration-none material-icons" data-bs-dismiss="modal">arrow_back_ios_new</a>
                    <h5 class="modal-title text-muted ms-3 ln-0" id="staticBackdropLabel"><span class="material-icons md-32">account_circle</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data"  id="editPostForm">
                @csrf
                @method('PATCH')
                <input type="hidden" id="post_id">
                <div class="modal-body p-0 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control rounded-5 border-0 shadow-sm post_content" name="content" placeholder="Enter content" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2" class="h6 text-muted mb-0">What's on your mind...</label>
                        <span class="text-danger error-text update_content_error"></span>
                    </div>
                    <div class="form-floating mt-2">
                        <img src="" alt="postImage" id="updateImagePreview" width="200" height="180">
                        <br>
                        <span class="text-danger error-text update_image_path_error"></span>
                    </div>
                </div>
                <div class="modal-footer justify-content-start px-1 py-1 bg-white shadow-sm rounded-5">
                    <div class="rounded-4 m-0 px-3 py-2 d-flex align-items-center justify-content-between w-75">
                        <input type="file" class="form-control" name="image_path" id="updateImage" accept=".jpeg, .jpg, .png, .webp">
                    </div>
                    <div class="ms-auto m-0">
                        <button type="submit" class="btn btn-primary rounded-5 fw-bold px-3 py-2 fs-6 mb-0 d-flex align-items-center"><span class="material-icons me-2 md-16">send</span>Post</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- editPostModal End -->

    <!-- likeModal Start -->
    <div class="modal fade" id="likeListModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 overflow-hidden border-0">
            <div class="modal-header d-none">
                <h5 class="modal-title" id="exampleModalLabel2">Like List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="likeModalBody">

            </div>
            <div class="modal-footer d-none"></div>
            </div>
        </div>
    </div>
    <!-- likeModal End -->

    <!-- commentModal Start -->
    <div class="modal fade" id="commentListModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 overflow-hidden border-0">
            <div class="modal-header d-none">
                <h5 class="modal-title" id="exampleModalLabel2">Comment List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="commentModalBody">

            </div>
            <div class="modal-footer d-none"></div>
            </div>
        </div>
    </div>
    <!-- commentModal End -->

    <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
    <script src="{{ asset('frontend') }}/vendor/slick/slick/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/rocket-loader.min.js" data-cf-settings="3a51f4ea14090e051aa8d211-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"80fdf8d63fab5fb6","version":"2023.8.0","r":1,"b":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
    <script src="{{ asset('frontend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('frontend') }}/plugins/toastr/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        });
    </script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Get All Post Data
            function indexPostData() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('index.post.data') }}',
                    success: function (response) {
                        $('#indexPagePostList').html(response);
                    },
                });
            }

            function profilePostData() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('profile.post.data') }}',
                    success: function (response) {
                        $('#profilePagePostList').html(response);
                    },
                });
            }

            // Post Store Image Preview
            $('#postImage').change(function(){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#postImagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(this.files[0]);
            });

            // Post Store Data
            $('#createPostForm').on('submit', function (e) {
                e.preventDefault();
                var currentRouteName = "{{ Route::currentRouteName() }}"
                const formData = new FormData(this);
                $.ajax({
                    url: "{{ route('post.store') }}",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend:function(){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if(response.status == 400){
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            })
                        }else{
                            $('#createPostForm')[0].reset();
                            $("#createPostModal").modal('hide');
                            toastr.success(response.message);
                            indexPostData();
                            profilePostData();
                            if(currentRouteName == 'timeline') {
                                window.location.reload();
                            }
                        }
                    },
                });
            });

            // Post Edit Data
            $(document).on('click', '.editBtn', function () {
                var id = $(this).data('id');
                var url = "{{ route('post.edit', ":id") }}";
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        $('#post_id').val(response.id);
                        $('.post_content').val(response.content);
                        $('#updateImagePreview').attr('src', "{{ asset('uploads/post_photo') }}"+"/"+ response.image_path);
                    },
                });
            });

            // Post Update Image Preview
            $('#updateImage').change(function(){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#updateImagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(this.files[0]);
            });

            // Post Update Data
            $('#editPostForm').on('submit', function (e) {
                e.preventDefault();
                var currentRouteName = "{{ Route::currentRouteName() }}"
                var id = $('#post_id').val();
                var url = "{{ route('post.update', ":id") }}";
                url = url.replace(':id', id)
                const formData = new FormData(this);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend:function(){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if(response.status == 400){
                            $.each(response.error, function(prefix, val){
                                $('span.update_'+prefix+'_error').text(val[0]);
                            })
                        }else{
                            $("#editPostModal").modal('hide');
                            toastr.success(response.message);
                            indexPostData();
                            profilePostData();
                            if(currentRouteName == 'timeline') {
                                window.location.reload();
                            }
                        }
                    },
                });
            });

            // Post Delete Data
            $(document).on('click', '.deleteBtn', function(){
                var currentRouteName = "{{ Route::currentRouteName() }}"
                var id = $(this).data('id');
                var url = "{{ route('post.destroy', ":id") }}";
                url = url.replace(':id', id)
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            success: function(response) {
                                toastr.warning('Post delete successfully.');
                                indexPostData();
                                profilePostData();
                                if(currentRouteName == 'timeline') {
                                    window.location.reload();
                                }
                            }
                        });
                    }
                })
            })

            // Follower Status Change
            $(document).on('click', '.followerStatusBtn', function () {
                var id = $(this).data('id');
                var url = "{{ route('follower.status', ":id") }}";
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        toastr.success('Following status change.');
                        window.location.reload();
                    },
                });
            });

            // Post Like
            $(document).on('click', '.postLikeBtn', function () {
                var currentRouteName = "{{ Route::currentRouteName() }}"
                var id = $(this).data('id');
                var url = "{{ route('post.like', ":id") }}";
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        indexPostData();
                        profilePostData();

                        if(currentRouteName == 'timeline') {
                            window.location.reload();
                        }
                    },
                });
            });

            // Post Comment
            $('.postCommentForm').on('submit', function (e) {
                e.preventDefault();
                var currentRouteName = "{{ Route::currentRouteName() }}"
                var id = $(this).find(".comment_post_id").val();
                var url = "{{ route('post.comment', ":id") }}";
                url = url.replace(':id', id)
                const formData = new FormData(this);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend:function(){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if(response.status == 400){
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            })
                        }else{
                            indexPostData();
                            profilePostData();
                            if(currentRouteName == 'timeline') {
                                window.location.reload();
                            }
                        }
                    },
                });
            });

            // Post Like List
            $(document).on('click', '.likeListBtn', function () {
                var id = $(this).data('id');
                var url = "{{ route('post.like.list', ":id") }}";
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        $('#likeModalBody').html(response);
                    },
                });
            });

            // Post Comment List
            $(document).on('click', '.commentListBtn', function () {
                var id = $(this).data('id');
                var url = "{{ route('post.comment.list', ":id") }}";
                url = url.replace(':id', id)
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        $('#commentModalBody').html(response);
                    },
                });
            });
        })
    </script>

    @yield('script')

</body>
</html>
