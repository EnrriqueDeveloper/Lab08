<?php

include ('../conexion.php');

$busqueda = $_GET['busqueda'];


$conexion = conectar();

$sql = "SELECT * FROM producto WHERE nombre LIKE '%$busqueda%'";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body style="background-color: rgb(205, 255, 253);">
    <div class="container">
    <div class="container">
        <div class="card mt-5 text-center">
            <div class="card-header bg-info text-dark">
                <h3><div>Productos</div></h3>
            </div>
            <br>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($producto = mysqli_fetch_array($resultado)){
                            $producto_id = $producto['producto_id'];
                            $nombre = $producto['nombre'];
                            $descripcion = $producto['descripcion'];
                            $stock = $producto['stock'];
                            $precioventa = $producto['precioventa'];

                            echo '<tr>';
                            echo '<td>'.$producto_id.'</td>';
                            echo '<td>'.$nombre.'</td>';
                            echo '<td>'.$descripcion.'</td>';
                            echo '<td>'.$stock.'</td>';
                            echo '<td>'.$precioventa.'</td>';
                        }
                        ?>
                    </tbody>
                </table>
                <a href="productos.php"><button type="button" class="btn btn-info">Ver todos los productos</button></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </div>
</body>
</html>