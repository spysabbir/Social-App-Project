@extends('frontend.layouts.auth-master')

@section('title', 'Forgot Password')

@section('content')
<div class="main-content mb-5">
    <div class="card">
        <div class="card-header p-3 bg-success text-center text-white">
            <h5 class="text-center">Forgot Password</h5>
            <a class="text-white" href="{{ route('login') }}">Remember the password? Login...</a>
        </div>
        <div class="card-body">
            <p>
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>

            @if (session('status'))
                <div class="alert alert-primary">
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Email Password Reset Link</button>
            </form>
        </div>
    </div>
</div>
@endsection
