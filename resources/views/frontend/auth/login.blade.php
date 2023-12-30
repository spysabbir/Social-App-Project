@extends('frontend.layouts.auth-master')

@section('title', 'Login')

@section('content')
    <div class="main-content mt-5">
        <div class="card m-5">
            <div class="card-header p-3 bg-dark text-center text-white">
                <img src="{{ asset('frontend') }}/img/logo.png" class="img-fluid logo-mobile" alt="brand-logo">
                <h5 class="text-center mt-2">Login Now</h5>
            </div>
            <div class="card-body p-5">

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
                <div class="m-3 text-center">
                    <a class="btn btn-info" href="{{ route('register') }}">Don't have an account? Please create an account.</a>
                </div>
            </div>
        </div>
    </div>
@endsection
