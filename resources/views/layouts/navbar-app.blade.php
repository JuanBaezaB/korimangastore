<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="/" style="color: #f7fafc" style="text-decoration-line: none">
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
                    <a class="nav-link {{ request()->is('/') ? 'text-info' : '' }}" href="{{ route('index.home') }}">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Mangas
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><p class="dropdown-item disabled"><b>Categorías:</b></p></li>
                        <li><a class="dropdown-item" href="#">Editoriales</a></li>
                        <li><a class="dropdown-item" href="#">Países</a></li>
                        <li><a class="dropdown-item" href="#">Series</a></li>
                        <li><a class="dropdown-item" href="#">Género</a></li>
                        <li><a class="dropdown-item" href="#">Autores</a></li>
                        <li><a class="dropdown-item" href="#">Bolsas</a></li>
                        <li><a class="dropdown-item" href="#">Otros</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link">Figuras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Novedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('nosotros*') ? 'text-info' : '' }}" href="{{ route('about-us') }}">Nosotros</a>
                </li>
                <li class="nav-item dropdown d-none d-lg-block d-xl-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Buscar
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li class="nav-item">
                            <div class="ms-3 me-3" style="width: 250px">
                                <input type="search" class="form-control form-control-dark bg-dark btn-outline-info text-white mb-1 mt-1" placeholder="🔍︎ Busca aquí tu producto..." aria-label="Search">
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>


                <livewire:search-products />




            <div class="d-inlineflex pe-1">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <a style="color: #fff; text-overflow: ellipsis;"
                            class="text-sm btn btn-outline-info text-gray-700 dark:text-gray-500 underline me-2 mb-1 mt-1"
                            href="{{ route('login') }}">
                            <b>
                                <i class="fa-solid fa-right-to-bracket pe-2"></i>
                                {{ __('Inicia Sesión') }}
                            </b>
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a class="text-sm btn btn-outline-warning text-gray-700 dark:text-gray-500 underline mb-1 mt-1" class="nav-link"
                            href="{{ route('register') }}">
                            <b>
                                <i class="fa-solid fa-user-plus pe-2"></i>
                                {{ __('Registrate') }}
                            </b>
                        </a>
                    @endif
                @else
                    @hasrole('Admin')
                        <div class="d-inline">
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm btn btn-outline-light text-gray-700 dark:text-gray-500 underline me-2">
                                <b>
                                    <i class="fa-solid fa-chart-line pe-2"></i>
                                    Dashboard
                                </b>
                            </a>
                        </div>
                    @endhasrole

                    @hasrole('User')
                        <div class="d-inline">
                            <a href="/carrito"
                                class="text-sm btn btn-outline-light text-gray-700 dark:text-gray-500 underline me-2">
                                <b>
                                    <i class="fa-solid fa-cart-shopping pe-2"></i>
                                    Carrito
                                    <!--
                                        <i class="bg-danger text-light ms-1 pe-1 ps-1"> 2 </i>
                                    -->
                                </b>
                            </a>
                        </div>
                    @endhasrole
                    <div class="d-inline dropdown">
                        <a id="navbarDropdown" class="btn btn-outline-info dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <b>
                                <i class="fa-solid fa-circle-user pe-2"></i>
                                {{ Auth::user()->name }}
                            </b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!-- Option -->
                            <li><a class="dropdown-item" href="#">
                                <b>
                                    <i class="fa-solid fa-user-gear pe-2"></i>
                                    Configurar mi perfil
                                </b></a>
                            </li>

                            <!-- Option -->
                            <li><a class="dropdown-item" href="/reserva">
                                <b>
                                    <i class="fa-solid fa-bag-shopping pe-2"></i>
                                    Mis reservas
                                </b></a>
                            </li>

                            <!-- Option -->
                            <li><a class="dropdown-item" href="/reserva">
                                <b>
                                    <i class="fa-solid fa-box-archive pe-2"></i>
                                    Mis compras
                                </b></a>
                            </li>

                            <!-- Option -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <b class="text-danger">
                                    <i class="fa-solid fa-right-from-bracket pe-2"></i>
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
