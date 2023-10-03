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
                                <a href="index-2.html" class="text-decoration-none">
                                    <img src="{{ asset('frontend') }}/img/logo.png" class="img-fluid logo" alt="brand-logo">
                                </a>
                            </div>
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="nav-item">
                                    <a href="{{ route('ignition.updateConfig') }}" class="nav-link active"><span class="material-icons me-3">house</span> <span>Feed</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="profile.html" class="nav-link"><span class="material-icons me-3">account_circle</span> <span>Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="explore.html" class="nav-link"><span class="material-icons me-3">explore</span> <span>Explore</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-2.html" class="nav-link"><span class="material-icons me-3">logout</span> <span>Logout</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="tags.html" class="nav-link"><span class="material-icons me-3">local_fire_department</span> <span>Trending</span></a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-primary w-100 text-decoration-none rounded-4 py-3 fw-bold text-uppercase m-0" data-bs-toggle="modal" data-bs-target="#logoutModal">Log Out</a>
                    </div>
                    <div class="ps-0 m-none fix-sidebar">
                        <div class="sidebar-nav mb-3">
                            <div class="pb-4 mb-4">
                                <a href="index-2.html" class="text-decoration-none">
                                    <img src="{{ asset('frontend') }}/img/logo.png" class="img-fluid logo" alt="brand-logo">
                                </a>
                            </div>
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="nav-item">
                                    <a href="index-2.html" class="nav-link active"><span class="material-icons me-3">house</span> <span>Feed</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="profile.html" class="nav-link"><span class="material-icons me-3">account_circle</span> <span>Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="explore.html" class="nav-link"><span class="material-icons me-3">explore</span> <span>Explore</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-2.html" class="nav-link"><span class="material-icons me-3">logout</span> <span>Logout</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="tags.html" class="nav-link"><span class="material-icons me-3">local_fire_department</span> <span>Trending</span></a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-danger w-100 text-decoration-none rounded-4 py-3 fw-bold text-uppercase m-0" onclick="event.preventDefault();  document.getElementById('logout_btn').submit();">Log Out</a>
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
                            <div class="bg-white rounded-4 overflow-hidden shadow-sm mb-4">
                                <h6 class="fw-bold text-body p-3 mb-0 border-bottom">What's happening</h6>
                                <a href="tags.html" class="p-3 border-bottom d-flex align-items-center text-dark text-decoration-none">
                                    <div>
                                        <div class="text-muted fw-light d-flex align-items-center">
                                        <small>Celebrity</small><span class="mx-1 material-icons md-3">circle</span><small>Live</small>
                                        </div>
                                        <p class="fw-bold mb-0 pe-3">Happy birthday, Osahan 🎂</p>
                                        <small class="text-muted">Trending with</small><br>
                                        <span class="text-primary">#HappyBirthdayJohnSmith</span>
                                    </div>
                                    <img src="{{ asset('frontend') }}/img/rmate4.jpg" class="img-fluid rounded-4 ms-auto" alt="profile-img">
                                </a>
                                <a href="tags.html" class="p-3 border-bottom d-flex align-items-center text-dark text-decoration-none">
                                    <div>
                                        <div class="text-muted fw-light d-flex align-items-center"></div>
                                        <p class="fw-bold mb-0 pe-3">#SelectricsM12</p>
                                        <small class="text-muted">Buy now with exclusive offers</small><br>
                                        <small class="text-muted d-flex align-items-center"><span class="material-icons me-1 small">open_in_new</span>Promoted by Selectrics World</small>
                                    </div>
                                </a>
                                <div class="p-3 border-bottom d-flex">
                                    <div>
                                        <div class="text-muted fw-light d-flex align-items-center">
                                        <small>Trending in India</small>
                                        </div>
                                        <p class="fw-bold mb-0 pe-3 text-dark">#ME11Lite</p>
                                        <small class="text-muted">Buy now with exclusive offers</small><br>
                                        <small class="text-muted">52.8k Tweets</small>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a href="#" class="text-muted text-decoration-none material-icons ms-2 md-20 rounded-circle bg-light p-1" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">more_vert</a>
                                        <ul class="dropdown-menu fs-13 dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                        <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">sentiment_very_dissatisfied</span>Not interested in this</a></li>
                                        <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">sentiment_very_dissatisfied</span>This trend is harmful or spammy</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="p-3 border-bottom d-flex">
                                    <div>
                                        <div class="text-muted fw-light d-flex align-items-center">
                                        <small>Trending in India</small>
                                        </div>
                                        <p class="fw-bold mb-0 pe-3 text-dark">News</p>
                                        <small class="text-muted">52.8k Tweets</small>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a href="#" class="text-muted text-decoration-none material-icons ms-2 md-20 rounded-circle bg-light p-1" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-expanded="false">more_vert</a>
                                        <ul class="dropdown-menu fs-13 dropdown-menu-end" aria-labelledby="dropdownMenuButton6">
                                        <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">sentiment_very_dissatisfied</span>Not interested in this</a></li>
                                        <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">sentiment_very_dissatisfied</span>This trend is harmful or spammy</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="tags.html" class="p-3 border-bottom d-flex align-items-center text-dark text-decoration-none">
                                    <div>
                                        <div class="text-muted fw-light d-flex align-items-center">
                                        <small>Design</small><span class="mx-1 material-icons md-3">circle</span><small>Live</small>
                                        </div>
                                        <p class="fw-bold mb-0 pe-3">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <img src="{{ asset('frontend') }}/img/trend1.jpg" class="img-fluid rounded-4 ms-auto" alt="trending-img">
                                </a>
                                <a href="explore.html" class="text-decoration-none">
                                    <div class="p-3">Show More</div>
                                </a>
                            </div>
                            <div class="bg-white rounded-4 overflow-hidden shadow-sm account-follow mb-4">
                                <h6 class="fw-bold text-body p-3 mb-0 border-bottom">Who to follow</h6>
                                <div class="p-3 border-bottom d-flex text-dark text-decoration-none account-item">
                                    <a href="profile.html">
                                    <img src="{{ asset('frontend') }}/img/rmate5.jpg" class="img-fluid rounded-circle me-3" alt="profile-img">
                                    </a>
                                    <div>
                                        <p class="fw-bold mb-0 pe-3 d-flex align-items-center"><a class="text-decoration-none text-dark" href="profile.html">Webartinfo</a><span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                                        <div class="text-muted fw-light">
                                        <p class="mb-1 small">@abcdsec</p>
                                        <span class="text-muted d-flex align-items-center small"><span class="material-icons me-1 small">open_in_new</span>Promoted</span>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncddheck7">
                                        <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncddheck7"><span class="follow">+ Follow</span><span class="following d-none">Following</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 border-bottom d-flex text-dark text-decoration-none account-item">
                                    <a href="profile.html">
                                    <img src="{{ asset('frontend') }}/img/rmate4.jpg" class="img-fluid rounded-circle me-3" alt="profile-img">
                                    </a>
                                    <div>
                                        <p class="fw-bold mb-0 pe-3 d-flex align-items-center"><a class="text-decoration-none text-dark" href="profile.html">John Smith</a><span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                                        <div class="text-muted fw-light">
                                        <p class="mb-1 small">@johnsmith</p>
                                        <span class="text-muted d-flex align-items-center small">Designer</span>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck8">
                                        <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck8"><span class="follow">+ Follow</span><span class="following d-none">Following</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 d-flex text-dark text-decoration-none account-item">
                                    <a href="profile.html">
                                    <img src="{{ asset('frontend') }}/img/rmate3.jpg" class="img-fluid rounded-circle me-3" alt="profile-img">
                                    </a>
                                    <div>
                                        <p class="fw-bold mb-0 pe-3 d-flex align-items-center"><a class="text-decoration-none text-dark" href="profile.html">Konex</a><span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                                        <div class="text-muted fw-light">
                                        <p class="mb-1 small">@Konex</p>
                                        <span class="text-muted d-flex align-items-center small">Artist/Author...</span>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck9">
                                        <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck9"><span class="follow">+ Follow</span><span class="following d-none">Following</span></label>
                                        </div>
                                    </div>
                                </div>
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
                <a target="_blank" href="#" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-facebook"></i></a>
                <a target="_blank" href="#" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-twitter"></i></a>
                <a target="_blank" href="#" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-linkedin"></i></a>
                <a target="_blank" href="#" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-youtube-play"></i></a>
                <a target="_blank" href="#" class="btn social-btn btn-sm text-decoration-none"><i class="icofont-instagram"></i></a>
            </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- postModal Start -->
    <div class="modal fade" id="postModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 p-4 border-0 bg-light">
                <div class="modal-header d-flex align-items-center justify-content-start border-0 p-0 mb-3">
                    <a href="#" class="text-muted text-decoration-none material-icons" data-bs-dismiss="modal">arrow_back_ios_new</a>
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
                        <input type="file" class="form-control" name="image_path" id="postImage">
                    </div>
                    <div class="ms-auto m-0">
                        <button type="submit" class="btn btn-primary rounded-5 fw-bold px-3 py-2 fs-6 mb-0 d-flex align-items-center"><span class="material-icons me-2 md-16">send</span>Post</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- postModal End -->

    <!-- logoutModal Start -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 p-4 border-0">
            <div class="modal-header border-0 p-1">
                <h6 class="modal-title fw-bold text-body fs-6" id="exampleModalLabel">Are you sure?</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body p-0">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- logoutModal End -->

    <!-- commentModal Start -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 overflow-hidden border-0">
            <div class="modal-header d-none">
                <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row m-0">
                    <div class="col-sm-7 px-0 m-sm-none">
                        <div class="image-slider">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('frontend') }}/img/post-img1.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend') }}/img/post-img2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend') }}/img/post-img3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-5 content-body px-web-0">
                        <div class="d-flex flex-column h-600">
                        <div class="d-flex p-3 border-bottom">
                            <img src="{{ asset('frontend') }}/img/rmate4.jpg" class="img-fluid rounded-circle user-img" alt="profile-img">
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <a href="profile.html" class="text-decoration-none ms-3">
                                    <div class="d-flex align-items-center">
                                    <h6 class="fw-bold text-body mb-0">iamosahan</h6>
                                    <p class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon mb-0">done</p>
                                    </div>
                                    <p class="text-muted mb-0 small">@johnsmith</p>
                                </a>
                                <div class="small dropdown">
                                    <a href="#" class="text-muted text-decoration-none material-icons ms-2 md-" data-bs-dismiss="modal">close</a>
                                </div>
                            </div>
                        </div>
                        <div class="comments p-3">
                            <div class="d-flex mb-2">
                                <img src="{{ asset('frontend') }}/img/rmate1.jpg" class="img-fluid rounded-circle" alt="profile-img">
                                <div class="ms-2 small">
                                    <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                    <p class="fw-500 mb-0">Macie Bellis</p>
                                    <span class="text-muted">Consectetur adipisicing elit.</span>
                                    </div>
                                    <div class="d-flex align-items-center ms-2">
                                    <a href="#" class="small text-muted text-decoration-none">Like</a>
                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                    <a href="#" class="small text-muted text-decoration-none">Reply</a>
                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                    <span class="small text-muted">1h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <img src="{{ asset('frontend') }}/img/rmate3.jpg" class="img-fluid rounded-circle" alt="profile-img">
                                <div class="ms-2 small">
                                    <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                    <p class="fw-500 mb-0">John Smith</p>
                                    <span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
                                    </div>
                                    <div class="d-flex align-items-center ms-2">
                                    <a href="#" class="small text-muted text-decoration-none">Like</a>
                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                    <a href="#" class="small text-muted text-decoration-none">Reply</a>
                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                    <span class="small text-muted">20min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <img src="{{ asset('frontend') }}/img/rmate2.jpg" class="img-fluid rounded-circle" alt="profile-img">
                                <div class="ms-2 small">
                                    <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                    <p class="fw-500 mb-0">Shay Jordon</p>
                                    <span class="text-muted">With our vastly improved notifications system, users have more control.</span>
                                    </div>
                                    <div class="d-flex align-items-center ms-2">
                                    <a href="#" class="small text-muted text-decoration-none">Like</a>
                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                    <a href="#" class="small text-muted text-decoration-none">Reply</a>
                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                    <span class="small text-muted">10min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top p-3 mt-auto">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">thumb_up_off_alt</span><span>30.4k</span></a>
                                </div>
                                <div>
                                    <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">repeat</span><span>617</span></a>
                                </div>
                                <div>
                                    <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-18 me-2">share</span><span>Share</span></a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons bg-white border-0 text-primary pe-2 md-36">account_circle</span>
                                <div class="d-flex align-items-center border rounded-4 px-3 py-1 w-100">
                                    <input type="text" class="form-control form-control-sm p-0 rounded-3 fw-light border-0" placeholder="Write Your comment">
                                    <a href="#" class="bg-white border-0 text-primary ps-2 text-decoration-none">Post</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
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

            // Store Image Preview
            $('#postImage').change(function(){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#postImagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(this.files[0]);
            });

            // Store Data
            $('#createPostForm').on('submit', function (e) {
                e.preventDefault();
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
                            $("#postModal").modal('hide');
                            toastr.success(response.message);
                        }
                    },
                });
            });
        })
    </script>

    @yield('script')
</body>
</html>
