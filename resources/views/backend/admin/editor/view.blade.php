<table class="table">
    <thead>
        <tr>
            <th>Profile Photo</th>
            <th><img src="{{ asset('uploads/profile_photo') }}/{{ $editor->profile_photo }}" class="rounded-circle shadow" width="120" height="120" alt="Profile Photo"></th>
        </tr>
        <tr>
            <th>Name</th>
            <th>{{ $editor->name }}</th>
        </tr>
        <tr>
            <th>Username </th>
            <th>{{ $editor->username  }}</th>
        </tr>
        <tr>
            <th>Status</th>
            <th><span class="badge bg-info">{{ $editor->status }}</span></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Email</td>
            <td>{{ $editor->email }}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>{{ $editor->phone_number }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $editor->gender }}</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>{{ $editor->date_of_birth ? date('D d-F-Y', strtotime($editor->date_of_birth)) : ''}}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $editor->address }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td><span class="badge bg-info">{{ $editor->created_at->format('D d-F,Y h:m:s A') }}</span></td>
        </tr>
        <tr>
            <td>Last Active</td>
            <td><span class="badge bg-primary">{{ date('D d-F,Y h:m:s A', strtotime($editor->last_active)) }}</span></td>
        </tr>
    </tbody>
</table>
