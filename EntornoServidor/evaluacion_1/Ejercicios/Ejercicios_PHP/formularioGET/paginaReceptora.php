<?php
    
    
        if (!empty($_GET)){
           // echo "Hola ".$_GET['usuario'];
           require('menu_principal.php');
        }
        else{
            include('formulario.php');
        }





