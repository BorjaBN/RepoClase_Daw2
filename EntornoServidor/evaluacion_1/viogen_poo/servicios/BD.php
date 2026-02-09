<?php

class BD {

    private $conexion;

    public function __construct (){
        try {
            
            $config = require('./config.php');
            $host = $config['bd_host'];
            $nombre = $config['bd_nombre'];
            $usuario = $config['bd_usuario'];
            $clave = $config['bd_clave'];
            $stringConexion = "mysql:host=$host;dbname=$nombre";

            // Crear conexión PDO
            $this->conexion = new PDO($stringConexion, $usuario, $clave);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Throwable $excepcion) {
            http_response_code(500);
            if ($config['debug']){
                echo "Error en servicios/BD.php: ".$excepcion->getMessage();
            }
        }
    }

    /**
     * Ejecutar consultas SELECT
     */
    public function seleccionar($sql, $parametros = null){
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute($parametros);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
/*
    /**
     * Ejecutar consultas INSERT/UPDATE/DELETE
     * @param string $sql
     * @param array $parametros
     * @return int número de filas afectadas
     */
/*    public function ejecutar($sql, $parametros){
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute($parametros);
        return $sentencia->rowCount();
    }
*/
    /**
     * Obtener el último ID insertado
     */
 /*   public function ultimoId(){
        return $this->conexion->lastInsertId();
    }*/
}
