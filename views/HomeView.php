<?php

class HomeView {

    public function mostrarHome() {
        session_start();
        require_once './components/Header/header.php';
        ?>                
        <!-- HERO -->
        <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

            <div class="bg-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-10 mx-auto col-12">
                        <div class="hero-text mt-5 text-center">

                            <h6>¡Nueva forma de construir un estilo de vida saludable!</h6>
                            <h1 class="text-white">MEJORA TU CUERPO EN MarFit</h1>
                            <a href="#feature" class="btn custom-btn mt-3">Empezar</a>
                            <a href="#about" class="btn custom-btn bordered mt-3">Más información</a>

                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="feature" id="feature">
            <div class="container">
                <div class="row">

                    <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                        <h2 class="mb-3 text-white">¿Nuevo en el gimnasio?</h2>
                        <h6 class="mb-4 text-white">Tu membresía tiene hasta 2 meses GRATIS (29.50€ por mes)</h6>
                        <p>MarFit es un gran gimnasio para alcanzar tus objetivos fitness. Siéntete libre y en gran compañía.</p>
                        <?php
                        if (!isset($_SESSION['email'])) {
                            ?>   
                            <a href="./index.php?controller=Login&action=mostrarLogin" class="btn custom-btn bg-color mt-3">Conviértete en miembro hoy</a>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                        <div class="about-working-hours">
                            <div>

                                <h2 class="mb-4 text-white">Horario de trabajo</h2>
                                <strong class="mt-3 d-block">Lunes - Viernes</strong>
                                <p>7:00 - 23:00</p>
                                <strong class="mt-3 d-block">Sábado</strong>
                                <p>9:00 - 16:00</p>
                                <strong class="d-block">Domingo : Cerrado</strong>                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </section>


        <!-- ACERCA DE -->
        <section class="about section" id="about">
            <div class="container">
                <div class="row">

                    <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                        <h2 class="mb-4">¡Bienvenido a MarFit!</h2>
                        <p>En MarFit nos dedicamos a ayudarte a alcanzar tus objetivos de fitness y bienestar. Nuestra pasión es tu salud y forma física.</p>
                        <p>Explora nuestra oferta de servicios y programas diseñados para todas las edades y niveles de condición física. Estamos aquí para apoyarte en cada paso del camino.</p>
                    </div>

                    <div class="ml-lg-auto col-lg-3 col-md-6 col-12">
                        <div class="team-thumb">
                            <img src="assets/images/team/team-image.jpg" class="img-fluid" alt="Entrenador">
                            <div class="team-info d-flex flex-column">
                                <h3>Sara López</h3>
                                <span>Instructor de Spinning</span>
                            </div>
                        </div>
                    </div>

                    <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12">
                        <div class="team-thumb">
                            <img src="assets/images/team/team-image01.jpg" class="img-fluid" alt="Entrenador">

                            <div class="team-info d-flex flex-column">
                                <h3>Laura García</h3>
                                <span>Entrenador de Boxeo</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- HORARIO -->
        <section class="schedule section" id="schedule">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h6>Nuestros horarios semanales de GYM</h6>

                        <h2 class="text-white">Horario de Entrenamiento</h2>
                    </div>

                    <div class="col-lg-12 py-5 col-md-12 col-12">
                        <table class="table table-bordered table-responsive schedule-table">

                            <thead class="thead-light">
                            <th><i class="fa fa-calendar"></i></th>
                            <th>Lun</th>
                            <th>Mar</th>
                            <th>Mié</th>
                            <th>Jue</th>
                            <th>Vie</th>
                            <th>Sáb</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><small>8:00</small></td>
                                    <td>
                                        <strong>Cardio</strong>
                                        <span>08:00 - 08:30</span>
                                    </td>
                                    <td>
                                        <strong>Spinning</strong>
                                        <span>09:00 - 09:45</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <strong>Yoga</strong>
                                        <span>08:00 - 09:00</span>
                                    </td>
                                    <td>
                                        <strong>Cardio</strong>
                                        <span>09:00 - 09:30</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><small>10:00</small></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <strong>Boxeo</strong>
                                        <span>10:15 - 11:00</span>
                                    </td>
                                    <td>
                                        <strong>Zumba</strong>
                                        <span>10:00 - 10:45</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td><small>12:00</small></td>
                                    <td></td>
                                    <td>
                                        <strong>Boxeo</strong>
                                        <span>12:00 - 12:45</span>
                                    </td>
                                    <td>
                                        <strong>Spinning</strong>
                                        <span>12:30 - 13:15</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <strong>Pilates</strong>
                                        <span>12:50 - 13:35</span>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td><small>16:00</small></td>
                                    <td>
                                        <strong>Yoga</strong>
                                        <span>16:00 - 17:00</span>
                                    </td>
                                    <td>
                                        <strong>Zumba</strong>
                                        <span>16:30 - 17:15</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <strong>Cardio</strong>
                                        <span>17:30 - 18:00</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <strong>Pilates</strong>
                                        <span>13:00 - 14:00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>


        <!-- CONTACTO -->
        <section class="contact section" id="contact">
            <div class="container">
                <div class="row">

                    <div class="ml-auto col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4 pb-2">Siéntete libre de preguntar cualquier cosa</h2>                        
                        <form action="./index.php?controller=Home&action=enviarEmail" method="POST" class="contact-form webform" role="form">
                            <input type="email" class="form-control" name="cf-email" placeholder="Correo Electrónico" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" required>
                            <input type="text" class="form-control" name="cf-asunto" placeholder="Asunto" required>
                            <textarea class="form-control" rows="5" name="cf-message" placeholder="Mensaje" required></textarea>
                            <button type="submit" class="form-control" id="submit-button" name="submit">Enviar Mensaje</button>
                        </form>
                    </div>

                    <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4">Dónde nos puedes <span>encontrar</span></h2>
                        <p><i class="fa fa-map-marker mr-1"></i> 45600 Talavera de la Reina - Toledo, España</p>
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24465.31608275831!2d-4.849240545260073!3d39.960074471604194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd401c8ed0fe010d%3A0x1a24f99d9c20899d!2s45600%20Talavera%20de%20la%20Reina%2C%20Toledo!5e0!3m2!1ses!2ses!4v1714981798607!5m2!1ses!2ses" width="1920" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php
        require_once './components/Footer/footer.php';

        function generarAlerta($simbolo, $mensaje, $color) {
            ?>
            <div class="container">
                <div class="row">
                    <div class="popupunder alert alert-<?php echo $color; ?> fade in">
                        <button type="button" class="close close-sm" data-dismiss="alert">
                            <i class="fa-solid fa-x"></i>
                        </button>
                        <i class="fa-solid <?php echo $simbolo; ?>"></i> <?php echo $mensaje; ?></div>
                </div>
            </div>
            <?php
        }

        if (isset($_GET['login']) && $_GET['login'] == 'true') {
            generarAlerta("fa-check", "Éxito: Se ha iniciado sesión correctamente!!", "success");
        }

        if (isset($_GET['sesion']) && $_GET['sesion'] == 'close') {
            generarAlerta("fa-triangle-exclamation", "Ha cerrado sesión correctamente", "light");
        }

        if (isset($_GET['email'])) {
            if ($_GET['email'] == 'true') {
                generarAlerta("fa-check", "Se ha enviado el correo correctamente", "success");
            } else {
                generarAlerta("fa-x", "Error al enviar el correo, intentelo más tarde", "danger");
            }
        }
    }
}
