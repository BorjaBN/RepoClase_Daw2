<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO CONJUNTO FORMULARIO MULTIPART</title>
</head>
<body>
    <header></header>
    <main>
        <h1>Formulario de ficheros</h1>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Datos personales</legend>
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
            </fieldset>
            <fieldset>
                <legend>Fecha de ingreso</legend>
                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha" name="fecha" placeholder="Introduce una fecha">
            </fieldset>
            <fieldset>
                <legend>Archivo cualquiera</legend>
                <input type="file" id="file" name="file" accept=".txt,.pdf,.doc,.docx" >
            </fieldset>
            <fieldset>
                <legend>Imagen cualquiera</legend>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif" >
            </fieldset>
            <br/><button type="submit">Enviar</button>
        </form>

    </main>
    <footer></footer>
</body>
</html>