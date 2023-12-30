@extends('frontend.layouts.frontend-master')

@section('title', 'Timeline')

@section('content')
<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    <div class="main-content">
       <div class="mb-4 d-flex align-items-center">
          <div class="d-flex align-items-center">
             <a href="{{ route('index') }}" class="material-icons text-dark text-decoration-none m-none me-3">arrow_back</a>
             <p class="ms-2 mb-0 fw-bold text-body fs-6">{{ $user->name }}</p>
          </div>
       </div>
       <div class="bg-white rounded-4 shadow-sm profile">
            <div class="d-flex align-items-center px-3 pt-3">
                <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="img-fluid rounded-circle" alt="profile-img">
                <div class="ms-3">
                    <h6 class="mb-0 d-flex align-items-start text-body fs-6 fw-bold">{{ $user->name }} <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></h6>
                    <p class="text-muted mb-0">{{ $user->username }}</p>
                </div>
                <div class="ms-auto btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check followerStatusBtn" id="btncheck{{ $user->id }}" data-id="{{ $user->id }}" {{ $followStatus ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck{{ $user->id }}">
                        {{ $followStatus ? 'Following' : 'Follow' }}
                    </label>
                </div>
            </div>
            <div class="p-3">
                <p class="mb-2 fs-6">The standard chunk of Lorem Ipsum used since is reproduced. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature..</p>
                <span class="material-icons text-muted md-16 m-3">calendar_today</span><strong class="badge bg-info">Joined on {{ $user->created_at->format('D d,M-Y') }}</strong>
                <div class="d-flex followers">
                    <div>
                    <p class="mb-0"> {{ $follower_count }} <span class="text-muted">Followers</span></p>
                    </div>
                    <div class="ms-5 ps-5">
                    <p class="mb-0">{{ $following_count }} <span class="text-muted">Following</span></p>
                    </div>
                </div>
          </div>
       </div>
       <ul class="top-osahan-nav-tab nav nav-pills justify-content-center nav-justified mb-4 shadow-sm rounded-4 overflow-hidden bg-white mt-4" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
             <button class="p-3 nav-link text-muted active" id="pills-feed-tab" data-bs-toggle="pill" data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed" aria-selected="true">Feed</button>
          </li>
          <li class="nav-item" role="presentation">
             <button class="p-3 nav-link text-muted" id="pills-people-tab" data-bs-toggle="pill" data-bs-target="#pills-people" type="button" role="tab" aria-controls="pills-people" aria-selected="false">Profile</button>
          </li>
       </ul>
       <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
             <div class="ms-1">
                <div class="feeds" id="timelinePagePostList">
                    @include('frontend.post.index')
                </div>
             </div>
            </div>
            <div class="tab-pane fade" id="pills-people" role="tabpanel" aria-labelledby="pills-people-tab">
                <div class="feeds">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="img-fluid rounded-circle user-img mb-3" alt="profile-img">
                            <p>Name:  {{ $user->name }}</p>
                            <p>Username:  {{ $user->username ? $user->username : 'N/A'}}</p>
                        </div>
                        <div class="card-body">
                            <p>Gender:  {{ $user->gender ? $user->gender : 'N/A' }}</p>
                            <p>Date of Birth:  {{ $user->date_of_birth ? $user->date_of_birth : 'N/A' }}</p>
                            <p>Address:  {{ $user->address ? $user->address : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</main>
@endsection
