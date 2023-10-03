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
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- Feed Start -->
            <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
                <div class="input-group mb-4 shadow-sm rounded-4 overflow-hidden py-2 bg-white" data-bs-toggle="modal" data-bs-target="#createPostModal">
                    <span class="input-group-text material-icons border-0 bg-white text-primary">account_circle</span>
                    <input type="text" class="form-control border-0 fw-light ps-1" placeholder="What's on your mind.">
                    <a href="javascript:;" class="text-decoration-none input-group-text bg-white border-0 material-icons text-primary">add_circle</a>
                </div>
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0 fw-bold text-body">Follow People</h6>
                    </div>

                    <!-- Follow People Start -->
                    <div class="account-slider">
                        @forelse ($allUser->take(10) as $user)
                        <div class="account-item">
                            <div class="me-2 bg-white shadow-sm rounded-4 p-3 user-list-item d-flex justify-content-center my-2">
                                <div class="text-center">
                                    <div class="position-relative d-flex justify-content-center">
                                        <a href="{{ route('timeline', $user->id) }}" class="text-decoration-none">
                                            <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="img-fluid rounded-circle mb-3" alt="profile-img">
                                            <div class="position-absolute">
                                                <span class="material-icons bg-primary small p-1 fw-bold text-white rounded-circle">done</span>
                                            </div>
                                        </a>
                                    </div>
                                    <p class="fw-bold text-dark m-0">{{ $user->name }}</p>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check followerStatusBtn" id="btncheck{{ $user->id }}" data-id="{{ $user->id }}" >
                                        <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck{{ $user->id }}">
                                            <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck{{ $user->id }}">Follow</label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-primary">
                            <strong>People Not Found</strong>
                        </div>
                        @endforelse
                    </div>
                    <!-- Follow People End -->

                    <!-- Post Start -->
                    <div class="pt-4 feeds">
                        @forelse ($allPost as $post)
                            @include('frontend.layouts.post')
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
                    <a href="{{ route('timeline', $user->id) }}" class="p-3 border-bottom d-flex text-dark text-decoration-none account-item pf-item">
                        <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="img-fluid rounded-circle me-3" alt="profile-img">
                        <div>
                            <p class="fw-bold mb-0 pe-3 d-flex align-items-center">{{ $user->name }} <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                            <div class="text-muted fw-light">
                                <p class="mb-1 small">{{ $user->username }}</p>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check followerStatusBtn" id="btncheck{{ $user->id }}" data-id="{{ $user->id }}" >
                                <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck{{ $user->id }}">
                                    <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck{{ $user->id }}">
                                        Follow
                                    </label>
                                </label>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="alert alert-primary text-center m-3">
                        <strong>People Not Found</strong>
                    </div>
                    @endforelse
                </div>
            </div>
            <!-- People End -->
        </div>
    </div>
 </main>
@endsection
