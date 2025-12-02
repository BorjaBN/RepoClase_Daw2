<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Riesgo</title>
</head>
<body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $peligrosidad_total = 0;
    
        $campos_a_sumar = ['vejacion', 'agresionfisica', 'vsex', 'amenaza', 'reincidente']; 

        foreach ($campos_a_sumar as $campo) {
            if (isset($_POST[$campo])) {
                
                $valor = (int)$_POST[$campo];
                $peligrosidad_total += $valor;
            }
        }
        
        $nivel_texto = "";
        
        switch (true) {
            case ($peligrosidad_total === 0 && $peligrosidad_total <= 1):
                $nivel_texto = "No Apreciado";
                break;
                
            case ($peligrosidad_total >= 2 && $peligrosidad_total <= 4): 
                $nivel_texto = "Bajo";
                break;
                
            case ($peligrosidad_total >= 5 && $peligrosidad_total <= 8): 
                $nivel_texto = "Medio";
                break;
                
            case ($peligrosidad_total >= 9 && $peligrosidad_total <= 12): 
                $nivel_texto = "Alto";
                break;
                
            case ($peligrosidad_total >= 13):
                $nivel_texto = "Extremo";
                break;
            default:
                $nivel_texto = "Error en el Cálculo de Riesgo";
                break;
        }

        
        $factores = isset($_POST['factores']) ? $_POST['factores'] : [];
        $sumaFactores = 0;
        foreach ($factores as $valor) {
            $sumaFactores += (int)$valor;
        }
    }
    ?>
        <h1>Clasificación de Riesgo Calculada</h1>
     

        <h2>Puntuación de Riesgo Total: <?php echo $peligrosidad_total; ?></h2><br>
        <h2>Clasificación de Peligrosidad: <?php echo $nivel_texto; ?></h2><br>
        <h2>Este es el valor de los checkbox: <?php echo $sumaFactores; ?></h2><br>
        <form action="../index.php" method="post">
        <button type="submit">Volver al formulario de registro</button>
      </form>
</body>
</html>
