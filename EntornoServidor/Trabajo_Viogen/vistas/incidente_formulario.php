<?php
  require("../modelos/victimas.php");
  require("../modelos/agresores.php");
  require("../funciones.php");

  /*if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["victima_indice"])) {

      $edad = filter_var($_POST["edad_victima"], FILTER_SANITIZE_NUMBER_INT);
      $nombre = trim($_POST["nombre_victima"]);
      $apellidos = trim($_POST["apellidos_victima"]);
      $telefono = $_POST["telefono_victima"];
      $documento = strtoupper(trim($_POST["documentacion_victima"]));
      $domicilio = (trim($_POST["domicilio_victima"]));

      $validaciones = [
        "edad_negativa" => ($edad <= 0),
        "edad_excesiva" => ($edad > 100),
        "nombre_invalido" => (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $nombre)),
        "apellido_invalido" => (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $apellidos)),
        "telefono_invalido" => (!preg_match("/^([6789][0-9]{8}|\+[0-9]{8,15})$/", $telefono)),
        "documento_invalido" => (!validar_dni($documento) && !validar_nie($documento) && !es_pasaporte($documento)),
        "domicilio_invalido" => (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ,\.\-ºª]+$/", $domicilio))
      ];

      foreach ($validaciones as $tipo => $condicion) {
        if ($condicion) {
          switch ($tipo) {
            case "edad_negativa":
              $error_edad = "La <u>edad</u> debe ser un número entero positivo.";
              break;
            case "edad_excesiva":
              $error_edad = "La <u>edad</u> debe ser un número válido.";
              break;
            case "nombre_invalido":
              $error_nombre = "El <u>nombre</u> solo puede contener letras y espacios.";
              break;
            case "apellido_invalido":
              $error_apellido = "Los <u>apellidos</u> solo pueden contener letras y espacios.";
              break;
            case "telefono_invalido":
              $error_telefono = "El <u>teléfono</u> debe tener 9 cifras si es nacional (empezando por 6, 7, 8 o 9), o entre 8 y 15 cifras si es internacional (empezando por '+')";
              break;
            case "documento_invalido":
              $error_documento = "La <u>documentación</u> debe ser un DNI, NIE o pasaporte válido.";
              break;
            case "domicilio_invalido":
              $error_domicilio = "El <u>domicilio</u> no es válido. Evite usar símbolos.";
              break;
          }
        }
      }
    }
  }*/
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
      
    <?php
      /*
      if (!empty($error_edad) || !empty($error_nombre) || !empty($error_apellido) || !empty($error_telefono)  || !empty($error_documento) || !empty($error_domicilio) ) {
       
        echo "<div style='color:red; font-weight:bold;'>";
        if (!empty($error_nombre)) {
          echo "<p>$error_nombre</p>";
        }


        if (!empty($error_apellido)) {
          echo "<p>$error_apellido</p>";
        }


        if (!empty($error_edad)) {
          echo "<p>$error_edad</p>";
        }


        if (!empty($error_telefono)) {
          echo "<p>$error_telefono</p>";
        }


         if (!empty($error_documento)) {
          echo "<p>$error_documento</p>";
        }


        if (!empty($error_domicilio)) {
          echo "<p>$error_domicilio</p>";
        }


        echo "</div>";


        echo "<form action='listar_victimas.php' method='post'>";
        //Aquí faltaría reenviar los datos en campos ocultos para que se muestren de nuevo en el formulario...
        echo '<p><button type="submit">Volver al formulario</button></p>';
        echo '</form>';
        die();
      }*/
      ?>

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

      <br><br>
      <button type="submit">Calcular riesgo</button>
    </form>
</body>
</html>
