@extends('frontend.layouts.frontend-master')

@section('title', 'Home')

@section('content')

@include('frontend.layouts.navigation')

<h1>Frontend Home Page</h1>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Body</p>
            </div>
            <div class="card-body">
              <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Post Content</label>
                    <textarea class="form-control" name="content" placeholder="Enter content">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Post Photo</label>
                    <input type="file" class="form-control" name="image_path">
                    @error('image_path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-info">Upload</button>
              </form>
            </div>
        </div>
        <div class="card">
            @forelse ($allPost as $post)
            <div class="card-header">
                {{ $post->user_id }}
                {{ $post->created_at }}
            </div>
            <div class="card-body">
                {{ $post->content }}
               <img src="{{ asset('uploads/post_photo') }}/{{ $post->image_path }}" alt="">
            </div>
            @empty
                <div class="alert alert-info">
                    <strong>Post Not Found</strong>
                </div>
            @endforelse
        </div>
      </div>
  </div>
</div>
@endsection
