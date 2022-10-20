<?php
require_once 'repositorio.php';
require_once 'carros.php';
require_once 'usuario.php';
require_once 'repoUsuario.php';

class repoCarros extends repositorio
{
    public function getAll(Usuario $usuario)
    {
        $idUsuario = $usuario->getId();
        $q = "SELECT id, marca, modelo, año, color FROM carros WHERE id = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $id);
        //Guardo los campos que me trajo el select en variables
        $query->bind_result($id, $marca, $modelo, $año, $color);

        if ($query->execute()) {
            $listaCarros = array();
            //Fetch da falso cuando ya no haya más campeones
            while ($query->fetch()) {
                $listaCarros[] = new carro($id, $marca, $modelo, $año, $color);
            }
            return $listaCarros;
        }
        return false;
    }

    public function getOne($id)
    {
        $q = "SELECT marca, modelo, año, color FROM carros WHERE id = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $id);
        //Guardo los campos que me trajo el select en variables
        $query->bind_result($marca, $modelo, $año, $color);

        if ($query->execute()) {
            if ($query->fetch()) {
                $repoUsuario = new repoUsuario();
                return new carro($id, $marca, $modelo, $año, $color);
            }
        }
        return false;
    }

    public function create(carro $carro)
    {
        $q = "INSERT INTO carros (marca, modelo, año, color) VALUES (?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);
        $query->bind_param(
            //Indico el tipo de parámetro de que voy a mandar
            "sssii",
            $carro->getMarca(),
            $carro->getModelo(),
            $carro->getAño(),
            $carro->getColor(),
        );

        if ($query->execute()) {
            // Retornamos el id del usuario recién insertado.
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

    public function delete(carro $carro)
    {
        $id = $carro->getId();
        $q = "DELETE FROM carros WHERE id = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $id);

        return ($query->execute());
    }

    public function editar(Campeon $campeon)
    {
        $id = $campeon->getId();
        $calificacion = $campeon->getCalificacion();
        $q = "UPDATE campeones SET calificacion = ? WHERE id = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("ii", $calificacion, $id);

        return ($query->execute());
    }
}