<?php
	class BD{
		private static $path_bd;
		private $conexion;

		public static function configurar($path_bd){
			self::$path_bd = $path_bd;
		}

		public function __construct(){
			if (!self::$path_bd)
				throw new Exception("La base de datos no está configurada.");

			$this->conexion = new PDO("sqlite:".self::$path_bd);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public function listar(string $tabla, array $campos){
			$columnas = join(', ', $campos);
			$sql = "SELECT $columnas FROM $tabla";
			$sentencia = $this->conexion->prepare($sql);
			$sentencia->execute();
			$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}

		public function insertar(string $tabla, array $campos, array $valores): int{
			$columnas = join(', ', $campos);
			$camposConDosPuntos = array_map(function($elemento) {return ':' . $elemento;
				}, $campos);
			$camposConComas = join(', ', $camposConDosPuntos);
			$sql = "INSERT INTO $tabla ($columnas) VALUES ($camposConComas)";

			$sentencia = $this->conexion->prepare($sql);

			for($i = 0; $i < count($valores); $i++)
				$sentencia->bindParam($camposConDosPuntos[$i], $valores[$i]);

			$sentencia->execute();
			return $this->conexion->lastInsertId();
		}

		public function consultar(string $tabla, array $campos, int $id){
			$columnas = join(', ', $campos);
			$sql = "SELECT $columnas FROM $tabla WHERE id = :id";
			$sentencia = $this->conexion->prepare($sql);
			$sentencia->bindParam(':id', $id);
			$sentencia->execute();
			$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}

		public function eliminar(string $tabla, int $id){
			$sql = "DELETE FROM $tabla WHERE id = :id";
			$sentencia = $this->conexion->prepare($sql);
			$sentencia->bindParam(':id', $id);
			$sentencia->execute();
			//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			return $sentencia->rowCount() > 0;
		}
		


		public function actualizar(string $tabla, array $campos, int $id){
			$camposSet = [];
			foreach($campos as $clave => $valor)
				$camposSet[] = "$clave = :$clave";
			$camposSet = implode(', ', $camposSet);
			$sql = "UPDATE $tabla SET $camposSet WHERE id = :id";

			$sentencia = $this->conexion->prepare($sql);

			$sentencia->bindParam(':id', $id);
			foreach($campos as $clave => $valor)
				$sentencia->bindParam(":$clave", $valor);

			return $sentencia->execute();
		}
	}
