<ul class="nav-menu">
    @auth
        <li>
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
        </li>
        <li>
            <form id="logout" action="{{ route('logout') }}" method="POST">
                @csrf
                <a type="submit" onclick="document.getElementById('logout').submit();">Logout</a>
            </form>
        </li>
        @if (Auth::user()->role == 'admin')
            <li>
                <a href="{{ route('admin.allUsers') }}">All Users</a>
            </li>
        @endif
    @endauth
    <li>
        <a href="{{ route('landing.pricing') }}">Pricing Plans</a>
    </li>
    @guest
        <li>
            <a href="{{ route('login') }}">Sign in</a>
        </li>
        <li>
            <a href="{{ route('register') }}">Create Account</a>
        </li>
    @endguest
</ul>
