@extends('frontend.layouts.auth-master')

@section('title', 'Password Reset')

@section('content')
<div class="main-content mb-5">
    <div class="card m-5">
        <div class="card-header p-3 bg-success text-center text-white">
            <h5 class="text-center">Password Reset</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" readonly/>
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
                    <label class="form-label">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Enter confirm password" />
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Reset Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
