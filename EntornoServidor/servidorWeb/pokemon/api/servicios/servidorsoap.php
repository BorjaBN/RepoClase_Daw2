<?php

class ServidorSOAP{

    private $controladorPokemon;

    function __construct(){
        $this->controladorPokemon = new ControladorPokemon();
    }

    function listar($peticion){
        // Llamar al controlador para obtener la lista de pokémon
        $lista = $this->controladorPokemon->listar();

        // Devolver la respuesta en la estructura que marca el WSDL:
        // Por eso devolvemos un array con la clave 'pokemon'
        return [
            'pokemon' => $lista
        ];
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


    public function consultar($peticion) {

        $id = $peticion->id;

        $pokemon = $this->controladorPokemon->consultar($id);

        // Si no existe, no devolvemos nada
        if (!$pokemon || count($pokemon) === 0) {
            return [];
        }

        // BD->consultar devuelve un array de arrays, así que cogemos la primera fila
        $pokemon = $pokemon[0];

            // Eliminar el campo 'id'
        unset($pokemon['id']);

        return ['pokemon' => $pokemon];
    }
    
    public function eliminar($peticion) {

        // Obtener el ID enviado por el cliente SOAP
        $id = $peticion->id;

        // Llamar al controlador para eliminar el Pokémon
        $resultado = $this->controladorPokemon->eliminar($id);

        // Devolver la respuesta según el WSDL
        return ['resultado' => (bool)$resultado];
        

    }

}
   
