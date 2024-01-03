<table class="table">
    <thead>
        <tr>
            <th>Profile Photo</th>
            <th><img src="{{ asset('uploads/profile_photo') }}/{{ $admin->profile_photo }}" class="rounded-circle shadow" width="120" height="120" alt="Profile Photo"></th>
        </tr>
        <tr>
            <th>Name</th>
            <th>{{ $admin->name }}</th>
        </tr>
        <tr>
            <th>Username </th>
            <th>{{ $admin->username  }}</th>
        </tr>
        <tr>
            <th>Role</th>
            <th><span class="badge bg-success">{{ $admin->role }}</span></th>
        </tr>
        <tr>
            <th>Status</th>
            <th><span class="badge bg-info">{{ $admin->status }}</span></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Email</td>
            <td>{{ $admin->email }}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>{{ $admin->phone_number }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $admin->gender }}</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>{{ $admin->date_of_birth ? date('D d-F-Y', strtotime($admin->date_of_birth)) : ''}}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $admin->address }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td><span class="badge bg-info">{{ $admin->created_at->format('D d-F,Y h:m:s A') }}</span></td>
        </tr>
        <tr>
            <td>Last Active</td>
            <td><span class="badge bg-primary">{{ date('D d-F,Y h:m:s A', strtotime($admin->last_active)) }}</span></td>
        </tr>
    </tbody>
</table>
