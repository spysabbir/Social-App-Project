<table class="table">
    <thead>
        <tr>
            <th>Profile Photo</th>
            <th><img src="{{ asset('uploads/profile_photo') }}/{{ $staff->profile_photo }}" class="rounded-circle shadow" width="120" height="120" alt="Profile Photo"></th>
        </tr>
        <tr>
            <th>Name</th>
            <th>{{ $staff->name }}</th>
        </tr>
        <tr>
            <th>Username </th>
            <th>{{ $staff->username  }}</th>
        </tr>
        <tr>
            <th>Role</th>
            <th><span class="badge bg-success">{{ $staff->role }}</span></th>
        </tr>
        <tr>
            <th>Status</th>
            <th><span class="badge bg-info">{{ $staff->status }}</span></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Email</td>
            <td>{{ $staff->email }}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>{{ $staff->phone_number }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $staff->gender }}</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>{{ $staff->date_of_birth ? date('D d-F-Y', strtotime($staff->date_of_birth)) : ''}}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $staff->address }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td><span class="badge bg-info">{{ $staff->created_at->format('D d-F,Y h:m:s A') }}</span></td>
        </tr>
        <tr>
            <td>Last Active</td>
            <td><span class="badge bg-primary">{{ date('D d-F,Y h:m:s A', strtotime($staff->last_active)) }}</span></td>
        </tr>
    </tbody>
</table>
