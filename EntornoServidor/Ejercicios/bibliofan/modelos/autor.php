<?php
    /**Modelo Autor
     * Responsabilidad:
     *  -Representa a un autor
     *  -Gestiona la persistencia
     */

    require_once('./servicios/bd.php');
    class Autor {

        private $id;
        private $nombre;
        private $fecha_nacimiento;
        private $fecha_muerte;
        private $nacionalidad;
        private $base_datos;

        public function __construct($nombre, $fecha_nacimiento, $fecha_muerte, $nacionalidad) {
            $this->id=null;
            $this->nombre = $nombre;
            $this->fecha_nacimiento = $fecha_nacimiento;
            $this->fecha_muerte = $fecha_muerte;
            $this->nacionalidad = $nacionalidad;
            $this->base_datos = new BD();
            
        }

        public function guardar(){
            try{
                $sql = "INSERT INTO autor (nombre, fecha_nacimiento, fecha_muerte, nacionalidad) VALUES (?, ?, ?, ?)";

                $parametros = [$this->nombre, '2010-01-01', null, $this->nacionalidad];

                $this->id = $this->base_datos->insertar($sql, $parametros);
                die("Hemos insertado con el id ".$this->id);
    
            } catch(Throwable $excepcion) {
               header('HTTP/2 500 Internal Server Error');
               if ($config['debug']){
                    echo "Error en modelos/autor.php:".$excepcion;
                }
            }
        }
    }