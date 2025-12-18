<?php

class ServidorREST{

    private $controladorMensajes;

    public function __construct() {
        $this->controladorMensajes = new ControladorMensajes();
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

    /** Funcion de insertar
     * - Leer JSON del body
     * - Valida
     * - Inserta en db
     */
    private function insertar() {

        $datos = json_decode(file_get_contents('php://input'), true);

        if (!isset($datos['titulo']) || trim($datos['titulo']) === '') {
            http_response_code(400);
            echo json_encode(["error" => "Falta el parámetro 'titulo'"]);
            return;
        }

        if (!isset($datos['cuerpo']) || trim($datos['cuerpo']) === '') {
            http_response_code(400);
            echo json_encode(["error" => "Falta el parámetro 'cuerpo'"]);
            return;
        }

        $id = $this->controladorMensajes->insertar(
            $datos['titulo'],
            $datos['cuerpo']
        );

        
        http_response_code(201);
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            "url" => "http://localhost/bmws/api/rest/mensajes/$id"
        ]);
    }

}
