<?php

class ServidorSOAP{


    private $controladorMensajes;

    function __construct(){
        $this->controladorMensajes = new ControladorMensajes();
    }

    /** Función de listar
     * - Llama al controlador para obtener la lista de los mensajes
     * - Devuelve la respuesta en la estructura que marca el WSDL
     */
    function listar($peticion){
        
        $lista = $this->controladorMensajes->listar();

        return [
            'mensaje' => $lista
        ];
    }



}
   
