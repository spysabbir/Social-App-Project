@if (session('status'))
    <div class="alert alert-primary">
        <strong>{{ session('status') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-header p-3 bg-info text-center">
        <h5 class="text-center">Login</h5>
        <a class="text-primary" href="{{ route('register') }}">Not an account?</a>
    </div>
    <div class="card-body">

        @if (session('status'))
            <div class="alert alert-primary" role="alert">
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
            <button type="submit" class="btn btn-info"> Log in</button>
        </form>
        <a class="" href="{{ route('password.request') }}">Forgot your password?</a>
    </div>
</div>
