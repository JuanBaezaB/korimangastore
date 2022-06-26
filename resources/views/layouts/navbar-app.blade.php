<!-- Navbar -->
<nav class="navbar bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: #f7fafc" style="text-decoration-line: none">
            <img src="/media/login/logonav.png" alt="" width="32" height="28">
            <b>Kori</b>
            <h6>MangaStore</h6>
        </a>
        <div class="d-inlineflex pe-1">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <a style="color: #fff" class="text-sm btn btn-secondary text-gray-700 dark:text-gray-500 underline"  href="{{ route('login') }}">
                        <b>
                            <i class="fa-solid fa-user-plus pe-2"></i>
                            {{ __('Acceso') }}
                        </b>
                    </a>
                @endif

                @if (Route::has('register'))
                    <a class="text-sm btn btn-warning text-gray-700 dark:text-gray-500 underline" class="nav-link" href="{{ route('register') }}">
                        <b>
                            <i class="fa-solid fa-user-plus pe-2"></i>
                            {{ __('Registro') }}
                        </b>
                    </a>
                @endif
            @else
                <div class="d-inline">
                    <a href="{{ url('/dashboard') }}" class="text-sm btn btn-info text-gray-700 dark:text-gray-500 underline">
                        <b>
                            <i class="fa-solid fa-house-chimney-user pe-2"></i>
                            Home
                        </b>
                    </a>
                </div>
                <div class="d-inline dropdown">
                    <a id="navbarDropdown" class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>
