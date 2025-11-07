<?php

/** Controlador
 *  Responsabilidad:
 *  - Recibir los datos de usuario
 *  - Aplicar reglas de negocio
 *  - Navegar entre vistas
 * 
 */

class Controlador1{
    private $config;

    public function __construct($config){
        $this->config = $config;
    }

    public function verAlta(){
        require_once($this->config['dir_vistas'].'autorVerAlta.php');
        $vista = new AutorVerAlta($this->config);
        $vista->mostrar();
    }

    public function alta(){

        try{
            $nombre = $_POST['nombre'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $fecha_muerte = $_POST['fecha_muerte'];
            $nacionalidad = $_POST['nacionalidad'];
            require_once($this->config['dir_modelos'].'modelo1.php');
            $autor = new Autor($nombre, $fecha_nacimiento, $fecha_muerte, $nacionalidad);
            $autor -> guardar();
        } catch (Throwable $exception){
            header('HTTP/2 500 Internal Server Error');
            echo "Código Error: 1";
            die();
        }
        require_once($this->config['dir_vistas'].'vista2.html');
    }
}