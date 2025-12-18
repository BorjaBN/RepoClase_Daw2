<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Probando el API-REST. Listar Pokemons <br/>";

$curl_handle = curl_init();

$opciones = [
    CURLOPT_URL => 'http://localhost/servidorWeb/pokemon/api/rest/pokemon/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        'Content-Type: application/json'
    ],
    CURLOPT_VERBOSE => true
];

curl_setopt_array($curl_handle, $opciones);

$respuesta = curl_exec($curl_handle);
$codigoHTTP = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
$error = curl_error($curl_handle);
curl_close($curl_handle);

if ($error){
    throw new Exception("Error cURL: $error.");
}
if($codigoHTTP != 200){
    throw new Exception("Error HTTP: $codigoHTTP - Respuesta: $respuesta.");
}

$respuesta = json_decode($respuesta, true);
echo '<pre>';
print_r($respuesta);
echo '</pre>';
echo "Fin de la prueba </br>";
