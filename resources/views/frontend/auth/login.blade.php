@extends('frontend.layouts.auth-master')

@section('title', 'Login')

@section('content')
<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
   <div class="main-content mb-5">
        <div class="card m-5">
            <div class="card-header p-3 bg-success text-center text-white">
                <h5 class="text-center">Login</h5>
                <a class="text-white" href="{{ route('register') }}">Don't have an account? Please create an account.</a>
            </div>
            <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-primary">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Enter password" />
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="remember_me" class="">
                            <input id="remember_me" type="checkbox" class="" name="remember">
                            <span class="">Remember me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success mb-3"> Log in</button>
                </form>

                <a class="" href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
        </div>
    </div>
</div>
@endsection
