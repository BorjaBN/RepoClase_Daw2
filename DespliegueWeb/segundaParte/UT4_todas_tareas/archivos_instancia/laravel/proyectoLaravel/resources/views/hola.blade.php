<!DOCTYPE html>
<html>
<head>
    <title>Hola</title>
</head>
<body>
    <h1>
        Hola mundo,
        @isset($nombre)
            de parte de {{ $nombre }},
        @endisset
        estamos en Laravel
    </h1>
</body>
</html>
