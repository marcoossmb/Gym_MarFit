<?php

// Definición de la clase ClaseView
class ClaseView {

    // Método para mostrar las clases
    public function mostrarEleccionClases($allClases) {
        session_start();
        ?>
        <link rel="stylesheet" href="css/profile.css">
        <?php
        require_once './components/Header/header.php';
        ?>
        <div class="class-info">
            <div class="container mt-5 mb-5">
                <h1>Reserva tu clase ahora</h1>
                <p>Elije a que tipo de clase quieres asistir</p>
                <select name="clases" class="select-clases" required>
                    <option selected disabled value="">--Elije--</option>
                    <?php foreach ($allClases as $clase) { ?>
                        <option value="<?php echo $clase->getId_Clase(); ?>"><?php echo $clase->getTitle(); ?></option>
                    <?php } ?>
                </select>
                <div class="class-description"></div>
            </div>
        </div>
        <script src="./js/clases.js"></script>
        <?php
    }

    // Método para mostrar las clases
    public function verMonitorClases() {
        session_start();
        // Verificar si el ID del monitor está presente en la sesión
        if (isset($_SESSION['id_monitor'])) {
            // Obtener el ID del monitor de la sesión
            $id_monitor = $_SESSION['id_monitor'];
        } else {
            header("Location: ./index.php");
        }
        require_once './components/Header/header.php';
        ?>        
        <div class="container mt-5">
            <div id='calendar' class="w-75 mx-auto class-mt" data-id-monitor="<?php echo $id_monitor; ?>"></div>
            <a href="./index.php" class="btn btn-dark mt-5 mb-5 ml-5">Volver</a>
        </div>
        <script src="./js/calendar.js"></script>
        <?php
    }

    // Método para mostrar las clases de cada usuario
    public function verClasesUsuario($clasesPorUsuario) {
        require_once './components/Header/header.php';
        ?>
        <div class="container mt-5 mb-5 class-mt">
            <h2>Mis clases</h2>
            <?php if (empty($clasesPorUsuario)) { ?>
                <p>No tienes ninguna clase reservada.</p>
            <?php } else { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Clase</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Duración</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Acceder</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clasesPorUsuario as $clase) { ?>
                            <tr id="fila-<?php echo $clase['id_clase']; ?>-<?php echo $clase['id_usuario']; ?>-<?php echo $clase['id_reserva']; ?>">
                                <td><?php echo $clase['title']; ?></td>
                                <td><?php echo $clase['tipo']; ?></td>
                                <td><?php echo $clase['descripcion']; ?></td>
                                <td><?php echo $clase['duracion']; ?> min</td>
                                <td><?php echo $clase['start']; ?></td>
                                <td><?php echo substr($clase['hora_clase'], 0, 5); ?></td>
                                <td>
                                    <button class="btn btn-primary" id="boton-<?php echo $clase['id_clase']; ?>-<?php echo $clase['id_usuario']; ?>-<?php echo $clase['id_reserva']; ?>">
                                        <i class="fa-solid fa-qrcode"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <a href="./index.php" class="btn btn-dark">Volver</a>
        </div>
        <canvas id="qrCode" class="d-none"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="./js/qriouspdf.js"></script>
        <?php
    }
}
