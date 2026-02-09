<?php
session_start();

// Verificar que el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?controlador=ControladorLogin&metodo=verLogin");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
</head>
<body>
    <h1>He funcionado</h1>
</body>
</html>
