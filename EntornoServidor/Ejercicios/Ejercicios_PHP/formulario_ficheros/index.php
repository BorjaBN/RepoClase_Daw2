<?php

    if (empty($_POST)){
        include('formulario.php');
        die();
    } else {
        include('mostrar.php');
        die();
    }

    