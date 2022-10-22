<?php

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>¡Bienvenido/a!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="container">
    <div class="text-center page-title">
        <h1>Agencia de autos Pellegrini 3638</h1>
    </div>
    <br>
    <div class="text-center">
        <h3>Ingreso de autos</h3>
        <br>
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
        }
        ?> 
        <form>
            <input name="marca" type="text" class="form-control" placeholder="Marca de auto"><br>
            <input name="Modelo" type="text" class="form-control" placeholder="Modelo del auto"><br>
            <input name="año" type="number" class="form-control" placeholder="Año del auto"><br>
            <input name="color" type="text" class="form-control" placeholder="Color del auto"><br>
            <div class="btn-container">
                <input type="submit" value="Guardar" class="btn main-btn">
                <a class="btn main-btn"  role="button">Volver</a>
            </div>
        </form>
    </div>
</body>

</html>