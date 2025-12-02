<!DOCTYPE html>
<html lang=es>

<head>
        <meta charset=utf-8 />
        <meta name=viewport content='width=device-width, initial-scale=1' />
        <meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
        <link rel=icon type=image/x-icon href=/img/logo.png />
        <title>Escudos</title>

        <link rel=stylesheet href=css/reset.css />
        <link rel=stylesheet href=css/index.css />
</head>
<body>
        <?php
				$legionarios = 20; 
				$total_escudos = 0;
				
				
                
				
				while ($legionarios > 0){
					$ladoMayor = floor(sqrt($legionarios));
					$total_escudos += escudosCuadrado($ladoMayor);
					$legionarios -= $ladoMayor**2;
					
				}
				echo "Hacen falta $total_escudos escudos.";
				
				function escudosCuadrado($lado){
					return $lado**2 + $lado * 4;
				}
			
		?>
</body>

</html>

