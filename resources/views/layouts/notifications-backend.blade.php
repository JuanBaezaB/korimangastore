<div class="dropdown d-inline-block">
    <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @if (count(auth()->user()->unreadNotifications))
            <span
                class="nav-main-link-badge badge rounded-pill bg-black-50">{{ count(auth()->user()->unreadNotifications) }}</span>
        @endif
        <i class="fa fa-fw fa-bell"></i>

    </button>
    <div class="dropdown-menu dropdown-menu-xxl dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">
        <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
            Notificationes
        </div>
        <ul class="nav-items my-2">
            <div class="text-center border-bottom"><span>Notificaciones no leídas</span></div>

            @foreach (auth()->user()->unreadNotifications as $notification)
                <li>
                    <a class="d-flex text-dark py-2">
                        @if ($notification->data['type']=='CriticalStock' )
                            <div class="flex-shrink-0 mx-3">
                                <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                            </div>
                            <div class="flex-grow-1 fs-sm pe-2">
                                <div class="fw-semibold">El producto {{ $notification->data['product_name'] }} de la
                                    sucursal
                                    {{ $notification->data['branch_name'] }} se está agotando(stock = {{ $notification->data['stock'] }}).</div>
                                <div class="text-muted">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="flex-shrink-0 mx-3">
                                <button  data-bs-toggle="tooltip" data-bs-placement="top" title="Marcar como leído" type="submit" class="mark-as-read btn btn-sm btn-alt-primary"
                                    data-id="{{ $notification->id }}"><i class="fa fa-fw fa-eye"></i></button>
                            </div>
                        @elseif ($notification->data['type']=='OutOfStock')
                            <div class="flex-shrink-0 mx-3">
                                <i class="fa fa-fw fa-times-circle text-danger"></i>
                            </div>
                            <div class="flex-grow-1 fs-sm pe-2">
                                <div class="fw-semibold">El producto {{ $notification->data['product_name'] }} de la
                                    sucurlar
                                    {{ $notification->data['branch_name'] }} se ha quedado sin stock</div>
                                <div class="text-muted">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="flex-shrink-0 mx-3">
                                <button  data-bs-toggle="tooltip" data-bs-placement="top" title="Marcar como leído" type="submit" class="mark-as-read btn btn-sm btn-alt-primary"
                                    data-id="{{ $notification->id }}"><i class="fa fa-fw fa-eye"></i></button>
                            </div>
                        @endif
                    </a>
                </li>
            @endforeach

        </ul>
        <div class="p-2 border-top">
            <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                <i class="fa fa-fw fa-eye opacity-50 me-1"></i> Ver todo
            </a>
        </div>
    </div>
</div>

