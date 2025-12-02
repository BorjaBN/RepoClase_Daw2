<?php
#------------------------------------------------------ COMÚN ----------------------------------------------------------------------

    function buscarCoincidencias($array, $busqueda){
        $indices_encontrados = [];

        if ($busqueda !== '') {
           
            foreach ($array as $indice => $persona) {
                $coincide = false;

                foreach ($persona as $campo => $valor) {
                    if (stripos($valor, $busqueda) !== false) {
                        $coincide = true;
                    }
                }

                if ($coincide) {
                    array_push($indices_encontrados, $indice);
                }
            }
        }

        return $indices_encontrados;
    }

    function crearCampoOculto($nombre, $valor) {
        $valorSeguro = htmlspecialchars($valor);
        echo '<input type="hidden" name="'.$nombre.'" value="'.$valorSeguro.'">';
    }

    
    function preservarDatos($post , $rol) {
        $clave = $rol . '_indice';

        if (isset($post[$clave])) {

            crearCampoOculto($clave, $post[$clave]);

        } else {
            $campos = ['nombre', 'apellidos', 'edad', 'documentacion', 'telefono', 'domicilio'];
            foreach ($campos as $campo) {
                $nombreCampo = $campo .'_'.$rol;
                if (isset($post[$nombreCampo])) {
                    crearCampoOculto($nombreCampo, $post[$nombreCampo]);
                }
            }
        }
    }

#------------------------------------------------------ VÍCTIMA ----------------------------------------------------------------------

    function nuevaVictima() {
        echo "<p>No existen coincidencias. Rellene los datos para registrar un nuevo victima:</p>";
        echo '<p><label>Nombre:</label><input type="text" name="nombre_victima"></p>';
        echo '<p><label>Apellidos:</label><input type="text" name="apellidos_victima" ></p>';
        echo '<p><label>Edad:</label><input type="number" name="edad_victima"></p>';
        echo '<p><label>Documentación:</label><input type="text" name="documentacion_victima" ></p>';
        echo '<p><label>Teléfono:</label><input type="number" name="telefono_victima"></p>';
        echo '<p><label>Domicilio:</label><input type="text" name="domicilio_victima"></p>';
    }


    function mostrarVictimasCoincidentes ($victimas, $indice){

        $victima = $victimas[$indice];

        echo '<input type="radio" name="victima_indice" value="'.$indice.'" required>';

        echo '<p><strong>Nombre: </strong> '.htmlspecialchars($victima["nombre_victima"]).'</p>';
        echo '<p><strong>Apellidos: </strong> '.htmlspecialchars($victima["apellidos_victima"]).'</p>';
        echo '<p><strong>Edad: </strong> '.htmlspecialchars($victima["edad_victima"]).'</p>';
        echo '<p><strong>Documentación: </strong> '.htmlspecialchars($victima["documentacion_victima"]).'</p>';
        echo '<p><strong>Teléfono: </strong> '.htmlspecialchars($victima["telefono_victima"]).'</p>';
        echo '<p><strong>Domicilio: </strong> '.htmlspecialchars($victima["domicilio_victima"]).'</p>';

        echo '</div></div><hr>';
    }

#------------------------------------------------------ AGRESOR ----------------------------------------------------------------------

    function mostrarAgresoresCoincidentes($agresores, $indice){
        
        $agresor = $agresores[$indice];

        echo '<input type="radio" name="agresor_indice" value="'.$indice.'" required>';

        echo '<p><strong>Nombre: </strong> '.htmlspecialchars($agresor["nombre_agresor"]).'</p>';
        echo '<p><strong>Apellidos: </strong> '.htmlspecialchars($agresor["apellidos_agresor"]).'</p>';
        echo '<p><strong>Edad: </strong> '.htmlspecialchars($agresor["edad_agresor"]).'</p>';
        echo '<p><strong>Documentación: </strong> '.htmlspecialchars($agresor["documentacion_agresor"]).'</p>';
        echo '<p><strong>Teléfono: </strong> '.htmlspecialchars($agresor["telefono_agresor"]).'</p>';
        echo '<p><strong>Domicilio: </strong> '.htmlspecialchars($agresor["domicilio_agresor"]).'</p>';

        echo '</div></div><hr>';
    }


    function nuevoAgresor() {
        echo "<p>No existen coincidencias. Rellene los datos para registrar un nuevo agresor:</p>";
        echo '<p><label>Nombre:</label><input type="text" name="nombre_agresor"></p>';
        echo '<p><label>Apellidos:</label><input type="text" name="apellidos_agresor" ></p>';
        echo '<p><label>Edad:</label><input type="number" name="edad_agresor"></p>';
        echo '<p><label>Documentación:</label><input type="text" name="documentacion_agresor" ></p>';
        echo '<p><label>Teléfono:</label><input type="number" name="telefono_agresor"></p>';
        echo '<p><label>Domicilio:</label><input type="text" name="domicilio_agresor"></p>';
    }

