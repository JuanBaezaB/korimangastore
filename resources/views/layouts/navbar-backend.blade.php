<li class="nav-main-item">

    <a class="nav-main-link{{ request()->is('/dashboard') ? ' active' : '' }}"
        href="{{ route('index.graphic') }}">
        <i class="nav-main-link-icon fa fa-location-arrow"></i>
        <span class="nav-main-link-name">Dashboard</span>
    </a>
</li>

@canany(['product.list', 'product.modify', 'serie.list', 'category.list', 'editorial.list', 'format.list', 'genre.list',
    'creative_person.list', 'figure_type.list'])
    <!-- Gestion de productos -->
    <li class="nav-main-heading">Gestión de productos</li>
    @canany(['product.list', 'product.modify'])
        <li class="nav-main-item {{ request()->is('gestion-de-productos/producto*') ? ' open' : '' }}">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"
                href="#">
                <i
                    class="nav-main-link-icon fa fa-book {{ request()->is('gestion-de-productos/producto*') ? 'fa-bounce' : '' }}"></i>
                <span class="nav-main-link-name">Productos</span>
            </a>
            <ul class="nav-main-submenu">
                @canany(['product.list'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('gestion-de-productos/producto') ? ' active' : '' }}"
                            href="{{ route('product.list') }}">
                            <span class="nav-main-link-name">Listado</span>
                        </a>
                    </li>
                @endcan
                @canany(['product.modify'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('gestion-de-productos/producto/crear') ? ' active' : '' }}"
                            href="{{ route('product.create') }}">
                            <span class="nav-main-link-name">Añadir nuevo</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('gestion-de-productos/producto/importar') ? ' active' : '' }}"
                        href="{{ route('product.import') }}">
                        <span class="nav-main-link-name">Importar</span>
                    </a>
                </li>
            </ul>
        </li>
    @endcan

    @canany(['serie.list', 'category.list', 'editorial.list', 'format.list', 'genre.list', 'creative_person.list',
        'figure_type.list'])
        <!-- Gestion de Caracteristicas Manga -->
        <li class="nav-main-item {{ request()->is('gestion-de-productos/carateristicas/*') ? ' open' : '' }}">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"
                href="#">
                <i
                    class="nav-main-link-icon fa fa-sliders {{ request()->is('gestion-de-productos/carateristicas/*') ? 'fa-bounce' : '' }}"></i>
                <span class="nav-main-link-name">Características</span><!-- Gestion de productos -->
            </a>
            <ul class="nav-main-submenu">
                @canany(['serie.list', 'category.list'])
                    <li class="nav-main-item {{ request()->is('gestion-de-productos/carateristicas/general/*') ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="true" href="#">
                            <span class="nav-main-link-name">General</span>
                        </a>
                        <ul class="nav-main-submenu">
                            @canany(['serie.list'])
                                <li class="nav-main-item">
                                    <a class="nav-main-link{{ request()->is('gestion-de-productos/carateristicas/general/serie') ? ' active' : '' }}"
                                        href="{{ route('serie.list') }}">
                                        <span class="nav-main-link-name">Series</span>
                                    </a>
                                </li>
                            @endcan

                            @canany(['category.list'])
                                <li class="nav-main-item">
                                    <a class="nav-main-link{{ request()->is('gestion-de-productos/carateristicas/general/categoria') ? ' active' : '' }}"
                                        href="{{ route('category.list') }}">
                                        <span class="nav-main-link-name">Categorías</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                @canany(['editorial.list', 'format.list', 'genre.list', 'creative_person.list'])
                    <li class="nav-main-item {{ request()->is('gestion-de-productos/carateristicas/manga/*') ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="true" href="#">
                            <span class="nav-main-link-name">Manga</span>
                        </a>
                        <ul class="nav-main-submenu">
                            @canany(['editorial.list'])
                                <li class="nav-main-item">
                                    <a class="nav-main-link{{ request()->is('gestion-de-productos/carateristicas/manga/editorial') ? ' active' : '' }}"
                                        href="{{ route('editorial.list') }}">
                                        <span class="nav-main-link-name">Editorial</span><!-- Gestion de Editorial -->
                                    </a>
                                </li>
                            @endcan

                            @canany(['format.list'])
                                <li class="nav-main-item">
                                    <a class="nav-main-link{{ request()->is('gestion-de-productos/carateristicas/manga/formato') ? ' active' : '' }}"
                                        href="{{ route('format.list') }}">
                                        <span class="nav-main-link-name">Formato</span><!-- Gestion de Formato -->
                                    </a>
                                </li>
                            @endcan

                            @canany(['genre.list'])
                                <li class="nav-main-item">
                                    <a class="nav-main-link{{ request()->is('gestion-de-productos/carateristicas/manga/genre') ? ' active' : '' }}"
                                        href="{{ route('genre.list') }}">
                                        <span class="nav-main-link-name">Genero</span><!-- Gestion de Editorial -->
                                    </a>
                                </li>
                            @endcan

                            @canany(['creative_person.list'])
                                <li class="nav-main-item">
                                    <a class="nav-main-link{{ request()->is('gestion-de-productos/carateristicas/manga/persona-creativa') ? ' active' : '' }}"
                                        href="{{ route('creative_person.list') }}">
                                        <span class="nav-main-link-name">Persona Creativa</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @canany(['figure_type.list'])
                    <li class="nav-main-item {{ request()->is('gestion-de-productos/carateristicas/figura/*') ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="true" href="#">
                            <span class="nav-main-link-name">Figura</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('gestion-de-productos/carateristicas/figura/tipo') ? ' active' : '' }}"
                                    href="{{ route('figure_type.list') }}">
                                    <span class="nav-main-link-name">Tipo</span><!-- Gestion de Editorial -->
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
@endcan




