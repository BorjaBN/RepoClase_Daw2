<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Probando el API-REST. INSERTAR <br/>";

$armagedon = [
    'bajas' => '4234822',
    'titulo' => 'Apocalipsis Zombie'
];
$armagedon = json_encode($armagedon);
$curl_handle = curl_init();

//Todo esto son constantes de la librería aparte
$opciones = [
    CURLOPT_URL => 'http://localhost/servidorWeb/armagedon/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_TIMEOUT => 30,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: qwerty'
        
    ],
    CURLOPT_POSTFIELDS => $armagedon,
    CURLOPT_VERBOSE => true
];

curl_setopt_array($curl_handle, $opciones);

$respuesta = curl_exec($curl_handle);
$codigoHTTP = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
$error = curl_error($curl_handle);
curl_close($curl_handle);


if ($error){
    throw new Exception("Error cURL; $error.");
}
if($codigoHTTP != 201){
    throw new Exception("Error HTTP: $codigoHTTP - Respuesta: $respuesta.");
}

$respuesta = json_decode($respuesta, true);
echo '<pre>';
print_r($respuesta);
echo '<pre>';
echo "Fin de la prueba </br>";