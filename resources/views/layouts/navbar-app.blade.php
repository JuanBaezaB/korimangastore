<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="#" style="color: #f7fafc" style="text-decoration-line: none">
            <img src="/media/login/logonav.png" alt="" width="32" height="28">
            <b>Kori</b>MangaStore
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" style="color: #49F8FF" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mangas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Figuras</a>
                </li>
            </ul>


            <div class="d-inlineflex pe-1">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <a style="color: #fff"
                            class="text-sm btn btn-secondary text-gray-700 dark:text-gray-500 underline"
                            href="{{ route('login') }}">
                            <b>
                                <i class="fa-solid fa-user-plus pe-2"></i>
                                {{ __('Acceso') }}
                            </b>
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a class="text-sm btn btn-warning text-gray-700 dark:text-gray-500 underline" class="nav-link"
                            href="{{ route('register') }}">
                            <b>
                                <i class="fa-solid fa-user-plus pe-2"></i>
                                {{ __('Registro') }}
                            </b>
                        </a>
                    @endif
                @else
                    @hasrole('Admin')
                        <div class="d-inline">
                            <a href="{{ url('/home') }}"
                                class="text-sm btn btn-info text-gray-700 dark:text-gray-500 underline">
                                <b>
                                    <i class="fa-solid fa-chart-line pe-2"></i>
                                    Dashboard
                                </b>
                            </a>
                        </div>
                    @endhasrole
                    <div class="d-inline dropdown">
                        <a id="navbarDropdown" class="btn btn-secondary dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <b>
                                {{ Auth::user()->name }}
                            </b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <b>
                                    <i class="fa-solid fa-door-closed"></i>
                                    {{ __('Cerrar Sesión') }}
                                </b>
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
