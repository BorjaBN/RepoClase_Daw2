<?php

    header('Content-Type: application/json; charset=utf-8');

    //Llamo al modelo y obtengo la lista de armagedones:
    $respuesta = [
        ['id' => 1, 'título' => 'Guerra nuclear tottal'],
        ['id' => 2, 'título' => 'Pandemia gripe aviar'],
        ['id' => 3, 'título' => 'Invasión alienígena']
    ];

    echo json_encode($respuesta);