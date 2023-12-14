@extends('backend.layouts.auth-master')

@section('title', 'Login')

@section('content')
<div class="authentication-header"></div>
<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col mx-auto">
                <div class="mb-4 text-center">
                    <img src="{{ asset('backend') }}/images/logo-img.png" width="180" alt="" />
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 rounded">
                            <div class="form-body">
                                @if (session('status'))
                                    <div class="alert alert-primary">
                                        <strong>{{ session('status') }}</strong>
                                    </div>
                                @endif
                                <form class="row g-3" method="POST" action="{{ route('backend.login') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email" >
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control border-end-0" name="password" value="12345678" placeholder="Enter password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="remember_me" class="">
                                                <input id="remember_me" type="checkbox" class="" name="remember">
                                                <span class="">Remember me</span>
                                            </label>
                                        </div>
                                        <a class="" href="{{ route('backend.password.request') }}">Forgot your password?</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
