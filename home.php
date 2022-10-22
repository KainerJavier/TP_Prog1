<?php
require_once 'usuario.php';
require_once 'repoCarros.php';
require_once 'carros.php';

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
    $repoCarro = new repoCarros();
    $carro = $repoCarros->getAll($usuario);
} else {
    header('Location: index.html');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Pellegrini 3638</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="container">
    <div class="text-center page-title">
        <h1>Pellegrini 3638</h1>
    </div>
    <br>
    <div class="text-center">
        <h3>Hola, <?php echo $nomApe; ?></h3>
        <br>
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-info text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
        }
        ?>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Eliminar</th>
            </tr>
            <?php
            if (count($carros) == 0) {
                echo "<tr><td colspan='7'>No hay autos creados</td></tr>";
            } else {
                foreach ($carros as $unCarro) {
                    $id = $unCarro->getId();
                    echo '<tr>';
                    echo "<td>$id</td>";
                    echo "<td>" . $unCarro->getMarca() . "</td>";
                    echo "<td id='modelo-$id'>" . $unCarro->getModelo() . "</td>";
                    echo "<td>" . $unCarro->getAño() . "</td>";
                    echo "<td id='color-$id'>" . $unCarro->getColor() . "</td>";
                    echo "<td><button type='button' onclick='mostrar($id)' class='btn btn-outline'>
                    <img src='assets/pencil-square.svg' class='btn-icon icon-edit'></button></td>";
                    echo "<td><a href='eliminar.php?id=$id' class='btn'><img src='assets/trash.svg' class='btn-icon icon-trash'></a></td>";
                    echo '</tr>';
                }
            }
            ?>
        </table>
        <br>

        <div class="btn-container">
            <a class="btn main-btn" href="form.php" role="button">Añadir nuevo auto</a>
        </div>
        <br>

        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>

</body>

</html>