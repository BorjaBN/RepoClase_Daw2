<?php


    /** Modelo
     *  Responsabilidad:
     *  - Representar los datos del negocio.
     *  - Gestionar la Persistencia.
     */
    class Modelo1{
        public function guardar($datos){
            echo 'Guardando ' .$datos;
            //throw new Exception("No hay BD");
        }
    }