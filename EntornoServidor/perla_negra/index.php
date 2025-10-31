<?php
if (!isset($_COOKIE['karma'])) {
    setcookie('karma', 0, time() + 3600);
    $_COOKIE['karma'] = 0;
}

if (!isset($_COOKIE['acciones'])) {
    setcookie('acciones', '', time() + 3600);
    $_COOKIE['acciones'] = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];

    $karmaOpciones = [
        'Ayudar' => 1,
        'Dar' => 1,
        'Salvaste' => 1,
        'Apadrinar' => 1,
        'Rescastaste' => 1,
        'Agredir' => -1,
        'Robar' => -1,
        'Abusar' => -1,
        'Traicionar' => -1,
        'Secuestrar' => -1,
    ];

    $karmaActual = (int) $_COOKIE['karma'];
    $karmaNuevo = $karmaActual + $karmaOpciones[$opcion];
    setcookie('karma', $karmaNuevo, time() + 3600);
    $_COOKIE['karma'] = $karmaNuevo;

   
    $acciones = $_COOKIE['acciones'];
    $acciones .= $opcion . ',';
    setcookie('acciones', $acciones, time() + 3600);
    $_COOKIE['acciones'] = $acciones;

    if (rand(1, 10) === 1) {
        header('Location: david_jones.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario de Acciones</title>
  <link rel="stylesheet" href="estilo_marinero.css">
</head>
<body>
  <form action="index.php" method="post">
    <h3>Selecciona:</h3>
    <label><input type="checkbox" name="opcion" value="Agredir"> Agredir al mono de capitan de Barbosa</label><br>
    <label><input type="checkbox" name="opcion" value="Robar"> Robar el ron a la tripulacion</label><br>
    <label><input type="checkbox" name="opcion" value="Abusar"> Abusar de los inocentes</label><br>
    <label><input type="checkbox" name="opcion" value="Traicionar"> Traicionar al capitán Jack Sparrow</label><br>
    <label><input type="checkbox" name="opcion" value="Secuestrar"> Secuestrar a la hija de Barbosa</label><br><br>

    <label><input type="checkbox" name="opcion" value="Ayudar"> Ayudar a un camarada herido </label><br>
    <label><input type="checkbox" name="opcion" value="Dar"> Dar ron a un grumete</label><br>
    <label><input type="checkbox" name="opcion" value="Salvaste"> Salvaste a Elisabeth Swan</label><br>
    <label><input type="checkbox" name="opcion" value="Apadrinar"> Has apadrinado Will Turner</label><br>
    <label><input type="checkbox" name="opcion" value="Rescastaste"> Rescastaste A Willian Turner </label><br><br>

    <button type="submit">Ejecutar acción</button>
  </form>
</body>
</html>
