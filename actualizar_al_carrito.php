<?php
session_start();
$conexion = new mysqli("localhost", "root", "46840711", "libreria_kisomi");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$idCarrito = $_POST['IDCarrito'];
$cantidad = $_POST['Cantidad'];

// Obtener el precio unitario para calcular el nuevo subtotal
$queryPrecio = $conexion->prepare("
    SELECT p.Precio FROM carrito c 
    INNER JOIN producto p ON c.IDProducto = p.IDProducto 
    WHERE c.IDCarrito = ?
");
$queryPrecio->bind_param("i", $idCarrito);
$queryPrecio->execute();
$resultado = $queryPrecio->get_result();
$producto = $resultado->fetch_assoc();

if ($producto) {
    $nuevoSubtotal = $producto['Precio'] * $cantidad;

    // Actualizar la cantidad y el subtotal en el carrito
    $updateQuery = $conexion->prepare("UPDATE carrito SET Cantidad = ?, SubTotal = ? WHERE IDCarrito = ?");
    $updateQuery->bind_param("idi", $cantidad, $nuevoSubtotal, $idCarrito);

    if ($updateQuery->execute()) {
        echo "Cantidad actualizada correctamente.";
    } else {
        echo "Error al actualizar el carrito.";
    }
} else {
    echo "Producto no encontrado en el carrito.";
}

$conexion->close();
?>
