<?php

class PerfilService {

    //GET
    function procesarUsuario($email) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Usuarios.php?email=" . $email;
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

    //PUT para modificar
    function updateFecha($id_usuario, $fecha_nacim) {
        $envio = json_encode(array("fecha_nacim" => $fecha_nacim));
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Usuarios.php?id_usuario=" . $id_usuario . "&actualizafecha";
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

    //PUT para modificar
    function updateImc($id_usuario, $imc) {
        $envio = json_encode(array("imc" => $imc));
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Usuarios.php?id_usuario=" . $id_usuario;
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
}
