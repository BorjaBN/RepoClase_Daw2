<?php

class Pokemon{
		private const TABLA = 'Pokemon';
		private $campos = ['id', 'nombre', 'vidas'];
		private $campos_insertar = ['nombre', 'vidas'];
		private $bd;

		public function __construct(){
			$this->bd = new BD(); 
		}

		public function listar(){
			return $this->bd->listar(self::TABLA, $this->campos);
		}
		
		public function insertar(string $nombre, int $vidas){
			return $this->bd->insertar(self::TABLA, $this->campos_insertar, [$nombre, $vidas]);
		}

		public function consultar(int $id){
			return $this->bd->consultar(self::TABLA, $this->campos, $id);
		}

		public function eliminar(int $id){
			return $this->bd->eliminar(self::TABLA, $id);
		}
		
		public function actualizar(int $id, string $nombre, string $vidas){
			$campos = [];
			if ($nombre != null)
				$campos['nombre'] = $nombre;
			if ($vidas != null)
				$campos['vidas'] = $vidas;
			return $this->bd->actualizar(self::TABLA, $campos, $id);
		}

}
