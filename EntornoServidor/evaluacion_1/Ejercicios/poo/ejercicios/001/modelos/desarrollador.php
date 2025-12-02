<?php

require_once('empleado.php');

Class Desarrollador extends Empleado{

    private float $bonus;
    private array $lenguajes;

    function __construct(string $nombre, float $salario, array $lenguajes){
        parent::__construct($nombre, $salario);
        $this->lenguajes = $lenguajes;
    }

    function calcularBono(): float {
        $numeroLenguajes = count($this->lenguajes);
        $bono = $this->getSalario() * (0.10 * $numeroLenguajes);
        return $this->getSalario() + $bono;;
    }


//--------------------GETTER Y SETTERS-------------------------------- 

    public function getLenguajes(): array {
        return $this->lenguajes;
    }

    public function setLenguajes(array $lenguajes): void {
        $this->lenguajes = $lenguajes;
    }

    
}