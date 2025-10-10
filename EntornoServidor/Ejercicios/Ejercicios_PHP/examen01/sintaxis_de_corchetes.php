<!DOCTYPE html>
<html lang=es>

<head>
        <meta charset=utf-8 />
        <meta name=viewport content='width=device-width, initial-scale=1' />
        <meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
        <link rel=icon type=image/x-icon href=/img/logo.png />
        <title>La sintaxis</title>

        <link rel=stylesheet href=css/reset.css />
        <link rel=stylesheet href=css/index.css />
</head>
<body>
        <?php
				$i = 0;
				$caracteres = [];
				$caracteres[$i++] = '1234';
				$caracteres[$i++] = '1)2&';
				$caracteres[$i++] = '(';
				$caracteres[$i++] = '())';
				$caracteres[$i++] = '()';
				$caracteres[$i++] = ')()';
				$caracteres[$i++] = ')()(';
				$caracteres[$i++] = ')(';
				$caracteres[$i++] = '())(';
				
				foreach($caracteres as $caso)
					echo $caso." -> ".estanBalanceados($caso)."<br />";
				
				
				function estanBalanceados($caracteres){
					$contadorAbiertos = 0;
					$contadorCerrados = 0;
					$correcto = true;
					for ($i = 0; $i < strlen($caracteres); $i++){
						if ($caracteres[$i] == '(')
							$contadorAbiertos++;
						if ($caracteres[$i] == ')')
							$contadorCerrados++;
						
						
						$correcto = $contadorAbiertos == $contadorCerrados;	
						if ($correcto)
							return "YES";
						else 
							return "NO";
					}
				}
		?>
</body>

</html>

