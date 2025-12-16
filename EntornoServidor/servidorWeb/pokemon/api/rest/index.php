<?php

	try{
		//Configuración General

		//Nivel de error
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		//Parámetros de configuración general
		$config = require_once('../config.php');

		//Función de carga automática de clases
		require_once($config['path_servicios'].'autoload.php');

		//Configuración de la base de datos
		BD::configurar($config['path_bd']);

		new ServidorREST();

	}
	catch(Throwable $excepcion){
		error_log($excepcion);
		http_response_code(500);
		echo 'Error del servidor';
	}
