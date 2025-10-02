<!DOCTYPE html>
<html lang=es>

<head>
        <meta charset=utf-8 />
        <meta name=viewport content='width=device-width, initial-scale=1' />
        <meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
        <link rel=icon type=image/x-icon href=/img/logo.png />
        <title>Cuesta Sumar</title>

        <link rel=stylesheet href=css/reset.css />
        <link rel=stylesheet href=css/index.css />
</head>
<body>
        <?php
				//Datos de entrada
				$numeros = [1,2,3];
				echo "Resultado: ".calcularEsfuerzo($numeros);
				$numeros = [3,1,4,2];
				echo "<br />Resultado: ".calcularEsfuerzo($numeros);
				$numeros = [30,40,50,60];
				echo "<br />Resultado: ".calcularEsfuerzo($numeros);
				
				function calcularEsfuerzo($numeros){
					//Datos de salida
					$esfuerzo = 0;
					
					while (count($numeros) >=2){
						// 1. Ordeno el array en orden ascendente
						sort($numeros);
						
						
						// 2. Sumo los dos primeros y los añado al esfuerzo
						
						$tmp = $numeros[0] + $numeros[1];
						$esfuerzo += $tmp;
						array_push($numeros, $tmp);
						//print_r($numeros);
						array_splice($numeros, 0, 2);
						//print_r($numeros);
					}
					return $esfuerzo;
				}
				
				
			
		?>
</body>

</html>

