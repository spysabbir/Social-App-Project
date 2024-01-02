@extends('backend.layouts.backend-master')

@section('title', 'User Activity')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Activity</h4>
            </div>
            <div class="card-body">
                {{ $user }}
                {{ $followerDetails }}
                {{ $followingDetails }}
                {{ $postDetails }}
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
