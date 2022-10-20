<?php
require_once 'repoCarros.php';

session_start();

if (isset($_SESSION['usuario']) && isset($_GET['id'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $repoCampeon = new repoCarros();
    $campeon = $repoCampeon->getOne($_GET['id']);
    if ($repoCampeon->delete($campeon)) {
        $mensaje = "Auto eliminado con éxito";
    } else {
        $mensaje = "Error al eliminar el auto";
    }
    header('Location: home.php?mensaje=$mensaje');
} else {
    header('Location: index.php');
}