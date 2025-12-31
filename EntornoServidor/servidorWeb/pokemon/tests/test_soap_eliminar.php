<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "Probando servicio SOAP. Eliminar:";

$opciones = [
    'uri' => 'http://localhost/servidorWeb/pokemon/api/soap',
    'location' => 'http://localhost/servidorWeb/pokemon/api/soap',
    'soap_version' => SOAP_1_2,
    'connection_timeout' => 30,
    'encoding' => 'UTF-8',
    'trace' => 1,
    'exceptions' => 1
];

$cliente = new SoapClient('http://localhost/servidorWeb/pokemon/api/soap.wsdl', $opciones);

$datos = [
    'id' => 8   
];

$resultados = $cliente->eliminar($datos);

echo "<pre>";
print_r($resultados);
echo "</pre>";
