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
                {{ $post }}
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
