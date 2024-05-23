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
        <div class="mt-5">a</div>
        <div class="container mt-5">
            <div id='calendar' class="w-75 mx-auto mt-5" data-id-monitor="<?php echo $id_monitor; ?>"></div>

        </div>
        <script src="./js/calendar.js"></script>
        <?php
    }
}
