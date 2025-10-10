<!DOCTYPE html>
<html lang=es>

<head>
        <meta charset=utf-8 />
        <meta name=viewport content='width=device-width, initial-scale=1' />
        <meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
        <link rel=icon type=image/x-icon href=/img/logo.png />
        <title>tablaMultiplicar</title>

        <link rel=stylesheet href=css/reset.css />
        <link rel=stylesheet href=css/index.css />
</head>
<body>
        <?php
				// Datos de entrada
				$inicio = 3;
				$fin = 6;
				
				for ($j = 3; $j <=5; $j++){
					for ($i = 1; $i<10; $i++){
						echo "$inicio x ".($i + 1)." = ".($i * 3)."<br />"
					}
				}
				
				
				
				

</body>

</html>

