@extends('frontend.layouts.auth-master')

@section('title', 'Register')

@section('content')
<div class="main-content mb-5">
    <div class="card m-5">
        <div class="card-header p-3 bg-success text-center text-white">
            <h5 class="text-center">Register</h5>
            <a class="text-white" href="{{ route('login') }}">Already registered? Login...</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter full name" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input class="form-control" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" />
                    @error('date_of_birth')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check d-flex justify-content-around">
                        <label>
                            <input type="radio" id="Male" class="form-check-input" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="Male">Male</label>
                        </label>
                        <label>
                            <input type="radio" id="Female" class="form-check-input" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="Female">Female</label>
                        </label>
                        <label>
                            <input type="radio" id="Other" class="form-check-input" name="gender" value="Other" {{ old('gender') == 'Other' ? 'checked' : '' }}>
                            <label class="form-check-label" for="Other">Other</label>
                        </label>
                    </div>
                    @error('gender')
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

                <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
