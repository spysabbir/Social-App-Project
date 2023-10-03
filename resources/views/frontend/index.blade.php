@extends('frontend.layouts.frontend-master')

@section('title', 'Home')

@section('content')
<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    <div class="main-content">
        <ul class="top-osahan-nav-tab nav nav-pills justify-content-center nav-justified mb-4 shadow-sm rounded-4 overflow-hidden bg-white sticky-sidebar2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="p-3 nav-link text-muted active" id="pills-feed-tab" data-bs-toggle="pill" data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed" aria-selected="true">Feed</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="p-3 nav-link text-muted" id="pills-people-tab" data-bs-toggle="pill" data-bs-target="#pills-people" type="button" role="tab" aria-controls="pills-people" aria-selected="false">People</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="p-3 nav-link text-muted" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- Feed Start -->
            <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
                <div class="input-group mb-4 shadow-sm rounded-4 overflow-hidden py-2 bg-white" data-bs-toggle="modal" data-bs-target="#postModal">
                    <span class="input-group-text material-icons border-0 bg-white text-primary">account_circle</span>
                    <input type="text" class="form-control border-0 fw-light ps-1" placeholder="What's on your mind.">
                    <a href="#" class="text-decoration-none input-group-text bg-white border-0 material-icons text-primary">add_circle</a>
                </div>
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0 fw-bold text-body">Follow People</h6>
                    <a href="#" class="text-dark text-decoration-none material-icons">east</a>
                    </div>

                    <!-- Follow People Start -->
                    <div class="account-slider">
                        @forelse ($allUser->take(10) as $user)
                        <div class="account-item">
                            <div class="me-2 bg-white shadow-sm rounded-4 p-3 user-list-item d-flex justify-content-center my-2">
                                <div class="text-center">
                                    <div class="position-relative d-flex justify-content-center">
                                        <a href="profile.html" class="text-decoration-none">
                                            <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="img-fluid rounded-circle mb-3" alt="profile-img">
                                            <div class="position-absolute">
                                                <span class="material-icons bg-primary small p-1 fw-bold text-white rounded-circle">done</span>
                                            </div>
                                        </a>
                                    </div>
                                    <p class="fw-bold text-dark m-0">{{ $user->name }}</p>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check followerStatusBtn" id="btncheck1" data-id="{{ $user->id }}" {{ App\Models\Follower::where('follower_id', $user->id)->where('following_id', Auth::user()->id)->first() ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck1"><span class="follow">Follow</span><span class="following d-none">Following</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-primary">
                            <strong>User Not Found</strong>
                        </div>
                        @endforelse
                    </div>
                    <!-- Follow People End -->

                    <!-- Post Start -->
                    <div class="pt-4 feeds">
                        @forelse ($allPost as $post)
                        <div class="bg-white p-3 feed-item rounded-4 mb-3 shadow-sm">
                            <div class="d-flex">
                                <img src="{{ asset('uploads/profile_photo') }}/{{ $post->user->profile_photo }}" class="img-fluid rounded-circle user-img" alt="profile-img">
                                <div class="d-flex ms-3 align-items-start w-100">
                                    <div class="w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="profile.html" class="text-decoration-none d-flex align-items-center">
                                            <h6 class="fw-bold mb-0 text-body">{{ $post->user->name }}</h6>
                                            <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span>
                                            <small class="text-muted ms-2">{{ $post->user->username }}</small>
                                        </a>
                                        <div class="d-flex align-items-center small">
                                            <p class="text-muted mb-0">{{ $post->created_at->format('D d-M,Y h:i:s A') }}</p>
                                            <div class="dropdown">
                                                <a href="#" class="text-muted text-decoration-none material-icons ms-2 md-20 rounded-circle bg-light p-1" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">more_vert</a>
                                                <ul class="dropdown-menu fs-13 dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                                    <li data-id="{{ $post->id }}" class="editBtn"><a class="dropdown-item text-muted" href="javascript:void(0)"><span class="material-icons md-13 me-1">edit</span>Edit</a></li>
                                                    <li data-id="{{ $post->id }}" class="deleteBtn"><a class="dropdown-item text-muted" href="javascript:void(0)"><span class="material-icons md-13 me-1">delete</span>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <p class="text-dark">{{ $post->content }}</p>
                                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <img src="{{ asset('uploads/post_photo') }}/{{ $post->image_path }}" class="img-fluid rounded mb-3" alt="post-img">
                                        </a>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div>
                                                <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">thumb_up_off_alt</span><span>30.4k</span></a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">chat_bubble_outline</span><span>4.0k</span></a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3" data-bs-toggle="modal" data-bs-target="#commentModal">
                                            <span class="material-icons bg-white border-0 text-primary pe-2 md-36">account_circle</span>
                                            <input type="text" class="form-control form-control-sm rounded-3 fw-light" placeholder="Write Your comment" readonly>
                                        </div>
                                        <div class="comments">
                                            <div class="d-flex mb-2">
                                                <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                                <img src="{{ asset('frontend') }}/img/rmate1.jpg" class="img-fluid rounded-circle" alt="commenters-img">
                                                </a>
                                                <div class="ms-2 small">
                                                <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                                    <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                                        <p class="fw-500 mb-0">Macie Bellis</p>
                                                        <span class="text-muted">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</span>
                                                    </div>
                                                </a>
                                                <div class="d-flex align-items-center ms-2">
                                                    <a href="#" class="small text-muted text-decoration-none">Like</a>
                                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                                    <a href="#" class="small text-muted text-decoration-none">Reply</a>
                                                    <span class="fs-3 text-muted material-icons mx-1">circle</span>
                                                    <span class="small text-muted">1h</span>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-info">
                            <strong>Post Not Found</strong>
                        </div>
                        @endforelse
                    </div>
                    <!-- Post End -->

                </div>
            </div>
            <!-- Feed End -->

            <!-- People Start -->
            <div class="tab-pane fade" id="pills-people" role="tabpanel" aria-labelledby="pills-people-tab">
                <h6 class="mb-3 fw-bold text-body">People you can follow</h6>
                <div class="bg-white rounded-4 overflow-hidden mb-4 shadow-sm">
                    @forelse ($allUser as $user)
                    <a href="profile.html" class="p-3 border-bottom d-flex text-dark text-decoration-none account-item pf-item">
                        <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="img-fluid rounded-circle me-3" alt="profile-img">
                        <div>
                            <p class="fw-bold mb-0 pe-3 d-flex align-items-center">{{ $user->name }} <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                            <div class="text-muted fw-light">
                                <p class="mb-1 small">{{ $user->username }}</p>
                                <span class="text-muted d-flex align-items-center small"><span class="material-icons me-1 small">open_in_new</span>Promoted</span>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check followerStatusBtn" id="btncheck1" data-id="{{ $user->id }}" {{ App\Models\Follower::where('follower_id', $user->id)->where('following_id', Auth::user()->id)->first() ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck1"><span class="follow">Follow</span><span class="following d-none">Following</span></label>
                            </div>
                        </div>
                    </a>
                    @empty

                    @endforelse
                </div>
            </div>
            <!-- People End -->

            <!-- Trending Start -->
            <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                <div class="input-group shadow-sm mb-3 rounded-4 overflow-hidden py-2 bg-white" data-bs-toggle="modal" data-bs-target="#postModal">
                    <span class="input-group-text material-icons border-0 bg-white text-primary">account_circle</span>
                    <input type="text" class="form-control border-0 fw-light ps-1" placeholder="What's on your mind.">
                    <a href="#" class="text-decoration-none input-group-text bg-white border-0 material-icons text-primary">add_circle</a>
                </div>
                <div class="feeds">
                    <div class="bg-white p-3 feed-item rounded-4 mb-3 shadow-sm">
                    <div class="d-flex">
                        <img src="{{ asset('frontend') }}/img/rmate1.jpg" class="img-fluid rounded-circle user-img" alt="profile-img">
                        <div class="d-flex ms-3 align-items-start w-100">
                            <div>
                                <div class="d-flex align-items-center justify-content-between">
                                <a href="profile.html" class="text-decoration-none d-flex align-items-center">
                                    <h6 class="fw-bold mb-0 text-body">Shay Jordon</h6>
                                    <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span>
                                    <small class="text-muted ms-2">@shay-jordon</small>
                                </a>
                                <div class="d-flex align-items-center small">
                                    <p class="text-muted mb-0">19 Feb</p>
                                    <div class="dropdown">
                                        <a href="#" class="text-muted text-decoration-none material-icons ms-2 md-20 rounded-circle bg-light p-1" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">more_vert</a>
                                        <ul class="dropdown-menu fs-13 dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                                            <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">edit</span>Edit</a></li>
                                            <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">delete</span>Delete</a></li>
                                            <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1 ltsp-n5">arrow_back_ios arrow_forward_ios</span>Embed Vogel</a></li>
                                            <li><a class="dropdown-item text-muted d-flex align-items-center" href="#"><span class="material-icons md-13 me-1">share</span>Share via another apps</a></li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
                                <div class="my-2">
                                <p>Congue aliquam scripserit eam ex, vis ad prompta mnesarchum, ad atqui suscipit vel. Omnis soluta ut mel, eum consequat adversarium definitionem ei. Sit cu elit laboramus similique, error exerci tacimates nam eu. Ferri eirmod latine ex sit. Cu nec munere viderer. Vix inermis periculis abhorreant te. Augue homero prompta eum eu, no est discere commune, velit mentitum vis ne.
                                    🙂
                                </p>
                                <p class="text-dark">Happy Vogel to you!</p>
                                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                <img src="{{ asset('frontend') }}/img/post1.png" class="img-fluid rounded mb-3" alt="post-img">
                                </a>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">thumb_up_off_alt</span><span>30.4k</span></a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">chat_bubble_outline</span><span>4.0k</span></a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">repeat</span><span>617</span></a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-18 me-2">share</span><span>Share</span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3" data-bs-toggle="modal" data-bs-target="#commentModal">
                                    <span class="material-icons bg-white border-0 text-primary pe-2 md-36">account_circle</span>
                                    <input type="text" class="form-control form-control-sm rounded-3 fw-light" placeholder="Write Your comment">
                                </div>
                                <div class="comments">
                                    <div class="d-flex mb-2">
                                        <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <img src="{{ asset('frontend') }}/img/rmate1.jpg" class="img-fluid rounded-circle" alt="commenters-img">
                                        </a>
                                        <div class="ms-2 small">
                                            <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                            <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                                <p class="fw-500 mb-0">Macie Bellis</p>
                                                <span class="text-muted">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</span>
                                            </div>
                                            </a>
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
                                        <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <img src="{{ asset('frontend') }}/img/rmate3.jpg" class="img-fluid rounded-circle" alt="commenters-img">
                                        </a>
                                        <div class="ms-2 small">
                                            <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                            <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                                <p class="fw-500 mb-0">John Smith</p>
                                                <span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
                                            </div>
                                            </a>
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
                                        <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <img src="{{ asset('frontend') }}/img/rmate2.jpg" class="img-fluid rounded-circle" alt="commenters-img">
                                        </a>
                                        <div class="ms-2 small">
                                            <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                            <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                                <p class="fw-500 mb-0">Shay Jordon</p>
                                                <span class="text-muted">With our vastly improved notifications system, users have more control.</span>
                                            </div>
                                            </a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="bg-white p-3 feed-item rounded-4 mb-3 shadow-sm">
                    <div class="d-flex">
                        <img src="{{ asset('frontend') }}/img/rmate4.jpg" class="img-fluid rounded-circle user-img" alt="profile-img">
                        <div class="d-flex ms-3 align-items-start w-100">
                            <div>
                                <div class="d-flex align-items-center justify-content-between">
                                <a href="profile.html" class="text-decoration-none d-flex align-items-center">
                                    <h6 class="fw-bold mb-0 text-body">John Smith</h6>
                                    <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span>
                                    <small class="text-muted ms-2">@johnsmith</small>
                                </a>
                                <div class="d-flex align-items-center small">
                                    <p class="text-muted mb-0">19 Feb</p>
                                    <div class="dropdown">
                                        <a href="#" class="text-muted text-decoration-none material-icons ms-2 md-20 rounded-circle bg-light p-1" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">more_vert</a>
                                        <ul class="dropdown-menu fs-13 dropdown-menu-end" aria-labelledby="dropdownMenuButton4">
                                            <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">edit</span>Edit</a></li>
                                            <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1">delete</span>Delete</a></li>
                                            <li><a class="dropdown-item text-muted" href="#"><span class="material-icons md-13 me-1 ltsp-n5">arrow_back_ios arrow_forward_ios</span>Embed Vogel</a></li>
                                            <li><a class="dropdown-item text-muted d-flex align-items-center" href="#"><span class="material-icons md-13 me-1">share</span>Share via another apps</a></li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
                                <div class="my-2">
                                <p>Nam malis menandri ea, facete debitis volumus est ut, commune placerat nominati ei sea. Labore alterum probatus no sed, ius ea quas iusto inermis, ex tantas populo nonumes nam. Quo ad verear copiosae gubergren, quis commodo est et. </p>
                                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                <img src="{{ asset('frontend') }}/img/post2.png" class="img-fluid rounded mb-3" alt="post-img">
                                </a>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">thumb_up_off_alt</span><span>30.4k</span></a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">chat_bubble_outline</span><span>4.0k</span></a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-20 me-2">repeat</span><span>617</span></a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light"><span class="material-icons md-18 me-2">share</span><span>Share</span></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3" data-bs-toggle="modal" data-bs-target="#commentModal">
                                    <span class="material-icons bg-white border-0 text-primary pe-2 md-36">account_circle</span>
                                    <input type="text" class="form-control form-control-sm rounded-3 fw-light" placeholder="Write Your comment">
                                </div>
                                <div class="comments">
                                    <div class="d-flex mb-2">
                                        <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <img src="{{ asset('frontend') }}/img/rmate1.jpg" class="img-fluid rounded-circle" alt="commenters-img">
                                        </a>
                                        <div class="ms-2 small">
                                            <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                            <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                                <p class="fw-500 mb-0">Macie Bellis</p>
                                                <span class="text-muted">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</span>
                                            </div>
                                            </a>
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
                                        <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <img src="{{ asset('frontend') }}/img/rmate3.jpg" class="img-fluid rounded-circle" alt="commenters-img">
                                        </a>
                                        <div class="ms-2 small">
                                            <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                            <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                                <p class="fw-500 mb-0">John Smith</p>
                                                <span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</span>
                                            </div>
                                            </a>
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
                                        <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <img src="{{ asset('frontend') }}/img/rmate2.jpg" class="img-fluid rounded-circle" alt="commenters-img">
                                        </a>
                                        <div class="ms-2 small">
                                            <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#commentModal">
                                            <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                                <p class="fw-500 mb-0">Shay Jordon</p>
                                                <span class="text-muted">With our vastly improved notifications system, users have more control.</span>
                                            </div>
                                            </a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Trending End -->
        </div>
    </div>
    <div class="text-center mt-4">
       <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
       </div>
       <p class="mb-0 mt-2">Loading</p>
    </div>
 </main>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Delete Data
        $(document).on('click', '.deleteBtn', function(){
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
                        }
                    });
                }
            })
        })

        // Status Change
        $(document).on('click', '.followerStatusBtn', function () {
            var id = $(this).data('id');
            var url = "{{ route('follower.status', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    toastr.success('Follower status change successfully.');
                },
            });
        });
    })
</script>
@endsection
