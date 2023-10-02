{{-- request()->routeIs('index') --}}

<a href="{{ route('admin.dashboard') }}">
    Home
</a>

<div>{{ Auth::user()->name }}</div>
{{ Auth::user()->email }}
<a href="{{ route('admin.profile') }}">
    Profile
</a>

<form method="POST" action="{{ route('admin.logout') }}">
    @csrf

    <a href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        Log Out
    </a>
</form>

