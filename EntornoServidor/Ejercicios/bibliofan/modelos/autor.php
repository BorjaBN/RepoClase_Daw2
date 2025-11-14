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

        public static function listar(){
            $base_datos = new BD();
            $sql = "SELECT autor.id, autor.nombre, autor.fecha_nacimiento, autor.fecha_muerte, autor.nacionalidad
                     FROM autor
                     ORDER BY autor.nombre ASC";
            $tuplas = $base_datos->seleccionar($sql);
            $autores = [];
            foreach($tuplas as $tupla){
                $autor = new Autor ($tupla['nombre'], $tupla['fecha_nacimiento'], $tupla['fecha_muerte'], $tupla['nacionalidad']);
                $autor->id = $tupla['id'];
                array_push($autores, $autor);
            }
            return $autores;
        }

        public function __construct(string $nombre,  string $fecha_nacimiento, ?string  $fecha_muerte,string  $nacionalidad) {
            $this->id=null;
            $this->nombre = $nombre;
            $this->fecha_nacimiento = $fecha_nacimiento;
            $this->fecha_muerte = $fecha_muerte;
            $this->nacionalidad = $nacionalidad;
            $this->base_datos = new BD();
            
        }

        public function getId(): int{
            return $this->id;
        }

        public function __toString(){
            return $resultado =$this->id. '.'.$this->nombre.' ('.$this->nacionalidad.')';
        }

        public function guardar(){
            try{
                $sql = "INSERT INTO autor (nombre, fecha_nacimiento, fecha_muerte, nacionalidad) VALUES (?, ?, ?, ?)";
                $parametros = [$this->nombre, $this->fecha_nacimiento, $this->fecha_muerte, $this->nacionalidad];

                $this->id = $this->base_datos->insertar($sql, $parametros);
                return $this->id;
    
            } catch(Throwable $excepcion) {
               header('HTTP/2 500 Internal Server Error');
               if ($config['debug']){
                    echo "Error en modelos/autor.php:".$excepcion;
                }
            }
        }

        
    }