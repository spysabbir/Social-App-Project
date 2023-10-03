@extends('frontend.layouts.frontend-master')

@section('title', 'Profile')

@section('content')
<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    <div class="main-content">
       <div class="mb-4 d-flex align-items-center">
          <div class="d-flex align-items-center">
             <a href="{{ route('index') }}" class="material-icons text-dark text-decoration-none m-none me-3">arrow_back</a>
             <p class="ms-2 mb-0 fw-bold text-body fs-6">{{ $user->name }}</p>
          </div>
       </div>
       <div class="bg-white rounded-4 shadow-sm profile">
            <div class="d-flex align-items-center px-3 pt-3">
                <img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="img-fluid rounded-circle" alt="profile-img">
                <div class="ms-3">
                    <h6 class="mb-0 d-flex align-items-start text-body fs-6 fw-bold">{{ $user->name }} <span class="ms-2 material-icons bg-primary p-0 md-16 fw-bold text-white rounded-circle ov-icon">done</span></h6>
                    <p class="text-muted mb-0">{{ $user->username }}</p>
                </div>
            </div>
            <div class="p-3">
                <p class="mb-2 fs-6">The standard chunk of Lorem Ipsum used since is reproduced. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature..</p>
                <span class="material-icons text-muted md-16 m-3">calendar_today</span><strong class="badge bg-info">Joined on {{ $user->created_at->format('D d,M-Y') }}</strong>
                <div class="d-flex followers">
                    <div>
                    <p class="mb-0"> {{ $follower_count }} <span class="text-muted">Followers</span></p>
                    </div>
                    <div class="ms-5 ps-5">
                    <p class="mb-0">{{ $following_count }} <span class="text-muted">Following</span></p>
                    </div>
                </div>
          </div>
       </div>
       <ul class="top-osahan-nav-tab nav nav-pills justify-content-center nav-justified mb-4 shadow-sm rounded-4 overflow-hidden bg-white mt-4" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
             <button class="p-3 nav-link text-muted active" id="pills-feed-tab" data-bs-toggle="pill" data-bs-target="#pills-feed" type="button" role="tab" aria-controls="pills-feed" aria-selected="true">Feed</button>
          </li>
          <li class="nav-item" role="presentation">
             <button class="p-3 nav-link text-muted" id="pills-people-tab" data-bs-toggle="pill" data-bs-target="#pills-people" type="button" role="tab" aria-controls="pills-people" aria-selected="false">Profile</button>
          </li>
       </ul>
       <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-feed" role="tabpanel" aria-labelledby="pills-feed-tab">
             <div class="ms-1">
                <div class="feeds">
                    @forelse ($allPost as $post)
                        @include('frontend.layouts.post')
                    @empty
                    <div class="alert alert-info">
                        <strong>Post Not Found</strong>
                    </div>
                    @endforelse
                </div>
             </div>
            </div>
            <div class="tab-pane fade" id="pills-people" role="tabpanel" aria-labelledby="pills-people-tab">
                <div class="feeds">
                    <div class="bg-white p-4 feed-item rounded-4 shadow-sm mb-3 faq-page">
                        <div class="mb-3">
                            <h5 class="lead fw-bold text-body mb-0">Edit Profile</h5>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-end">
                                            <label for="profile_photo">Profile Photo</label>
                                            <input class="form-control rounded-5" type="file" name="profile_photo" id="profilePhoto"/>
                                        </div>
                                        @error('profile_photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-end">
                                            <label for="name">Name</label>
                                            <input class="form-control rounded-5" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter name" />
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <label for="username">Username</label>
                                            <input class="form-control rounded-5" id="username" type="text" name="username" value="{{ old('username', $user->username) }}" placeholder="Enter username" />
                                        </div>
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <label for="email">Email</label>
                                            <input class="form-control rounded-5" id="email" type="email" value="{{ $user->email }}" disabled />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-end">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" name="phone_number" id="phone_number" class="form-control rounded-5" value="{{ old('phone_number', $user->phone_number) }}" placeholder="Enter phone number">
                                        </div>
                                        @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select name="gender" id="gender" class="form-select rounded-5">
                                                <option value="">Select Gender</option>
                                                <option value="Male" @selected(old('gender', $user->gender) == "Male")>Male</option>
                                                <option value="Female" @selected(old('gender', $user->gender) == "Female")>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control rounded-5" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <label for="date_of_birth">Address</label>
                                            <textarea name="address" class="form-control rounded-5" id="date_of_birth" placeholder="Enter your address.">{{ old('address', $user->address) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary rounded-5 w-100 text-decoration-none py-3 fw-bold text-uppercase m-0">SAVE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 feed-item rounded-4 shadow-sm faq-page mb-3">
                        <div class="mb-3">
                            <h5 class="lead fw-bold text-body mb-0">Confirm your password</h5>
                            <p class="mb-0">Please enter your password in order to get this.</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <form method="post" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <input type="password" class="form-control rounded-5" name="current_password" id="current_password" placeholder="Current Password">
                                            <label for="current_password">Current Password</label>
                                        </div>
                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <input type="password" class="form-control rounded-5" name="password" id="password" placeholder="Password">
                                            <label for="password">Password</label>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating mb-3 d-flex align-items-center">
                                            <input type="password" class="form-control rounded-5" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                            <label for="password_confirmation">Confirm Password</label>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary w-100 text-decoration-none rounded-5 py-3 fw-bold text-uppercase m-0">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 feed-item rounded-4 shadow-sm faq-page">
                        <div class="mb-3">
                            <h5 class="lead fw-bold text-body mb-0">Delete Account</h5>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
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
                                        <button type="submit" class="btn btn-danger">Delete Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</main>
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

