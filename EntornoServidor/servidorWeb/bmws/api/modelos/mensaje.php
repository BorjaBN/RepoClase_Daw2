<?php

class Mensaje{
		private const TABLA = 'Mensaje';
		private $campos = ['id', 'titulo', 'cuerpo', 'fecha'];
		private $campos_insertar = ['titulo', 'cuerpo'];
		private $bd;

		public function __construct(){
			$this->bd = new BD(); 
		}

		public function listar(){
			return $this->bd->listar(self::TABLA, $this->campos);
		}
		
		public function insertar(string $titulo, string $cuerpo){
			return $this->bd->insertar(self::TABLA, $this->campos_insertar, [$titulo, $cuerpo]);
		}

		public function consultar(int $id){
			return $this->bd->consultar(self::TABLA, $this->campos, $id);
		}

		public function eliminar(int $id){
			return $this->bd->eliminar(self::TABLA, $id);
		}
		
		public function actualizar(int $id, string $titulo, string $cuerpo){
			$campos = [];
			if ($titulo != null)
				$campos['titulo'] = $titulo;
			if ($cuerpo != null)
				$campos['cuerpo'] = $cuerpo;
			return $this->bd->actualizar(self::TABLA, $campos, $id);
		}

}
