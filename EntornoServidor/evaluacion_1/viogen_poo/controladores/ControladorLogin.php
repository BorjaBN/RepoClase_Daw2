<?php
require_once('./modelos/Usuario.php');

class ControladorLogin {
    public function verLogin(){
        require_once('./vistas/html/login.html');
    }

    public function procesarLogin(){
        $usuario = $_POST['usuario'] ?? '';
        $clave   = $_POST['clave'] ?? '';

        $modelo = new Usuario();
        $resultado = $modelo->validarCredenciales($usuario, $clave);

        if ($resultado) {
            $_SESSION['usuario'] = $resultado['id'];
            header("Location: menuPrincipal.php")
        } else {
            $mensaje = "Usuario o clave incorrectos.";
            require_once('./vistas/html/login_error.html');
        }
    }
}

