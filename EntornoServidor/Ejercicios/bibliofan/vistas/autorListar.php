<?php
    /**
     * 
     */
    class AutorListar{
        private $config;
        private $autores;

        public function __construct($config, $autores){
            $this->config = $config;
            $this->autores = $autores;
        }

        public function mostrar($autores){
            require_once($this->config['dir_html'].'autor_listar.html');
        }

         public function verDiv($autor){
            return '<div>'.$autor.'</div>';
        }
    }