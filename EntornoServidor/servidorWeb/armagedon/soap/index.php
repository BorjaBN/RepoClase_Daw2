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

<<<<<<< HEAD
$peticion = file_get_contents('php://input');
if(!str_contains($peticion, "<token>qwerty</toekn>")){
    header(401);
    echo "No autorizado";
}
$servidor = new SoapServer('../api.wsdl', $opciones);

print_r($cabeceras);
die();
=======
$servidor = new SoapServer('../api.wsdl', $opciones);
>>>>>>> 9c47d731bbfb4c319c2910a47420cb6dfd166fbc
$servidor->setClass('ControladorSOAP');
$servidor->handle();