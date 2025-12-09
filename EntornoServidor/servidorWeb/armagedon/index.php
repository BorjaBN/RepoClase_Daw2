<?php

//-------------------------------PARA VER POR QUÉ METODO VIENE----------------------------------------------------------

    $metodo = $_SERVER['REQUEST_METHOD'];
    switch($metodo){
        case 'GET':
            listar();
            break;
        case 'POST':
            insertar();
            break;
        default:
            http_response_code(501);
            echo 'Not Implemented';
            die();
    }
    die();

//-------------------------------TODO ESTO ES EL GET----------------------------------------------------------

function listar(){
    

    //Llamo al modelo y obtengo la lista de armagedones:
    $respuesta = [
        ['id' => 1, 'bajas' => 5000000000, 'titulo' => 'Guerra nuclear tottal'],
        ['id' => 2, 'bajas' => 300000000, 'titulo' => 'Pandemia gripe aviar'],
        ['id' => 3, 'bajas' => 70000000000, 'titulo' => 'Invasión alienígena']
    ];

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($respuesta);

}

//-------------------------------TODO ESTO ES EL POST----------------------------------------------------------

function insertar(){
    $datos = json_decode(file_get_contents('php://input'), true);

    // Comprobar los parámetros
    // Viene titulo
    if (!array_key_exists('titulo', $datos) || trim($datos['titulo']) == ""){
        http_response_code(400);
        echo 'Falta el parámetro "titulo"';
        die();
    }

    if (array_key_exists('bajas', $datos) || !is_numeric($datos['bajas']) || $datos['bajas'] < 0){
        http_response_code(400);
        echo 'Parámetro "bajas" erróneo';
        die();
    }


    //Llamamos al modelo con los datos y nos devuelve el id del recurso insertado.
    $id_insertado = 42;
    $respuesta = ["url" => "http:\/\/localhost\/servidorWeb\/armagedon\/?id=$id_insertado"];
    http_response_code(201);
    echo json_encode($respuesta, true);
}