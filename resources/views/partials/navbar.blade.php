<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <a class="navbar-brand" href="{{ route('home.index') }}">360° Dev</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Menu::isActive('Posts') }}" href="{{ route('blog.index') }}">Blog</a>
            </li>
            @auth
                @if (auth()->user()->isAdmin())
                    <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link">Administration</a></li>
                @endif
            @endauth
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            @if (Route::has('login'))
                @auth
                <li class="nav-item"><a href="" class="nav-link">{{ auth()->user()->name }}</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" class="form-inline" method="post">
                        {{ csrf_field() }}
                        <button type="submit" href="" class="btn btn-danger">Se déconnecter</button>
                    </form>
                </li>
                @else
                    <li class="nav-item"><a class="nav-link btn btn-outline-success" href="{{ route('login') }}">Se connecter</a></li>
                    <li class="nav-item"><a class="nav-link btn-outline-default" href="{{ route('register') }}">Créer un compte</a></li>
                @endauth
            @endif
        </ul>
    </div>
</nav>