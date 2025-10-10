<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Formulario</title>
</head>
<body>
    <main>
        <form method="GET" action="paginaReceptora.php">
            
            <p>
                <input name="usuario" type="text" placeholder="Usuario" required> <br />
            </p>
            <p>
                <input name="contrasenha" type="password" placeholder="Contraseña" required><br />
            </p>
            <p>
                <input type="submit" value="Enviar">
            </p>

        </form>
    </main>
</body>
</html>