<!DOCTYPE html>
<html lang=es>

<head>
        <meta charset=utf-8 />
        <meta name=viewport content='width=device-width, initial-scale=1' />
        <meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
        <link rel=icon type=image/x-icon href=/img/logo.png />
        <title>cambioVariables</title>

        <link rel=stylesheet href=css/reset.css />
        <link rel=stylesheet href=css/index.css />
</head>
<body>
        <?php
				// Cambio de valores
				$a = 7;
				$b = 5;
				
				echo '$a = ' .$a. ' $b = ' .$b. '<br />';
				cambiar($a, $b);
				
				
				echo 'Ahora $a = ' .$a. ' $b = ' .$b. '<br />';
				function cambiar(&$a,&$b){
					$c = $a;
					$a = $b;
					$b = $c;
				}	
				
				
		?>		

</body>

</html>


