<?php
session_start();

// Cargar configuración
$config = require('./config.php');

// Determinar qué controlador y método se pide
$controlador = $_GET['controlador'] ?? 'ControladorLogin';
$metodo      = $_GET['metodo'] ?? 'verLogin';

// Incluir el archivo del controlador
require_once("./controladores/$controlador.php");

// Instanciar el controlador
$instancia = new $controlador($config);

// Llamar al método
if (method_exists($instancia, $metodo)) {
    $instancia->$metodo();
} else {
    echo "Método $metodo no encontrado en $controlador.";
}



/**
 * index.php
 * Responsabilidades:
 *  - Cargar configuración inicial
 *  - Configuración de errores
 *  - Middleware de autenticación
 *  - Routing
 */

/*try {
    // Cargar configuración inicial   
    $config = require_once('config.php'); 
    session_start(); 

    // Autoload
    spl_autoload_register(function($clase) use ($config){
        $directorios = [
            $config['dir_controladores'],
            $config['dir_modelos'],
            $config['dir_vistas'],
            $config['dir_servicios'],
        ];

        foreach ($directorios as $dir) {
            $ruta = $dir.$clase.'.php';
            if (file_exists($ruta)){
                require_once $ruta;
                return; 
            }    
        }
    });

    // Configuración de errores
    if ($config['debug']){
        ini_set('display_errors', 1); 
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }

    // Middleware de autenticación
    $controladorSolicitado = $_GET['controlador'] ?? 'ControladorInicio';
    $metodoSolicitado = $_GET['metodo'] ?? 'verInicio';
    // Si no hay sesión y no estamos en el login, mostrar login
if (!isset($_SESSION['usuario']) && $controladorSolicitado !== 'LoginController') {
    require_once $config['dir_html'].'/login.html';
    exit;
}

    if (!isset($_SESSION['usuario']) && $controladorSolicitado !== 'LoginController') {
        // Opción A: devolver error HTTP
        // http_response_code(401);
        // echo "401 Unauthorized";

        // Opción B: mostrar login
        require_once $config['dir_html'].'/login.html';
        exit;
    }

    // Routing
    $controlador = new $controladorSolicitado($config);
    $controlador->$metodoSolicitado();

} catch (Throwable $exception){
    http_response_code(500);
    if ($config['debug']){
        echo "Error en index.php: ". $exception;
    }
}
*/

