@extends('frontend.layouts.frontend-master')

@section('title', 'Follower')

@section('content')
<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    <div class="main-content">
        <div class="mb-4 d-flex align-items-center">
            <div class="d-flex align-items-center">
               <a href="{{ route('index') }}" class="material-icons text-dark text-decoration-none m-none me-3">arrow_back</a>
               <p class="ms-2 mb-0 fw-bold text-body fs-6">{{ Auth::user()->name }}</p>
            </div>
        </div>
        <!-- People Start -->
        <div class="bg-white rounded-4 overflow-hidden mb-4 shadow-sm">
            @forelse ($allFollower as $follower)
            <a href="{{ route('timeline', $follower->relationToFollower->id) }}" class="p-3 border-bottom d-flex text-dark text-decoration-none account-item pf-item">
                <img src="{{ asset('uploads/profile_photo') }}/{{ $follower->relationToFollower->profile_photo }}" class="img-fluid rounded-circle me-3" alt="profile-img">
                <div>
                    <p class="fw-bold mb-0 pe-3 d-flex align-items-center">{{ $follower->relationToFollower->name }} <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                    <div class="text-muted fw-light">
                        <p class="mb-1 small">{{ $follower->relationToFollower->username }}</p>
                    </div>
                </div>
                <div class="ms-auto">
                    @php
                        $followingStatus = App\Models\Follower::where('follower_id', $follower->relationToFollower->id)->where('following_id', auth()->user()->id)->first();
                    @endphp
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check followerStatusBtn" id="btncheck{{ $follower->relationToFollower->id }}" data-id="{{ $follower->relationToFollower->id }}" {{ $followingStatus ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck{{ $follower->relationToFollower->id }}">
                            <label class="btn btn-outline-primary text-white btn-sm px-3 rounded-pill" for="btncheck{{ $follower->relationToFollower->id }}">{{ $followingStatus ? 'Following' : 'Follow' }}</label>
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
        <!-- People End -->
    </div>
 </main>
@endsection
