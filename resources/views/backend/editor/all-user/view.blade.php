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
            <th>Created At</th>
            <th><span class="badge bg-success">{{ $user->created_at->format('D d-M,Y h:m:s A') }}</span></th>
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
            <td>{{ $user->date_of_birth }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $user->address }}</td>
        </tr>
    </tbody>
</table>
