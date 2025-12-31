<?php
spl_autoload_register(function ($clase){
	global $config;
	$clase = strtolower($clase);

	$directorios = [
		 $config['path_controladores']
		,$config['path_modelos']
		,$config['path_servicios']
	];
	foreach($directorios as $directorio)
		if(file_exists($directorio.$clase.".php")){
			require_once($directorio.$clase.".php");
			return;
		}
	throw new Exception("No se encontró la clase '$clase'.");
});
