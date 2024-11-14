<?php
session_start();
$conexion = new mysqli("localhost", "root", "46840711", "libreria_kisomi");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$idProducto = $_POST['IDProducto'];
$cantidad = $_POST['Cantidad'];

$queryProducto = $conexion->prepare("SELECT Precio FROM producto WHERE IDProducto = ?");
$queryProducto->bind_param("i", $idProducto);
$queryProducto->execute();
$resultado = $queryProducto->get_result();
$producto = $resultado->fetch_assoc();

if ($producto) {
    $precio = $producto['Precio'];
    $subtotal = $precio * $cantidad;

    $insertQuery = $conexion->prepare("
        INSERT INTO carrito (Estado, IDProducto, Cantidad, SubTotal, Total) 
        VALUES ('Activo', ?, ?, ?, ?)
    ");
    $total = $subtotal;
    $insertQuery->bind_param("iidd", $idProducto, $cantidad, $subtotal, $total);

    if ($insertQuery->execute()) {
        // Obtener la cantidad total de productos en el carrito
        $queryTotal = "SELECT SUM(Cantidad) AS cartCount FROM carrito WHERE Estado = 'Activo'";
        $resultTotal = $conexion->query($queryTotal);
        $cartCount = $resultTotal->fetch_assoc()['cartCount'];

        echo json_encode(["success" => true, "cartCount" => $cartCount]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}

$conexion->close();
?>

