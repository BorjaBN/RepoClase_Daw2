<?php
$karma = isset($_COOKIE['karma']) ? (int) $_COOKIE['karma'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo_david_jones.css">
    <title>David Jones sella tu destino</title>
</head>
<body>
<?php
    $karma = isset($_COOKIE['karma']) ? (int) $_COOKIE['karma'] : 0;
    $acciones = isset($_COOKIE['acciones']) ? $_COOKIE['acciones'] : '';
    $lista = array_filter(explode(',', trim($acciones, ',')));

    echo "<h1>Has muerto</h1>";
    echo "<h2>Tu karma final es: $karma</h2>";

    if ($karma > 0) {
    echo "<h2>David Jones te deja libre, puedes aburrirte en el cielo</h2>";
    } elseif ($karma < 0) {
    echo "<h2>Vas a pasar el resto de tus días en el Holandés Errante</h2>";
    } else {
    echo "<h2>Te quedas en el limbo, bienvenido al fin del mundo</h2>";
    }

    if (!empty($lista)) {
    echo "<h3>Acciones realizadas:</h3>";
    echo "<ul>";
    foreach ($lista as $accion) {
        echo "<li>" . htmlspecialchars($accion) . "</li>";
    }
    echo "</ul>";
    } else {
    echo "<p>No realizaste ninguna acción registrada.</p>";
    }
?>
</body>
</html>

