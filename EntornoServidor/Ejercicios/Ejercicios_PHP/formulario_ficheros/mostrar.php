<?php

    if (empty($_POST)){
        include ('formulario.php');
        die();
    } else {
     
        $nombre = $_POST['nombre'];
        echo "Tu nombre es: ".$nombre."<br/>";

        $fecha = $_POST['fecha'];
        echo "La fecha es: ".$fecha."<br/>";


        if (!move_uploaded_file($_FILES['file']['tmp_name'], 'ficheros'.DIRECTORY_SEPARATOR.'mi_fichero')){
                echo "LA LIAMOS PARDA";
        } else {
               echo "<a href='ficheros/mi_fichero' download>Haz click para descargar tu archivo</a>";
        }

        if (!move_uploaded_file($_FILES['image']['tmp_name'], 'ficheros'.DIRECTORY_SEPARATOR.'mi_imagen')){
                echo "LA LIAMOS PARDA";
        } else {
               echo "<img src='ficheros/mi_imagen'>";
        }

    /*
        echo "<br/>";

        echo 'Datos del formulario (POST): ';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        // Mostrar estructura de FILES
        echo 'Estructura de $_FILES: ';
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';
        */
    }