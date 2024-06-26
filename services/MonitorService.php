<?php

class MonitorService {

    //PUT para modificar
    function updateImcMonitor($id_monitor, $imc) {
        $envio = json_encode(array("imc" => $imc));
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Monitores.php?id_monitor=" . $id_monitor;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);

        if ($res) {
            return($res);
        } else {
            return false;
        }
        curl_close($conexion);
    }

    //GET
    function allMonitores() {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Monitores.php";
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido de la respuesta
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            return($res);
        } else {
            return false;
        }
        curl_close($conexion);
    }

    //DELETE para borrar
    function eliminarMonitor($id_monitor) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Monitores.php?id_monitor=" . $id_monitor;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        //Campos que van en el envío
        //curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            return true;
        } else {
            return false;
        }
        curl_close($conexion);
    }

    //POST
    function agregarMonitor($username, $password, $nombre, $apellido, $email, $fecha_nac) {
        $envio = json_encode(array("password" => $password, "nombre" => $nombre, "apellido" => $apellido, "email" => $email, "fecha_nac" => $fecha_nac, "username" => $username));

        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Monitores.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $response = json_decode($res, true);
            return $response;
        }
    }
}
