<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
//-------------------------------PARA VER POR QUÉ METODO VIENE----------------------------------------------------------

    try{

        $metodo = strtoupper($_SERVER['REQUEST_METHOD']);
        //throw new Exception("Teste de Excepción");
        switch($metodo){
            case 'GET':
                listar();
                break;
            case 'POST':
                insertar();
                break;
            case 'DELETE':
                eliminar();
                break;
            case 'PUT':
                actualizar();
                break;
            default:
                http_response_code(501);
                echo 'Not Implemented (Err. 1)';
                die();
        }
        die();

    } catch(Throwable $exception){

        http_response_code(500);
        echo 'Error del servidor';

    }


//-------------------------------TODO ESTO ES EL PUT----------------------------------------------------------

function actualizar(){
    $datos = json_decode(file_get_contents('php://input'), true);

    // Comprobar los parámetros
    // Viene id
    if (!array_key_exists('id', $_GET) || trim($_GET['id']) == ""){
        http_response_code(400);
        echo 'Falta el parámetro "id"';
        die();
    }
    $id = $_GET['id'];

    // Viene titulo
    if (!array_key_exists('titulo', $datos) || trim($datos['titulo']) == ""){
        http_response_code(400);
        echo 'Falta el parámetro "titulo"';
        die();
    }

    if (!array_key_exists('bajas', $datos) || trim($datos['bajas']) == ""){
        http_response_code(400);
        echo 'Falta el parámetro "bajas"';
        die();
    }

    if (!array_key_exists('bajas', $datos) || !is_numeric($datos['bajas']) || $datos['bajas'] < 0){
        http_response_code(400);
        echo 'Parámetro "bajas" erróneo';
        die();
    }


    //Llamamos al modelo con los datos y actualizamos el recurso
    // nos devuelve el id del recurso insertado.
    $respuesta = ["url" => "http://localhost/servidorWeb/armagedon/?id=$id"];
    http_response_code(200);
    echo json_encode($respuesta, JSON_UNESCAPED_SLASHES);

}
//-------------------------------TODO ESTO ES EL DELETE----------------------------------------------------------

function eliminar(){
    // Comprobar los parámetros
    // Viene titulo
    if (!array_key_exists('id', $_GET) || trim($_GET['id']) == ""){
        http_response_code(400);
        echo "Falta el parámetro id";
        die();
    }
    echo $_GET['id'];
    //Llamo al modelo
    //Si no existe el elemento
    $existe_recurso = false;
    if(!$existe_recurso){
        http_response_code(404);
        echo "No existe un armagedón con ese id ($id)";
        die();
    }
    //Borrado
    http_response_code(204);
    die();

}

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

    if (!array_key_exists('bajas', $datos) || !is_numeric($datos['bajas']) || $datos['bajas'] < 0){
        http_response_code(400);
        echo 'Parámetro "bajas" erróneo';
        die();
    }


    //Llamamos al modelo con los datos y nos devuelve el id del recurso insertado.
    $id_insertado = 42;
    $respuesta = ["url" => "http://localhost/servidorWeb/armagedon/?id=$id_insertado"];
    http_response_code(201);
    echo json_encode($respuesta, JSON_UNESCAPED_SLASHES);
}