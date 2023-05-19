<?php

function conectar(){
    $conexion = mysqli_connect('localhost','root','usbw','Eval02');
    return $conexion;
}

function desconectar($conn){
    mysqli_close($conn);
}
?>