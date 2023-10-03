<div class="bg-white p-3 feed-item rounded-4 mb-3 shadow-sm">
    <div class="d-flex">
        <img src="{{ asset('uploads/profile_photo') }}/{{ $post->user->profile_photo }}" class="img-fluid rounded-circle user-img" alt="profile-img">
        <div class="d-flex ms-3 align-items-start w-100">
            <div class="w-100">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('timeline', $post->user->id) }}" class="text-decoration-none d-flex align-items-center">
                    <h6 class="fw-bold mb-0 text-body">{{ $post->user->name }}</h6>
                    <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span>
                    <small class="text-muted ms-2">{{ $post->user->username }}</small>
                </a>
                <div class="d-flex align-items-center small">
                    <p class="text-muted mb-0">{{ $post->created_at->format('D d-M,Y h:i:s A') }}</p>
                    <div class="dropdown">
                        <a href="#" class="text-muted text-decoration-none material-icons ms-2 md-20 rounded-circle bg-light p-1" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">more_vert</a>
                        <ul class="dropdown-menu fs-13 dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <li data-id="{{ $post->id }}" class="editBtn"><a class="dropdown-item text-muted" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editPostModal"><span class="material-icons md-13 me-1">edit</span>Edit</a></li>
                            <li data-id="{{ $post->id }}" class="deleteBtn"><a class="dropdown-item text-muted" href="javascript:void(0)"><span class="material-icons md-13 me-1">delete</span>Delete</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="my-2">
                <p class="text-dark">{{ $post->content }}</p>
                <img src="{{ asset('uploads/post_photo') }}/{{ $post->image_path }}" class="img-fluid rounded mb-3" alt="post-img">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="postLikeBox">
                        <a data-id="{{ $post->id }}" href="javascript:void(0)" class="text-info text-decoration-none d-flex align-items-start fw-light postLikeBtn">
                            <span class="material-icons md-20 me-2 likeStatus">
                                {{ App\Models\Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first() ? 'thumb_up_off_alt' : 'thumb_down_off_alt' }}
                            </span>
                            <span class="likeCount">
                                {{ App\Models\Like::where('post_id', $post->id)->count() }}
                            </span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="text-muted text-decoration-none d-flex align-items-start fw-light" data-bs-toggle="modal" data-bs-target="#commentModal"><span class="material-icons md-20 me-2">chat_bubble_outline</span><span> {{ App\Models\Comment::where('post_id', $post->id)->count() }}</span></a>
                    </div>
                </div>
                <div class="d-flex align-items-center my-3">
                    <span class="material-icons bg-white border-0 text-primary pe-2 md-36">account_circle</span>
                    <form action="" method="POST" class="postCommentForm">
                        @csrf
                        <input type="hidden" class="comment_post_id" value="{{ $post->id }}">
                        <div class="d-flex align-items-center border rounded-4 ">
                            <textarea class="form-control p-0 rounded-3 fw-light border-0 comment_content" name="content" placeholder="Write Your comment"></textarea>
                            <button type="submit" class="btn btn-info border-0  ps-2 text-decoration-none">Comment</button>
                        </div>
                        <span class="text-danger error-text content_error"></span>
                    </form>
                </div>
                <div class="comments">
                    @forelse (App\Models\Comment::where('post_id', $post->id)->latest()->take(3)->get() as $comment)
                    <div class="d-flex mb-2">
                        <a href="#" class="text-dark text-decoration-none">
                            <img src="{{ asset('uploads/profile_photo') }}/{{ $comment->user->profile_photo }}" class="img-fluid rounded-circle user-img mb-3" alt="profile-img">
                        </a>
                        <div class="ms-2 small">
                            <a href="#" class="text-dark text-decoration-none">
                                <div class="bg-light px-3 py-2 rounded-4 mb-1 chat-text">
                                    <p class="fw-500 mb-0">{{ $comment->user->name }}</p>
                                    <span class="text-muted">{{ $comment->content }}</span>
                                </div>
                            </a>
                            <div class="d-flex align-items-center ms-2">
                                <span class="small text-muted">{{ $comment->created_at->format('D d,M-Y') }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-info">
                        <strong>Comment Not Found</strong>
                    </div>
                    @endforelse
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
