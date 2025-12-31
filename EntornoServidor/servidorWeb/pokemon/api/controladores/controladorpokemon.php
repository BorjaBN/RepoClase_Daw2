<?php

class ControladorPokemon{
	
	private $modelo;

	function __construct(){
		$this->modelo = new Pokemon();
	}

	function listar(): array{}
	
	function consultar(int $id): array{}

	function eliminar(int $id): bool{}

	function insertar(string $nombre, int $vidas): int{
		return $this->modelo->insertar($nombre, $vidas);
	}

	function actualizar(int $id, string $nombre, int $vidas): bool{}
}
