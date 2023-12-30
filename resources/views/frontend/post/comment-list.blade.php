@forelse ($allComment as $comment)
<div class="comments p-3">
    <div class="d-flex mb-2">
        <a href="{{ route('timeline', $comment->user->username) }}" class="text-dark text-decoration-none">
            <img src="{{ asset('uploads/profile_photo') }}/{{ $comment->user->profile_photo }}" class="img-fluid rounded-circle user-img mb-3" alt="profile-img">
        </a>
        <div class="ms-2 small">
            <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                <p class="fw-500 mb-0">{{ $comment->user->name }}</p>
                <span class="text-muted">{{ $comment->comment_content }}</span>
            </div>
            <div class="ms-2">
                <span class="small text-muted">{{ $comment->created_at->format('D d,M-Y h:i"s A') }}</span>
                <br>
                @if ($comment->user_id == Auth::user()->id)
                <a href="{{ route('post.comment.delete', $comment->id) }}" class="text-danger text-decoration-none">
                    Delete
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
<hr>
@empty
<div class="alert alert-primary">
    <strong>Comment not found!</strong>
</div>
@endforelse
