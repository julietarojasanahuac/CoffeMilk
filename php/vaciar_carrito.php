<?php
session_start();

if (isset($_SESSION['carrito'])) {
    unset($_SESSION['carrito']);
    echo "Carrito vaciado correctamente.";
} else {
    echo "No hay productos en el carrito.";
}
?>
