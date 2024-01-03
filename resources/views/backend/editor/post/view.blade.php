@extends('backend.layouts.backend-master')

@section('title', 'Post View')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Post Panel</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h4 class="mb-3 text-info"><u>Post Details</u></h4>
                        <strong>User Name: </strong> {{ $post->user->name }} <br>
                        <strong>User Email: </strong> {{ $post->user->email }} <br>
                        <strong>Post Status: </strong><span class="badge bg-{{ $post->status === 'Active' ? 'success' : 'warning' }}">{{ $post->status }}</span> <br>
                        <strong>Post Create: </strong>{{ $post->created_at->format('D d-F,Y h:i:s A') }} <br>
                        <strong>Post Update: </strong>{{ $post->updated_at ? $post->updated_at : 'Not Update' }} <br>
                        <strong>Total Like: </strong><span class="badge bg-info">{{ $allLike->count() }}</span> <br>
                        <strong>Total Comment: </strong><span class="badge bg-info">{{ $allComment->count() }}</span> <br>
                    </div>
                    <div class="col-8">
                        <h4 class="mb-3 text-info"><u>Post Content</u></h4>
                        <p>{{ $post->post_content }}</p>
                        <img src="{{ asset('uploads/post_photo') }}/{{ $post->post_photo }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

    })
</script>
@endsection
