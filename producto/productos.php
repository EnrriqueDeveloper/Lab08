<?php

include('../conexion.php');

//Abrimos la conexion a la BD MySql

$connexion = conectar();

//Definimos la consulta Sql

$sql = 'SELECT * FROM producto';

//Ejecutamos el Query en la conexion abierta

$resultado = mysqli_query($connexion,$sql);

//Cerramos la conexion

desconectar($connexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body style="background-color: rgb(205, 255, 253);">
    <div class="container">
        <div class="card mt-5 text-center">
            <div class="card-header bg-info text-dark">
                <h3><div>Productos</div></h3>
            </div>
            <br>
            <div>
                <form action="buscador.php" method="get">
                    <input type = "text" name="busqueda">
                    <button class="btn bg-info" type = "submit" name="enviar" value = "Buscar">Buscar</button>
                </form>
                <?php

                    if(isset($_GET['enviar'])){
                        $busqueda = $_GET['busqueda'];

                        $consulta = $connexion -> $sql("SELECT * FROM Producto WHERE nombre LIKE '%$busqueda%'");

                        while ($row = mysqli_fetch_array($consulta)) {
                            $producto_id = $row['producto_id'];
                            $nombre = $row['nombre'];
                            $descripcion = $row['descripcion'];
                            $stock = $row['stock'];
                            $precioventa = $row['precioventa'];

                            echo '<tr>';
                            echo '<td>'.$producto_id.'</td>';
                            echo '<td>'.$nombre.'</td>';
                            echo '<td>'.$descripcion.'</td>';
                            echo '<td>'.$stock.'</td>';
                            echo '<td>'.$precioventa.'</td>';
                        }
                    }

                ?>
            </div>
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
                <a href="agregar.html"><button type="button" class="btn btn-info">Agregar</button></a>
                <a href="eliminar.html"><button type="button" class="btn btn-info">Eliminar</button></a>
                <a href="actualizar.html"><button type="button" class="btn btn-info">Actualizar</button></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>