<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la búsqueda</title>
</head>
<body>
    
    <?php

        require("../modelos/agresores.php");
        require("../funciones.php");
 
        $busqueda = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';

        $resultados = $busqueda !== '' ? buscarCoincidencias($agresores, $busqueda) : [];
    
        $hayResultados = count($resultados) > 0;
    ?>

    <h2>Resultados de la búsqueda</h2>

    <form action="incidente_formulario.php" method="post">

        <?php 
            
            preservarDatos($_POST, "victima");
            
            
                
            if ($hayResultados) {

                foreach ($resultados as $indice) {
                     mostrarAgresoresCoincidentes($agresores, $indice);
                }

            } else {
                nuevoAgresor();
            }
        ?>
        <br />
        <button type="submit">Continuar</button>
    </form>

</body>
</html>