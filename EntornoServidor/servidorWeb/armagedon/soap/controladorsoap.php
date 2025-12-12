<?php

class controladorSOAP {


    function listar(){
        //Comprobación de parámetros...
        //Consulta al modelo...

        $respuesta = [
            ['id' => 1, 'bajas' => 5000000, 'titulo' => 'Guerra con Portugal'],
            ['id' => 2, 'bajas' => 15000000, 'titulo' => 'Epidemia de retos en RRSS']
        ];

        return ['armagedon' => $respuesta];
    }


    function insertar($peticion){
        // Comprobamos el token
        
        $armagedon = $peticion->armagedon;

       //Comprobamos los parámetros
       //Se lo pasamos al modelo que nos devuelve el id de inserción
        $id = 42;
        return ['url' => "http://localhost/servidorWeb/armagedon/?id=$id"];
    }
}