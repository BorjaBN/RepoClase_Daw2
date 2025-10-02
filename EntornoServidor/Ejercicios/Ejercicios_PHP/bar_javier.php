<!DOCTYPE html>
<html lang=es>

<head>
        <meta charset=utf-8 />
        <meta name=viewport content='width=device-width, initial-scale=1' />
        <meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
        <link rel=icon type=image/x-icon href=/img/logo.png />
        <title>Bar de Javier</title>

        <link rel=stylesheet href=css/reset.css />
        <link rel=stylesheet href=css/index.css />
</head>
<body>
        <?php
				echo "<pre>";
				
				$categorias = ['D', 'C', 'A', 'M', 'I'];
				
				$ventas = ['D' => 2.80,
				'C' => 48.00,
				'A' => 8.00];
				//print_r($ventas);
				
				
				// 1º Completamos el array
				foreach($categorias as $categoria)
					if(!array_key_exists($categoria, $ventas))
						$ventas[$categoria] = 0;
					
				// 2º Ordenamos descendente
				asort($ventas);     //Para mantener el indice
				print_r($ventas);
				
				$claves = array_keys($ventas);
				print_r($claves);
				
				if ($ventas[$claves[0]] == $ventas[$claves[1]])
					$menos_vendido = "EMPATE";
				else
					$menos_vendido = $claves[0];
				
				
				$ultimo = count($claves) - 1;
				if ($ventas[$claves[$ultimo]] == $ventas[$ultimo - 1])
					$mas_vendido = "EMPATE";
				else
					$mas_vendido = $claves[$ultimo];
				
				
				echo "Menos vendido: $menos_vendido\n";
				echo "Más vendido: $mas_vendido\n";
				//print_r($ventas);
				
				
				echo "<pre>";
		?>
</body>

</html>

