<?php
/**
	Para configurar el acceso a SQL en XAMPP: Edita el fichero xampp/php/php.ini, descomenta la línea ;extension=sqlite3 (quitando el ;), salva el fichero y reinicia el servidor de XAMPP.
	Además, asegúrate de que hay permisos de escritura en el directorio de la base de datos para todos los usuarios y que hay permisos de escritura sobre el fichero de base de datos para cualquier usuario.
**/
	

	class PDO_SQLite{
		private $conexion;

		public function __construct($path_bd){
			try{
				$db = new SQLite3('prueba_mvc.sqlite');
			} catch (Exception $excepcion) {
	            header('HTTP/2 500 Internal Server Error');
               if ($config['debug']){
                echo "Error en servicios/bd.php:".$excepcion;
               }
        	}		
		}

		public function listar(string $tabla, array $campos){
		}

		public function insertar(string $tabla, array $campos, array $valores){
			$sentencia = $this->conexion->prepare($sql);
			$sentencia->execute($parametros);
			return $this->conexion->lastInsertId();
		}

	}
