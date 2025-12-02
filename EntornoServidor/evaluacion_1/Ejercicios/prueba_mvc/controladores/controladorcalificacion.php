<?php
	class ControladorCalificacion{
		private $config;
		private $modelo;
		
		public function __construct($config){
			$this->config = $config;
			require_once($this->config['path_modelos'].'calificacion.php');
			$this->modelo = new Calificacion($this->config['path_servicios'], $this->config['path_bd']);
		}

		public function listar(){
			$calificaciones = $this->modelo->listar();
			require_once($this->config['path_vistas'].'vistalistar.php');
			$vista = new VistaListar($this->config['path_html']);
			$vista->mostrar($calificaciones);
		}

		public function registrar(){
			//Sanitización de parámetros
			try{

               $alumno = $_POST['nombre'];
					$calificacion = $_POST['calificacion'];
               

               //TODO: SANITIZAR Y VALIDAR
               if ($alumno == ''){
                   $alumno = null;
               }

               require_once($this->config['path_modelos'].'calificacion.php');
               $this->modelo->registrar($alumno, $calificacion);
					$this->verRegistrar("El registro de la calificación se realizó con éxito");

            } catch (Throwable $excepcion){
                
               header('HTTP/2 500 Internal Server Error');
               if ($this->config['debug']){
                echo "Error en ControladorAutor.php:".$excepcion;
               }
               die();
            }
		}

		public function verRegistrar($mensaje = null){
			require_once($this->config['path_vistas'].'vistaregistrar.php');
			$vista = new VistaRegistrar($this->config['path_html']);
			$vista->mostrar();
		}
	}
