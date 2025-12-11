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

$servidor = new SoapServer('../api.wsdl', $opciones);
$servidor->setClass('ControladorSOAP');
$servidor->handle();