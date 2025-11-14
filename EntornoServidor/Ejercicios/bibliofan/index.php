<?php
/**
 * index.php
 * Responsabilidades:
 *        - Cargar la configuración
 *        - Middleware: autenticación, logging (hacer ficheros de log), prevención de ataques
 *        - Routing (saber a quien tengo que enviar la petición): Procesar la petición
 */
try {
    
    $config = require_once('config.php'); //Todo lo que sea de configuración al archivo config

    //Configuración inicial
    if ($config['debug']){
        ini_set('display_errors', 1); //Muestra los errores 
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

    }
    else{

        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }

    //Middlewares

    //Procesar la petición
    $controlador = $_GET['controlador']; //index.php?controlador=Controlador1&metodo=metodo1
    $metodo = $_GET['metodo'];

    require_once($config['dir_controladores'].strtolower($controlador).'.php');
    $controlador = new $controlador($config);
    $controlador->$metodo();

} catch (Throwable $exception) {

    header('HTTP/2 500 Internal Server Error');
    if ($config['debug']){
        echo "Error en index.php:".$exception;
    }
}

