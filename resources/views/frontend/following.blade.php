@extends('frontend.layouts.frontend-master')

@section('title', 'Following')

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
            @forelse ($allFollowing as $following)
            <a href="{{ route('timeline', $following->relationTofollowing->id) }}" class="p-3 border-bottom d-flex text-dark text-decoration-none account-item pf-item">
                <img src="{{ asset('uploads/profile_photo') }}/{{ $following->relationTofollowing->profile_photo }}" class="img-fluid rounded-circle me-3" alt="profile-img">
                <div>
                    <p class="fw-bold mb-0 pe-3 d-flex align-items-center">{{ $following->relationTofollowing->name }} <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></p>
                    <div class="text-muted fw-light">
                        <p class="mb-1 small">{{ $following->relationTofollowing->username }}</p>
                    </div>
                </div>
                <div class="ms-auto">
                    @php
                        $followingStatus = App\Models\Follower::where('follower_id', $following->relationTofollowing->id)->where('following_id', auth()->user()->id)->first();
                    @endphp
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check followerStatusBtn" id="btncheck{{ $following->relationTofollowing->id }}" data-id="{{ $following->relationTofollowing->id }}" {{ $followingStatus ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary btn-sm px-3 rounded-pill" for="btncheck{{ $following->relationTofollowing->id }}">
                            <label class="btn btn-outline-primary text-white btn-sm px-3 rounded-pill" for="btncheck{{ $following->relationTofollowing->id }}">{{ $followingStatus ? 'Following' : 'Follow' }}</label>
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
