<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">WebChallenge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ url('/') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    {{ Route::is('designs.index') ? 'active' : '' }}
                    {{ Route::is('designs.create') ? 'active' : '' }}
                    {{ Route::is('designs.show') ? 'active' : '' }}
                    {{ Route::is('designs.edit') ? 'active' : '' }}" href="{{ route('designs.index') }}">Designs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    {{ Route::is('blog.index') ? 'active' : '' }}
                    {{ Route::is('blog.create') ? 'active' : '' }}
                    {{ Route::is('blog.show') ? 'active' : '' }}
                    {{ Route::is('blog.edit') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown-menu" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('account') }}">Votre compte</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>