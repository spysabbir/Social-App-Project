<div class="card">
    <div class="card-header p-3 bg-info text-center">
        <h5 class="text-center">Password Reset</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Enter email" />
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

            <button type="submit" class="btn btn-info">Reset Password</button>
        </form>
    </div>
</div>
