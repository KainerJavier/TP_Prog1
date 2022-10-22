<?php
require_once 'usuario.php';

class carros
{
    public $id;
    public $marca;
    public $modelo;
    public $año;
    public $color;

    public function __construct($id, $marca, $modelo, $año, $color)
    {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
        $this->color = $color;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getAño()
    {
        return $this->año;
    }

    public function getColor()
    {
        return $this->color;
    }
}