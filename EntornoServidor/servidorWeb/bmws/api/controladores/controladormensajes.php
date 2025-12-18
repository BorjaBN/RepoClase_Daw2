<?php

class ControladorMensajes{
	
	private $mensaje;

	public function __construct(){
        $this->mensaje = new Mensaje();
    }

	/** Función de listar
	 * - 
	 */
	function listar(): array{
		$datos = $this->mensaje->listar();

		$resultado = [];

        foreach ($datos as $fila){
            $resultado[] = [
                'titulo' => $fila['titulo'],
                'cuerpo' => $fila['cuerpo'],
                'fecha'  => $fila['fecha']
            ];
        }

        return $resultado;
	}
	
	
	function consultar(int $id): array{}

	function eliminar(int $id): bool{}

	function insertar(string $titulo, string $cuerpo): int{
		return $this->mensaje->insertar($titulo, $cuerpo);
	}

	function actualizar(int $id, string $titulo, string $cuerpo): bool{}
}
