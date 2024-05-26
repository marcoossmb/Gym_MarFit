<?php

class ClaseService {

    //GET
    function allClases() {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Clases.php";
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

    function oneClase($id_clase) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Clases.php?id_clase=" . $id_clase;
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

    //POST Van datos, se pone el Content-Length del envío
    function reservarClase($id_usuario, $id_clase, $start, $hora_clase) {
        $envio = json_encode(array("id_usuario" => $id_usuario, "id_clase" => $id_clase, "start" => $start, "hora_clase" => $hora_clase));

        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Reservas.php";
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

    function oneClaseByTitle($title) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Clases.php?title=" . $title;
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
    
    function request_clasesUsuario($id_usuario) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Clases.php?id_usuario=" . $id_usuario;
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
}
