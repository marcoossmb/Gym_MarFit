<?php

class LoginService {

    //GET
    function comprobarUsuario($email, $password) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Usuarios.php?email=" . $email . "&password=" . $password;
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
    function insertarUsuario($password, $nombre, $apellido, $email, $fecha_nacim, $username) {
        $envio = json_encode(array("password" => $password, "nombre" => $nombre, "apellido" => $apellido, "email" => $email, "fecha_nacim" => $fecha_nacim, "username" => $username));

        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Usuarios.php";
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

    //GET
    function comprobarUsuarioGoogle($email) {
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
    function actualizarPassword($email, $password) {
        $envio = json_encode(array("password" => $password));
        $urlmiservicio = "http://localhost/_servWeb/restfulApiGymMarFit/Usuarios.php?email=" . $email;
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
            $response = json_decode($res, true);
            return($response);
        } else {
            return false;
        }
        curl_close($conexion);
    }
}
