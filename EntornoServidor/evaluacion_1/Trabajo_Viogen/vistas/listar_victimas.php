<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la búsqueda</title>
</head>
<body>
    
    <?php

        require("../modelos/victimas.php");
        require("../funciones.php");
 
        $busqueda = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';

        $resultados = $busqueda !== '' ? buscarCoincidencias($victimas, $busqueda) : [];

        $hayResultados = count($resultados) > 0;
    ?>

    <h2>Resultados de la búsqueda</h2>

    <form action="incidente_formulario.php" method="post">

    <?php 

        preservarDatos($_POST, "agresor");
        

        if ($hayResultados) {

            foreach ($resultados as $indice) {
                mostrarVictimasCoincidentes($victimas, $indice);
            }

        } else {

            nuevaVictima();
    
        }        
    ?>
  <br>
  <button type="submit">Continuar</button>
</form>

</body>
</html>