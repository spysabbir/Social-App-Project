@extends('frontend.layouts.auth-master')

@section('title', 'Verify Email')

@section('content')
<div class="main-content mb-5">
    <div class="card m-5">
        <div class="card-header p-3 bg-success text-center text-white">
            <div class="test-info">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
            </div>
        </div>
        <div class="card-body">
            @if (session('status') == 'verification-link-sent')
                <div class="text-info">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button type="submit" class="btn btn-success">Resend Verification Email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf

                <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
        </div>
    </div>
</div>
@endsection
