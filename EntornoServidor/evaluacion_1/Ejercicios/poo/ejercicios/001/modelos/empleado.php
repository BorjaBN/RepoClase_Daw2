<?php

abstract class Empleado{
    static private string $departamento = 'Informática';

    private string $nombre;
    protected float $salario;
    

    function __construct(string $nombre, float $salario){
        $this ->nombre = $nombre;
        $this ->salario = $salario;
        
    }

    abstract function calcularBono(): float;

//--------------------GETTER Y SETTERS-------------------------------- 

    function getNombre(): string{
        return $this ->nombre;
    }

    function getSalario(): float{
        return $this ->salario;
    }

    function setNombre(string $nombre): void{
        $this ->nombre = $nombre;

    }

    function setSalario(float $salario): void{
        $this ->salario = $salario;

    }

    public static function getDepartamento(): string {
        return self::$departamento;
    }

}