#------------------------------------------------------ FORMULARIO INCIDENTE ----------------------------------------------------------------------
    /*
    function validar_dni($dni) {
        $dni = strtoupper(trim($dni));

        if (!preg_match("/^[0-9]{8}[A-Z]$/", $dni)) {
            return false;
        }

        $numero = substr($dni, 0, 8);
        $letra = substr($dni, -1);
        $letras_dni = "TRWAGMYFPDXBNJZSQVHLCKE";

        return $letra === $letras_dni[$numero % 23];
    }

    function validar_nie($nie) {
        $nie = strtoupper(trim($nie));
        if (!preg_match("/^[XYZ][0-9]{7}[A-Z]$/", $nie)) return false;

        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $prefijo = ["X" => "0", "Y" => "1", "Z" => "2"];
        $numero = $prefijo[$nie[0]] . substr($nie, 1, 7);
        $letra = substr($nie, -1);

        return $letra === $letras[$numero % 23];
    }

    function es_pasaporte($pasaporte) {
        $pasaporte = strtoupper(trim($pasaporte));
        return preg_match("/^[A-Z0-9]{7,10}$/i", $pasaporte);
    }
        
    */

    function cargarDatosVictimas($victimas) {
        if (isset($_POST["victima_indice"])){

            $victima = $victimas[$_POST["victima_indice"]];

            echo '<p><strong>Nombre: </strong>'.htmlspecialchars($victima["nombre_victima"]).'</p>';
            echo '<p><strong>Apellidos: </strong>'.htmlspecialchars($victima["apellidos_victima"]).'</p>';
            echo '<p><strong>Edad: </strong>'.htmlspecialchars($victima["edad_victima"]).'</p>';
            echo '<p><strong>Documentación: </strong>'.htmlspecialchars($victima["documentacion_victima"]).'</p>';
            echo '<p><strong>Teléfono: </strong>'.htmlspecialchars($victima["telefono_victima"]).'</p>';
            echo '<p><strong>Domicilio: </strong>'.htmlspecialchars($victima["domicilio_victima"]).'</p>';

        } else {

            if (isset($_POST)){
        
            echo '<p><strong>Nombre: </strong>'.htmlspecialchars($_POST["nombre_victima"]).'</p>';
            echo '<p><strong>Apellidos: </strong>'.htmlspecialchars($_POST["apellidos_victima"]).'</p>';
            echo '<p><strong>Edad: </strong>'.htmlspecialchars($_POST["edad_victima"]).'</p>';
            echo '<p><strong>Documentación: </strong>'.htmlspecialchars($_POST["documentacion_victima"]).'</p>';
            echo '<p><strong>Teléfono: </strong>'.htmlspecialchars($_POST["telefono_victima"]).'</p>';
            echo '<p><strong>Domicilio: </strong>'.htmlspecialchars($_POST["domicilio_victima"]).'</p>';
            
            } 
        }
    }


function cargarDatosAgresor($agresores) {
       if (isset($_POST["agresor_indice"])){
        
          $agresor = $agresores[$_POST["agresor_indice"]];

          echo '<p><strong>Nombre: </strong>'.htmlspecialchars($agresor["nombre_agresor"]).'</p>';
          echo '<p><strong>Apellidos: </strong>'.htmlspecialchars($agresor["apellidos_agresor"]).'</p>';
          echo '<p><strong>Edad: </strong>'.htmlspecialchars($agresor["edad_agresor"]).'</p>';
          echo '<p><strong>Documentación: </strong>'.htmlspecialchars($agresor["documentacion_agresor"]).'</p>';
          echo '<p><strong>Teléfono: </strong>'.htmlspecialchars($agresor["telefono_agresor"]).'</p>';
          echo '<p><strong>Domicilio: </strong>'.htmlspecialchars($agresor["domicilio_agresor"]).'</p>';


        } else {
            
          if (isset($_POST["nombre_agresor"])){
          
            echo '<p><strong>Nombre: </strong>'.htmlspecialchars($_POST["nombre_agresor"]).'</p>';
            echo '<p><strong>Apellidos: </strong>'.htmlspecialchars($_POST["apellidos_agresor"]).'</p>';
            echo '<p><strong>Edad: </strong>'.htmlspecialchars($_POST["edad_agresor"]).'</p>';
            echo '<p><strong>Documentación: </strong>'.htmlspecialchars($_POST["documentacion_agresor"]).'</p>';
            echo '<p><strong>Teléfono: </strong>'.htmlspecialchars($_POST["telefono_agresor"]).'</p>';
            echo '<p><strong>Domicilio: </strong>'.htmlspecialchars($_POST["domicilio_agresor"]).'</p>';
          }
        }
    }

