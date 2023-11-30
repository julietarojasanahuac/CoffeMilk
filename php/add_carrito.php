<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once 'carrito_funciones.php';

// Verifica si se proporcionó el ID del producto
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];

    // Agrega el producto al carrito
    agregarProductoAlCarrito($id_producto);
    
    // Redirige a la misma página
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    //echo "Error: ID de producto no proporcionado.";
}
?>