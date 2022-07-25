<div class="row">
    <div class="col-lg-8 col-sm-12 mt-2">
        <div style="height: 100%" class="card shadow">
            <div class="card-header"><b>Tu carrito</b></div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($cart as $item)
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 pt-2 pb-2 text-center">
                                        <div id="carouselExampleIndicators{{ $item->model->id }}" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($item->model->images as $image)
                                                    <div @class(['carousel-item', 'active' => $loop->first])>
                                                        <img src="{{ $image->url() }}" class="shadow mw-100"
                                                             height="160px" alt="...">
                                                    </div>
                                                @endforeach
                                                @if (count($item->model->images) == 0)
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('media/products/image-product.png') }}"
                                                            class="shadow mw-100" height="160px"
                                                            alt="...">
                                                    </div>
                                                @endif

                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleIndicators{{ $item->model->id }}"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleIndicators{{ $item->model->id }}"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 pt-2 pb-2">
                                        <p><b>Nombre Artículo: </b>{{ $item->model->name }}</p>
                                        <p><b>Precio: </b>{{ $item->model->price }}</p>
                                        <p><b>Cantidad:</b>{{ $item->quantity }}</p>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button wire:click="delete( {{ $item->id }})" type="button"
                                                class="btn btn-danger">-</button>
                                            <input disabled type="text" class="form-control text-center"
                                                value="{{ $item->quantity }}">
                                            <button wire:click="add( {{ $item->id }})" type="button"
                                                class="btn btn-success">+</button>
                                        </div>
                                        <br>
                                        <livewire:delete-item-cart :product-id="$item->id" :wire:key="$item->id">
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mt-2 ">
        <div style="top: 95px;" class="card shadow sticky-top">
            <div class="card-header"><b>Resumen de compra</b></div>
            <div class="card-body ">

                <ul class="list-group ">
                    <li class="list-group-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 pt-2 pb-1">
                                    <p><b>Subtotal: </b> $
                                        @if (Auth::guest())
                                            {{ Cart::getSubTotal() }}
                                        @else
                                            {{ Cart::session(auth()->user()->id)->getSubTotal() }}
                                        @endif
                                    </p>
                                    <hr>
                                    <p><b>Total pedido: </b>$
                                        @if (Auth::guest())
                                            {{ Cart::getTotal() }}
                                        @else
                                            {{ Cart::session(auth()->user()->id)->getTotal() }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item text-center">
                        <button type="button" class="btn btn-success">
                            <i class="fa-solid fa-credit-card pe-2"></i>
                            Ir a pagar
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
