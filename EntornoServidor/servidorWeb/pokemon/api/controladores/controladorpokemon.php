<?php

class ControladorPokemon{
	
	private $modelo;

	function __construct(){
		$this->modelo = new Pokemon();
	}

	function listar(): array{
		return $this->modelo->listar();
		
	}
	
	function consultar(int $id): array{
		return $this->modelo->consultar($id);
	}

	function eliminar(int $id): bool{
		return $this->modelo->eliminar($id);
	}

	function insertar(string $nombre, int $vidas): int{
		return $this->modelo->insertar($nombre, $vidas);
	}

	function actualizar(int $id, string $nombre, int $vidas): bool{}
}
