<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    echo "Probando servicio SOAP";


    $opciones = [
        'uri' => 'http://localhost/servidorWeb/armagedon/soap',
        'location' => 'http://localhost/servidorWeb/armagedon/soap',
        'soap_version' => SOAP_1_2,
        'connection_timeout' => 30,
        'encoding' => 'UTF-8',
        'trace' => 1,
        'exceptions' => 1
    ];

    $cliente = new SoapClient('http://localhost/servidorWeb/armagedon/api.wsdl', $opciones);
    try {
        $resultados = $cliente->listar();
        print_r($resultados);
    } catch (Exception $e) {
        echo "<h3>REQUEST:</h3>";
        echo "<pre>" . htmlspecialchars($cliente->__getLastRequest()) . "</pre>";

        echo "<h3>RESPONSE:</h3>";
        echo "<pre>" . htmlspecialchars($cliente->__getLastResponse()) . "</pre>";

        throw $e;
    }