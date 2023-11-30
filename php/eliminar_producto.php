<?php
session_start();
include_once 'carrito_funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Eliminar el producto del carrito
    eliminarProductoDelCarrito($id_producto);

    // Redirige de vuelta al carrito o a donde prefieras
    header("Location: carrito.php");
    exit();
} else {
    echo "Error: ID de producto no proporcionado.";
}
?>
