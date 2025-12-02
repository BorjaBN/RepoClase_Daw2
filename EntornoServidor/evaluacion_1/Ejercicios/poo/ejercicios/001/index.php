<?php
    require_once('modelos/gerente.php');
    require_once('modelos/desarrollador.php');
    
    $gerente = new Gerente('Borja', 57000, 10000);

    $desarrollador = [];
    
    $desarrollador[0] = new Desarrollador('Laura', 4000, ['PHP', 'JavaScript']);
    $desarrollador[1] = new Desarrollador('Sunsun', 3800, ['PHP', 'Python', 'C++']);

    echo "<pre>";
    var_dump($gerente);
    echo "<pre>";
    var_dump($desarrollador);
    echo "</pre>";

    echo "Bono Gerente: " . $gerente->calcularBono() . "<br>";

    foreach ($desarrollador as $dev) {
        echo "Bono Desarrollador (" . $dev->getNombre() . "): " . $dev->calcularBono() . "<br>";
    }

    echo "<br>TRON: Fin del programa";