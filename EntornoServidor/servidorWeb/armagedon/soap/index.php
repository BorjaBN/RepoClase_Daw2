<?php

require_once('controladorsoap.php');
$opciones = [
    'uri' => 'http://localhost/servidorWeb/armagedon/soap',
    'soap_version' => SOAP_1_2,
    'encoding' => 'UTF-8',
    'cache_wsdl' => WSDL_CACHE_NONE,
    'trace' => 1,
    'exceptions' => 1
];

$peticion = file_get_contents('php://input');
if(!str_contains($peticion, "<token>qwerty</toekn>")){
    header(401);
    echo "No autorizado";
}
$servidor = new SoapServer('../api.wsdl', $opciones);

print_r($cabeceras);
die();
$servidor->setClass('ControladorSOAP');
$servidor->handle();