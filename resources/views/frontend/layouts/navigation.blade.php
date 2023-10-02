{{-- request()->routeIs('index') --}}

<a href="{{ route('index') }}">
    Home
</a>

<div>{{ Auth::user()->name }}</div>
{{ Auth::user()->email }}
<a href="{{ route('profile') }}">
    Profile
</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <a href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        Log Out
    </a>
</form>

