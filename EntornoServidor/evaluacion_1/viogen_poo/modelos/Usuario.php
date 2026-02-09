<?php
require_once('./servicios/BD.php');

class Usuario {
    private $bd;

    public function __construct(){
        $this->bd = new BD(); // inicializa la conexión usando config.php
    }

    public function validarCredenciales($nombre, $clave){
        $sql = "SELECT id FROM Usuario WHERE nombre = ? AND clave = ?";
        $resultado = $this->bd->seleccionar($sql, [$nombre, $clave]);
        return $resultado ? $resultado[0] : false;
    }
}

