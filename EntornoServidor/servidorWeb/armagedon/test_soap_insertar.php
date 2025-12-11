<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "Probando servicio SOAP. Listar:";

$opciones = [
    'uri' => 'http://localhost/servidorWeb/armagedon/soap',
    'soap_version' => SOAP_1_2,
    'connection_timeout' => 30,
    'encoding' => 'UTF-8',
    'cache_wsdl' => WSDL_CACHE_NONE,
    'trace' => 1,
    'exceptions' => 1
];

$cliente = new SoapClient('http://localhost/servidorWeb/armagedon/api.wsdl', $opciones);
$datos = [
    'armagedon' => [
        'titulo' => 'ataque de los ruskis',
        'bajas' => 15
    ]
];

$resultados = $cliente->insertar($datos);

echo"<pre>";
print_r($resultados);
echo"</pre>";