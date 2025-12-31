<?php

class ServidorSOAP{

    private $controladorPokemon;

    function __construct(){
        $this->controladorPokemon = new ControladorPokemon();
    }

    function insertar($peticion){
        $cabeceras = file_get_contents('php://input');
        if (!str_contains($cabeceras, '1234')){
            http_response_code(401);
            echo "No autorizado";

        }
        $pokemon = $peticion->pokemon;

        $id = $this->controladorPokemon->insertar($pokemon->nombre, $pokemon->vidas);


        return ['url' => "http://localhost/servidorWeb/pokemon/api/soap/?id=$id"];
    }

}
   
