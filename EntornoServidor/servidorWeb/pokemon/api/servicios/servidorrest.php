<?php

class ServidorREST {

    private $controladorPokemon;

    public function __construct() {
        $this->controladorPokemon = new ControladorPokemon();
        $this->router();
    }

    private function router() {

        $metodo = strtoupper($_SERVER['REQUEST_METHOD']);

        switch ($metodo) {

            case 'GET':
                $this->listar();
                break;

            case 'POST':
                $this->insertar();
                break;

            default:
                http_response_code(501);
                echo json_encode(["error" => "Método no implementado"]);
        }
    }

    private function listar() {
        $lista = $this->controladorPokemon->listar();
        header('Content-Type: application/json');
        echo json_encode($lista);
    }

    private function insertar() {
        $datos = json_decode(file_get_contents('php://input'), true);

        $id = $this->controladorPokemon->insertar(
            $datos['nombre'],
            $datos['vidas']
        );

        http_response_code(201);
        echo json_encode(["url" => "http://localhost/servidorWeb/pokemon/api/rest/pokemon/$id"]);
    }
}



/*
class ServidorREST{

    private $controladorPokemon;

    public function __construct() {
        $this->controladorPokemon = new ControladorPokemon();
        $this->router();
    }

    private function router() {

        $metodo = strtoupper($_SERVER['REQUEST_METHOD']);
        $uri = $_SERVER['REQUEST_URI'];

        // Partimos la URL en trozos
        $partes = explode('/', trim($uri, '/'));

        // Buscamos la palabra "pokemon"
        $indice = array_search('pokemon', $partes);

        if ($indice === false) {
            http_response_code(404);
            echo json_encode(["error" => "Recurso no encontrado"]);
            return;
        }

        // ============================
        // SWITCH DEL INDEX DE ARMAGEDON
        // ============================
        switch ($metodo) {

            case 'GET':
                // GET /pokemon
                if (!isset($partes[$indice + 1])) {
                    $this->listar();
                    return;
                }
                http_response_code(404);
                echo json_encode(["error" => "Operación GET no válida"]);
                return;

            case 'POST':
                // POST /pokemon
                if (!isset($partes[$indice + 1])) {
                    $this->insertar();
                    return;
                }
                http_response_code(404);
                echo json_encode(["error" => "Operación POST no válida"]);
                return;

            default:
                http_response_code(501);
                echo json_encode(["error" => "Método no implementado"]);
                return;
        }
    }

    // ============================================================
    // GET /pokemon
    // ============================================================
    private function listar() {

        $lista = $this->controladorPokemon->listar();

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            "pokemon" => $lista
        ]);
    }

    // ============================================================
    // POST /pokemon
    // Body JSON: { "nombre": "Pikachu", "vidas": 3 }
    // ============================================================
    private function insertar() {

        $datos = json_decode(file_get_contents('php://input'), true);

        // Validaciones
        if (!isset($datos['nombre']) || trim($datos['nombre']) === '') {
            http_response_code(400);
            echo json_encode(["error" => "Falta el parámetro 'nombre'"]);
            return;
        }

        if (!isset($datos['vidas']) || !is_numeric($datos['vidas'])) {
            http_response_code(400);
            echo json_encode(["error" => "El parámetro 'vidas' es incorrecto"]);
            return;
        }

        // Insertar en BD
        $id = $this->controladorPokemon->insertar($datos['nombre'], (int)$datos['vidas']);

        http_response_code(201);
        echo json_encode([
            "url" => "http://localhost/servidorWeb/pokemon/api/rest/pokemon/$id"
        ]);
    }
}
*/
    

    

    

