<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('root') }}">360° Dev</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Menu::isActive('Posts') }}" href="{{ route('blog.index') }}">Blog</a>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle"
                       id="navbarDropdownMenuLink"
                       data-toggle="navbarDropdownMenuLink"
                       aria-expanded="false"
                       aria-haspopup="true"
                    >
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{ route('home') }}" class="dropdown-item"><span class="oi oi-person"></span> Mon Profil</a>
                        <a class="dropdown-item text-danger"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                        >
                            <span class="oi oi-account-logout"></span> Se déconnecter
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>