<?php
session_start();
$conexion = new mysqli("localhost", "root", "46840711", "libreria_kisomi");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$idCarrito = $_POST['IDCarrito'];

// Eliminar el producto del carrito
$deleteQuery = $conexion->prepare("DELETE FROM carrito WHERE IDCarrito = ?");
$deleteQuery->bind_param("i", $idCarrito);

if ($deleteQuery->execute()) {
    echo "Producto eliminado del carrito.";
} else {
    echo "Error al eliminar el producto del carrito.";
}

$conexion->close();
?>
