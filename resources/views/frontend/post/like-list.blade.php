@forelse ($allLike as $like)
<div class="comments p-3 pb-0">
    <div class="d-flex">
        <a href="{{ route('timeline', $like->user->username) }}" class="text-dark text-decoration-none">
            <img src="{{ asset('uploads/profile_photo') }}/{{ $like->user->profile_photo }}" class="img-fluid rounded-circle user-img mb-3" alt="profile-img">
        </a>
        <div class="ms-2 small">
            <div class="ms-2">
                <p class="fw-500 mb-0">{{ $like->user->name }}</p>
                <span class="small text-muted">{{ $like->created_at->format('D d,M-Y h:i"s A') }}</span>
            </div>
        </div>
    </div>
</div>
<hr>
@empty
<div class="alert alert-primary">
    <strong>Like not found!</strong>
</div>
@endforelse
