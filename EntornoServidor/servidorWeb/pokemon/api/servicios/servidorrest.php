<?php

class ServidorREST{

    function __construct(){
        $this->controladorPokemon = new ControladorPokemon();
    }

    function listar(){
        $resultado = $this->controladorPokemon->listar();
    }

}
