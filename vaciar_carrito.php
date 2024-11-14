<?php
session_start();
$conexion = new mysqli("localhost", "root", "46840711", "libreria_kisomi");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Eliminar todos los productos del carrito donde Estado = 'Activo'
$vaciarQuery = "DELETE FROM carrito WHERE Estado = 'Activo'";

if ($conexion->query($vaciarQuery)) {
    echo "El carrito ha sido vaciado.";
} else {
    echo "Error al vaciar el carrito.";
}

$conexion->close();
?>

