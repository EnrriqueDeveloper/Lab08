<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "Eval02";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM Usuario WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuario autenticado correctamente, mostrar mensaje de bienvenida
        header("Location: ../producto/productos.php");
    } else {
        // Usuario no encontrado, redireccionar a la página de inicsio de sesión con mensaje de error
        header("Location: index.html?error=1");
        exit();
    }
}

$conn->close();
?>
