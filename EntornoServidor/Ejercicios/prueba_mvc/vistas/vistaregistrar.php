<?php

	class VistaRegistrar{
		private $path_html;

		public function __construct($path_html){
			$this->path_html = $path_html;
		}

		public function mostrar(){
			require_once($this->path_html.'registrar.html');
		}
	}
