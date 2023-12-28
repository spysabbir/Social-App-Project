<table class="table">
    <thead>
        <tr>
            <th>Profile Photo</th>
            <th><img src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="rounded-circle shadow" width="120" height="120" alt="Profile Photo"></th>
        </tr>
        <tr>
            <th>Name</th>
            <th>{{ $user->name }}</th>
        </tr>
        <tr>
            <th>Username </th>
            <th>{{ $user->username  }}</th>
        </tr>
        <tr>
            <th>Status</th>
            <th><span class="badge bg-info">{{ $user->status }}</span></th>
        </tr>
        <tr>
            <th>Count</th>
            <th>
                <span class="badge bg-dark">Follower: {{ $followerCount }}</span>
                <span class="badge bg-dark">Following: {{ $followingCount }}</span>
                <span class="badge bg-dark">Post: {{ $postCount }}</span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>{{ $user->phone_number }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $user->gender }}</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>{{ $user->date_of_birth ? date('D d-F-Y', strtotime($user->date_of_birth)) : ''}}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td><span class="badge bg-info">{{ $user->created_at->format('D d-F,Y h:m:s A') }}</span></td>
        </tr>
        <tr>
            <td>Last Active</td>
            <td><span class="badge bg-primary">{{ date('D d-F,Y h:m:s A', strtotime($user->last_active)) }}</span></td>
        </tr>
    </tbody>
</table>
