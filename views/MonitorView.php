<?php

// Definición de la clase MonitorView
class MonitorView {

    public function gestionarMonitores($allMonitores) {
        ?>
        <?php
        require_once './components/Header/header.php';
        ?>
        <div class="class-info">
            <div class="container">
                <h2 class="class-mt">Gestión de Monitores</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allMonitores as $monitor) {
                            $monitorId = $monitor['id_monitor'];
                            ?>
                            <tr>
                                <td> <?php echo $monitorId ?> </td>
                                <td> <?php echo $monitor['username'] ?> </td>
                                <td> <?php echo $monitor['nombre'] ?> </td>
                                <td> <?php echo $monitor['apellido'] ?> </td>
                                <td> <?php echo $monitor['email'] ?> </td>
                                <td> <?php echo $monitor['fecha_nac'] ?> </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $monitorId; ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>                    
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="container mb-5 mt-5">
                    <h2>Añadir Nuevo Monitor</h2>
                    <form action="./index.php?controller=Monitor&action=agregarMonitor" method="POST" class="d-flex">
                        <div class="m-3">
                            <input type="text" class="mb-3" name="nombre" placeholder="Nombre"><br> 
                            <input type="text" name="apellido" placeholder="Apellido"><br>

                        </div>
                        <div class="m-3">
                            <input type="date" class="mb-3 w-100" name="fecha_nac" placeholder="Fecha de Nacimiento"><br>                          
                            <input type="email" name="email" placeholder="Email"><br>
                        </div>
                        <div class="m-3">
                            <input type="password" class="mb-3" name="password" placeholder="Contraseña" required><br>
                            <button class="border-0 bg-primary text-white p-1 rounded w-100" type="submit">Añadir</button>
                        </div>

                    </form>
                </div>
                <a href="./index.php" class="btn btn-dark">Volver</a>
            </div>
        </div>

        <?php

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

        if (isset($_GET['aniadir'])) {
            if ($_GET['aniadir'] == 'error') {
                generarAlerta("fa-x", "Error: Este monitor ya está registrado", "danger");
            } else {
                generarAlerta("fa-check", "Monitor añadido correctamente", "success");
            }
        }

        foreach ($allMonitores as $monitor) {
            $monitorId = $monitor['id_monitor'];
            ?>
            <!-- Modal -->
            <div class="modal fade" id="modal-<?php echo $monitorId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-<?php echo $monitorId; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel-<?php echo $monitorId; ?>">Confirmación de Eliminación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mt-4">
                            ¿Estás seguro de que deseas eliminar al monitor <?php echo $monitor['nombre'] . ' ' . $monitor['apellido']; ?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <form action="./index.php?controller=Monitor&action=eliminarMonitor" method="POST">
                                <input type="hidden" name="id_monitor" value="<?php echo $monitor['id_monitor'] ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
