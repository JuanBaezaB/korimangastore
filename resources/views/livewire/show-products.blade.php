<div>
 <section class="product bg-dark pt-3">
     <div class="container">
         <div class="text-center text-light">
             <h3><b>Productos Destacados</b></h3>
             <hr>
             <p>Revisa nuestro catálogo de productos, los cuales esperan por ti.</p>
         </div>
         <div class="row">

            <!-- Productos -->

            @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top"
                                    src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg"
                                    alt="">
                            </div>
                            <h6 class="text-dark">{{$product->name}}</h6>
                            <h5 class="text-dark">${{$product->price}}</h5>
                            <h5 class="text-dark">{{$product->category->name}}</h5>

                            <a href="/reservar" type="button"
                                class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i
                                    class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button"
                                class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i
                                    class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>
            @endforeach

         </div>
         <!-- Pagination-->
         <nav aria-label="Pagination">
             <hr class="mt-3" />
             <ul class="pagination justify-content-center pb-3">
                 <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                         aria-disabled="true"><i class="fa-solid fa-circle-arrow-left"></i></a></li>
                 <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                 <li class="page-item"><a class="page-link" href="#!">2</a></li>
                 <li class="page-item"><a class="page-link" href="#!">3</a></li>
                 <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                 <li class="page-item"><a class="page-link" href="#!">15</a></li>
                 <li class="page-item"><a class="page-link" href="#!"><i
                             class="fa-solid fa-circle-arrow-right"></i></a></li>
             </ul>
         </nav>
 </section>
</div>