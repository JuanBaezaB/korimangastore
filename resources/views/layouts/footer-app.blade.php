    <!-- Footer-->
    <footer class="pt-5 pb-3 bg-dark">

        <div class="container pb-5">
            <div class="row">
                <div class="col-sm-6 pb-1">
                    <div class="card border-0 bg-dark text-info">
                        <div class="card-body">
                            <a class="text-white" href="https://www.instagram.com/korimangastore/"><h5 class="card-title"><i class="fa-brands fa-instagram pe-2"></i>Instagram</h5></a>
                        <p class="card-text">Visitanos en nuestro perfil de Instagram y síguenos
                            <br>
                            Entérate de novedades, promociones, preventas, y participa de concursos.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 pb-1">
                    <div class="card border-0 bg-dark text-info">
                        <div class="card-body">
                            <a class="text-white" href="https://www.google.com/maps/place/Freire+522,+Concepci%C3%B3n,+B%C3%ADo+B%C3%ADo/@-36.826321,-73.052813,20z/data=!4m5!3m4!1s0x9669b5da9927f84f:0x716bb9842b0c12be!8m2!3d-36.8263347!4d-73.0528168?hl=es"><h5 class="card-title"><i class="fa-solid fa-location-dot pe-2"></i>Tienda Física</h5></a>
                        <p class="card-text">
                            Nos encontramos en Freire #522, Galería Caracol, 4to piso, Local 185. Concepción.
                            <br>
                            Horario de atención: Lunes a Viernes de 11:00 am - 19:00 pm.
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 text-center pt-5">
                    <p class="text-white">¿Tienes un problema?</p>
                    <a href="/soporte" type="button" class="btn btn-outline-danger {{ request()->is('soporte') ? 'disabled' : '' }}">¡Infórmanos aquí!</a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 text-center pt-5">
                    <p class="text-white">Accede a nuestras preguntas frecuentes</p>
                    <a href="/preguntas-frecuentes" type="button" class="btn btn-outline-success {{ request()->is('preguntas-frecuentes') ? 'disabled' : '' }}">Preguntas Frecuentes</a>
                </div>
            </div>
        </div>


        <div class="container">
            <p class="m-0 text-center text-info">Copyright &copy; <b>Kori</b>MangaStore 2022</p>
        </div>
    </footer>
