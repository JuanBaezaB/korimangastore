<div>
    <section class="product bg-dark pt-3">
        <div class=" mx-5">
            <div class="text-center text-light">
                <h3><b>Productos</b></h3>
                <hr>
            </div>
            <div class="row">

                <!-- Productos -->
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                        <a href="{{ route('show-product', $product->id) }}"style="text-decoration: none">
                            <div style="height: 100%"  class="producto card shadow">
                                <div class="card-body">
                                    <div id="carouselExampleIndicators{{ $product->id }}" class="carousel slide"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($product->images as $item)
                                                <div @class(['carousel-item', 'active' => $loop->first])>
                                                    <img  src="{{ $item->url() }}" class="card-img-top" alt="...">
                                                </div>
                                            @endforeach
                                            @if (count($product->images) == 0)
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('media/products/image-product.png') }}"
                                                        class="card-img-top" alt="...">
                                                </div>
                                            @endif

                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators{{ $product->id }}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators{{ $product->id }}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <h6 class="text-dark">{{ $product->name }}</h6>
                                <h5 class="text-dark">${{ $product->price }}</h5>
                                <h5 class="text-dark">{{ $product->category->name }}</h5>

                                <a href="/reservar" type="button"
                                    class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i
                                        class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                                <livewire:add-cart :product-id="$product->id" :wire:key="$product->id">
                            </div>
                        </a>
                    </div>
                @endforeach
                <div wire:loading class="flex items-center justify-content-center mt-10">
                    <div class="fa-3x d-flex justify-content-center">
                        <i style="color: #0DCAF0" class="fas fa-spinner fa-spin"></i>
                      </div>
                </div>
                <div class="col-12 mt-3">
                    <div class=" d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>

                </div>

            </div>
            <!-- Pagination-->
    </section>
</div>
