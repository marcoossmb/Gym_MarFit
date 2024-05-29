<?php

// Definición de la clase LoginView
class error404View {

    // Método para mostrar el error 404
    public function mostrarError404() {
        ?>
        <section class="d-flex align-items-center min-vh-100 py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-6 order-md-2">
                        <div class="lc-block">
                            <img src="./assets/images/error404.png">
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-start ">
                        <div class="lc-block mb-3">
                            <div editable="rich">
                                <h1 class="fw-bold h4">¡PÁGINA NO ENCONTRADA!<br></h1>
                            </div>
                        </div>
                        <div class="lc-block mb-3">
                            <div editable="rich">
                                <h1 class="display-1 fw-bold text-muted">Error 404</h1>

                            </div>
                        </div>
                        <div class="lc-block mb-5">
                            <div editable="rich">
                                <p class="rfs-11 fw-light"> La página que buscas fue movida, eliminada o puede que nunca existiera.</p>
                            </div>
                        </div>
                        <div class="lc-block">
                            <a class="btn btn-lg btn-primary" href="./index.php" role="button">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php

    }
}
