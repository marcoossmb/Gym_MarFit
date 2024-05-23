<?php
// Incluyo todos los servicios
include './services/HomeService.php';
include './services/LoginService.php';
include './services/PerfilService.php';
include './services/ClaseService.php';

// Incluyo todos los controladores
include './controllers/HomeController.php';
include './controllers/LoginController.php';
include './controllers/PerfilController.php';
    include './controllers/ClaseController.php';

// Incluyo todos las vistas
include './views/HomeView.php';
include './views/LoginView.php';
include './views/PerfilView.php';
include './views/ClaseView.php';

// Incluyo todos los objetos
include './services/models/Usuario.php';
include './services/models/Clase.php';

// Define la acción por defecto
define('ACCION_DEFECTO', 'mostrar');

// Define el controlador por defecto
define('CONTROLADOR_DEFECTO', 'Home');

// Comprueba la acción a realizar, que llegará en la petición.
// Si no hay acción a realizar lanzará la acción por defecto, que es listar
// Y se carga la acción, llama a la función cargarAccion
function lanzarAccion($controllerObj){
    
    //method_exists() es una función predefinida de PHP que permite comprobar si un 
    //método existe en un objeto dado.
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    } 
    else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
        //O añadir una página indicando el error de la acción
        //die("Se ha cargado una acción errónea");
    }
}

// Lo que hace es ejecutar una función que va a existir en el controlador
// y que se llama como la acción. Recibe un objeto controlador.
function cargarAccion($controllerObj, $action){
    $accion=$action;
    $controllerObj->$accion();
}


// Carga el controlador especificado y devuelve una instancia del mismo
function cargarControlador($nombreControlador) {
    $controlador = $nombreControlador . 'Controller';
    if (class_exists($controlador)) {
        return new $controlador();
    } else {
        // Si el controlador no existe, se lanza una excepción
        //O añadir una página indicando el error del controlador
        die ("controlador no válido");
    }
}

// Carga el controlador y la acción correspondientes
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}