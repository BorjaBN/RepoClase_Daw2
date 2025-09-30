<!DOCTYPE html>
<html lang=es>

<head>
        <meta charset=utf-8 />
        <meta name=viewport content='width=device-width, initial-scale=1' />
        <meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
        <link rel=icon type=image/x-icon href=/img/logo.png />
        <title></title>

        <link rel=stylesheet href=css/reset.css />
        <link rel=stylesheet href=css/index.css />
</head>
<body>
        <?php
				phpinfo();
                echo "¡Hola Mundo!";

                $edad = 25;

                $precio = 19.99;

                $nombre = "Borja";

                $profesor = false;

                echo "<p> La variable $edad tiene el valor ".$edad;"</p>";
                        $idad = $edad + 10;
                echo '<p> La variable $edad tiene el valor ' .$edad.'</p>';

                /* Comentario de muchas lías.
                        dsfgtrhyjuujthyrtgef
                        sdfghyjthtgrefwd
                */

				
                /** ARRAYS */
                $frutas = array("Manzana", "Pera", "Melon", 56, true);

                echo "<p> En el array tenemos ".$frutas[1]."</p>";
                print_r($frutas);

                //Arrays asociativos
                $estudiante = [
                        "nombre" => "Borja",
                        "edad" => 25,
                        "curso" => '2DAW2'
                ];

                echo "<p> En el array tenemos \"" .$estudante['nombre']."\"<p>";


                // OBJETOS
                $objeto = new StdClass();
                $objeto->tipo = "Mineral";
				                $objeto->peso = 5.5;      //Kg.

                // TIPOS ESPECIALES (MOURINHO)
                $vaiableNula = null;
                $variableNoDefinida;

                echo 'La variable $variableNula vale ';
                var_dump($variableNula);
                echo "<br />";
				
				
                echo "<p>El tipo de $edad es " .gettype($edad).'</p>';
                echo "<p>¿Es $nombre un string? " .is_string($nombre).'</p>';
				


</body>

</html>

