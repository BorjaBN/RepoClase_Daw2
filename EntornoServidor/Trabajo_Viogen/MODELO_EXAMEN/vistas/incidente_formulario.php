<?php
  require("../modelos/victimas.php");
  require("../modelos/agresores.php");
  require("../funciones.php");

  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selector de Incidentes y Buscador</title>
    </head>
<body>

  <h2>Datos de la víctima</h2>
      


      <form action="listar_victimas.php" method="post">
        <p>Ingrese un dato de la víctima:</p>
        <p>(Nombre, apellidos, teléfono, documento de identificación, domicilio).</p>
        <input type="text" id="busqueda" name="busqueda" placeholder="Escriba aquí para cambiar...">

        <?php

          preservarDatos($_POST, "agresor");
          
        ?>
        
        <button type="submit">Buscar</button>

      </form>
      
      <?php

        cargarDatosVictimas($victimas);
      
      ?>
      
      <hr>
      <h2>Datos del agresor</h2>
      <p>Ingrese un dato del agresor:</p>
      <p>(Nombre, apellidos, teléfono, documento de identificación, domicilio).</p>
          
      <form action="listar_agresores.php" method="post">
      <input type="text" id="busqueda" name="busqueda" placeholder="Escriba aquí para buscar...">

      <?php

        preservarDatos($_POST, "victima");

      ?>

      <button type="submit">Buscar</button>

      <br />
      </form>
        
      <?php
        cargarDatosAgresor($agresores);
        
      ?>

      <form action="calcular_riesgo.php" method="post">
      <hr>
      <h2>Registro del incidente</h2>
      <h3>Nivel de vejación</h3>
      <label for="vejacion">Selecciona la gravedad del incidente de vejación:</label>
      <select id="vejacion" name="vejacion" required>
        <option value="0">No Apreciado</option>
        <option value="1">Bajo</option>
        <option value="2">Medio</option>
        <option value="3">Alto</option>
        <option value="4">Extremo</option>
      </select>

      <h3>Nivel de agresión física</h3>
      <label for="agresionfisica">Selecciona la gravedad del incidente de la agresión física:</label>
      <select id="agresionfisica" name="agresionfisica" required>
        <option value="0">No Apreciado</option>
        <option value="1">Bajo</option>
        <option value="2">Medio</option>
        <option value="3">Alto</option>
        <option value="4">Extremo</option>
      </select>

      <h3>Nivel de violencia sexual</h3>
      <label for="vsex">Selecciona la gravedad de la violencia sexual:</label>
      <select id="vsex" name="vsex" required>
        <option value="0">No Apreciado</option>
        <option value="1">Bajo</option>
        <option value="2">Medio</option>
        <option value="3">Alto</option>
        <option value="4">Extremo</option>
      </select>

      <h3>Nivel de amenazas</h3>
      <label for="amenaza">Selecciona la gravedad de las amenazas:</label>
      <select id="amenaza" name="amenaza" required>
        <option value="0">No Apreciado</option>
        <option value="1">Bajo</option>
        <option value="2">Medio</option>
        <option value="3">Alto</option>
        <option value="4">Extremo</option>
      </select>

      <h3>¿El agresor es reincidente?</h3>
      <label for="reincidente">Selecciona si el agresor ha reincidido:</label>
      <select id="reincidente" name="reincidente" required>
        <option value="0">No</option>
        <option value="4">Si</option>
      </select>

      <br>
      <br>
      <hr>
      <h3>Factores adicionales de riesgo Griegos</h3>
      <p>Seleccione los factores que aplican al incidente:</p>

      <label><input type="checkbox" name="factores[]" value="3"> Rellename y al calcular el riesgo te diré mi suma</label><br>
      <label><input type="checkbox" name="factores[]" value="5"> Rellename y al calcular el riesgo te diré mi suma</label><br>
      <label><input type="checkbox" name="factores[]" value="8"> Rellename y al calcular el riesgo te diré mi suma</label><br>
      <label><input type="checkbox" name="factores[]" value="13"> Rellename y al calcular el riesgo te diré mi suma</label><br>
      <label><input type="checkbox" name="factores[]" value="21"> Rellename y al calcular el riesgo te diré mi suma</label><br>

      <br><br>
      <button type="submit">Calcular riesgo</button>
    </form>
</body>
</html>
