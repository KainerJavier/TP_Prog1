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
            <select class="form-select" name="añoCarro">
                <option selected>Elegir año</option>
                <option value="0km">0km</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2014-2018">2014-2018</option>
                <option value="2010-2013">2010-2013</option>
                <option value="_-2009">_-2009</option>
            </select><br>
            <select class="form-select" name="marcaCarro">
                <option selected>Elegir marca</option>
                <option value="Toyota">Toyota</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Fiat">Fiat</option>
                <option value="Ford">Ford</option>
                <option value="Otro">Otro</option>
            </select><br>
            <input name="precioMax" type="number" class="form-control" placeholder="Precio máximo"><br>
            <div class="btn-container">
                <input type="submit" value="Guardar" class="btn main-btn">
                <a class="btn main-btn"  role="button">Volver</a>
            </div>
        </form>
    </div>
</body>

</html>