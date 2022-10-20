<?php
require_once 'usuario.php';
require_once 'carros.php';
require_once 'repoCarros.php';


session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    //se crea el campeon
    $campeon = new Campeon(null ,$_POST['marca'], $_POST['modelo'], $_POST['año'], $_POST['color'], $usuario);
    $repoCampeon = new repoCarros();
    $idCampeon = $repoCarro->create($carro);
    if ($idCarro === false) {
        header('Location: home.php?mensaje=Error al crear auto');
    } else {
        $carro->setId($idCarro);
        header('Location: home.php?mensaje=auto creado con éxito');
    }
} else {
    header('Location: index.php');
}