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
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellido_paterno"];
    $apellidoMaterno = $_POST["apellido_materno"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];

    $sql = "INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, Direccion, Email, Telefono, Password) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$direccion', '$email', '$telefono', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Usuario registrado correctamente, redireccionar a la página de inicio de sesión
        header("Location: index.html");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}

$conn->close();
?>
