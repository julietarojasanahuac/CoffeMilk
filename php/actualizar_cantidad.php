<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_producto']) && isset($_POST['nueva_cantidad'])) {
    $id_producto = $_POST['id_producto'];
    $nueva_cantidad = $_POST['nueva_cantidad'];

    // Realiza la actualización en el carrito
    if (isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto]['cantidad'] = $nueva_cantidad;
        header("Location: carrito.php");
        exit();
    }
}

// Si no se proporcionaron los datos necesarios, redirige a la página de carrito con un mensaje de error
header("Location: carrito.php?error=1");
exit();
?>
