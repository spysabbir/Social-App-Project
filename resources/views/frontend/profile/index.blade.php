@extends('frontend.layouts.frontend-master')

@section('title', 'Home')

@section('content')

@include('frontend.layouts.navigation')
    <h2>
        Profile
    </h2>


    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Profile Information</h4>
        <p class="card-text">Update your account's profile information and email address.</p>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label class="form-label">Profile Photo</label>
                <input class="form-control" type="file" name="profile_photo" id="profilePhoto"/>
                @error('profile_photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="rounded-circle shadow" width="120" height="120" alt="Profile Photo" id="profilePhotoPreview">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter name" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" value="{{ $user->email }}" disabled />
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}" placeholder="Enter phone number">
                @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="">Select Gender</option>
                    <option value="Male" @selected(old('gender', $user->gender) == "Male")>Male</option>
                    <option value="Female" @selected(old('gender', $user->gender) == "Female")>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" placeholder="Enter your address.">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="mb-3">
                <button type="submit">Update</button>
            </div>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Update Password</h4>
        <p class="card-text">Ensure your account is using a long, random password to stay secure.</p>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('password.update') }}" >
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input class="form-control" type="password" name="current_password" placeholder="Enter current password" />
                @error('current_password')
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

            <div class="mb-3">
                <button type="submit">Save</button>
            </div>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Delete Account</h4>
        <p class="card-text">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#deleteAccount">
            Delete Account
        </button>

        <div class="modal fade" id="deleteAccount" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')

                            <h2 class="text-danger">
                                Are you sure you want to delete your account?
                            </h2>

                            <p class="text-info">
                                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                            </p>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Enter password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit">Delete Account</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    @endsection

@section('script')
<script>
    $(document).ready(function(){
        // Profile Photo Preview
        $('#profilePhoto').change(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profilePhotoPreview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        });
    })
</script>
@endsection