<!-- Gestion de stock -->
@canany(['stock.list', 'stock.modify'])
    <li class="nav-main-heading">Gestión de inventario</li>
    <li class="nav-main-item {{ request()->is('gestion-de-inventario*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"
            href="#">
            <i
                class="nav-main-link-icon fa-solid fa-boxes-stacked {{ request()->is('gestion-de-inventario*') ? 'fa-bounce' : '' }}"></i>
            <span class="nav-main-link-name">Stock</span>
        </a>
        <ul class="nav-main-submenu">
            @canany(['stock.list'])
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('gestion-de-inventario/stock') ? ' active' : '' }}"
                        href="{{ route('stock.list') }}">
                        <span class="nav-main-link-name">Listado</span>
                    </a>
                </li>
            @endcan
            @canany(['stock.modify'])
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('gestion-de-inventario/stock/crear') ? ' active' : '' }}"
                        href="{{ route('stock.create') }}">
                        <span class="nav-main-link-name">Añadir nuevo</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan


<!-- Gestion de ventas -->
@canany(['sale.list', 'sale.modify'])
    <li class="nav-main-heading">Área de ventas</li>
    <li class="nav-main-item {{ request()->is('area-de-ventas/*') ? ' open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"
            href="#">
            <i
                class="nav-main-link-icon fa-solid fa-cart-shopping {{ request()->is('area-de-ventas/*') ? 'fa-bounce' : '' }}"></i>
            <span class="nav-main-link-name">Ventas</span>
        </a>
        <ul class="nav-main-submenu">
            @canany(['sale.list'])
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('area-de-ventas/venta') ? ' active' : '' }}"
                        href="{{ route('sale.list') }}">
                        <span class="nav-main-link-name">Listado</span>
                    </a>
                </li>
            @endcan
            @canany(['sale.modify'])
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('area-de-ventas/venta/crear') ? ' active' : '' }}"
                        href="{{ route('sale.create') }}">
                        <span class="nav-main-link-name">Realizar venta</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan

<!-- Gestion base -->
@canany(['branch.list', 'provider.list', 'user.list', 'role.list', 'permission.list'])
    <li class="nav-main-heading">Gestión base </li>
    @canany(['branch.list', 'provider.list'])
        <li class="nav-main-item{{ request()->is('gestion-base/configuracion-base/*') ? ' open' : '' }}">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"
                href="#">
                <i
                    class="nav-main-link-icon fa fa-gear {{ request()->is('gestion-base/configuracion-base/*') ? 'fa-bounce' : '' }}"></i>
                <span class="nav-main-link-name">Configuración interna</span>
            </a>
            <ul class="nav-main-submenu">
                @canany(['branch.list'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('gestion-base/configuracion-base/sucursales') ? ' active' : '' }}"
                            href="{{ route('branch.list') }}">
                            <span class="nav-main-link-name">Sucursales</span>
                        </a>
                    </li>
                @endcan
                @canany(['provider.list'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('gestion-base/configuracion-base/proveedores') ? ' active' : '' }}"
                            href="{{ route('provider.list') }}">
                            <span class="nav-main-link-name">Proveedor</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan

    @canany(['user.list', 'role.list', 'permission.list'])
        <li class="nav-main-item{{ request()->is('gestion-base/gestion-usuarios/*') ? ' open' : '' }}">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"
                href="#">
                <i
                    class="nav-main-link-icon fa fa-users {{ request()->is('gestion-base/gestion-usuarios/*') ? 'fa-bounce' : '' }}"></i>
                <span class="nav-main-link-name">Gestión de usuarios</span>
            </a>
            <ul class="nav-main-submenu">
                @canany(['user.list'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('gestion-base/gestion-usuarios/usuarios') ? ' active' : '' }}"
                            href="{{ route('user.list') }}">
                            <span class="nav-main-link-name">Usuarios</span>
                        </a>
                    </li>
                @endcan

                @canany(['role.list'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('gestion-base/gestion-usuarios/roles') ? ' active' : '' }}"
                            href="{{ route('role.list') }}">
                            <span class="nav-main-link-name">Roles</span>
                        </a>
                    </li>
                @endcan

                @canany(['permission.list'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('gestion-base/gestion-usuarios/permisos') ? ' active' : '' }}"
                            href="{{ route('permission.list') }}">
                            <span class="nav-main-link-name">Permisos</span>
                        </a>
                    </li>
                @endcan


            </ul>
        </li>
    @endcan
@endcan

<!-- Soporte -->
<li class="nav-main-heading">Área de Soporte</li>
<li class="nav-main-item{{ request()->is('soporte/*') ? ' open' : '' }}">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true"
        href="#">
        <i class="nav-main-link-icon fa fa-triangle-exclamation"></i>
        <span class="nav-main-link-name">Soporte</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('soporte/preguntas-frecuentes/administracion') ? ' active' : '' }}"
                href="{{ route('user-questions.list') }}">
                <span class="nav-main-link-name">Administrar Preguntas frecuentes (FAQ's)</span>
            </a>
        </li>

        <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('soporte/manual-admin') ? ' active' : '' }}"
                href="{{ route('support.adminmanual') }}">
                <span class="nav-main-link-name">Manual de Administrador</span>
            </a>
        </li>


    </ul>
</li>
