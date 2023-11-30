<?php
session_start();

// Verifica si la compra está siendo completada
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    // Obtén la información necesaria
    $usuario_ID = $_SESSION['ID_usuario']; // Asegúrate de tener esta información en tu sesión

    // Itera sobre los productos en el carrito y almacena la compra en el historial
    foreach ($_SESSION['carrito'] as $producto) {
        $producto_ID = $producto['ID_producto'];

        // Guarda la información de la compra en tu base de datos
        $con = mysqli_connect("localhost", "root", "", "coffeeshop");

        // Verifica la conexión exitosa
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Realiza la inserción en la base de datos
        $sql = "INSERT INTO historial_compras (usuario_ID, producto_ID) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $usuario_ID, $producto_ID);

        if (mysqli_stmt_execute($stmt)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        // Actualiza la existencia del producto en la base de datos (por ejemplo, resta 1)
        $sqlUpdate = "UPDATE productos SET cantidad = cantidad - 1 WHERE ID_producto = ?";
        $stmtUpdate = mysqli_prepare($con, $sqlUpdate);
        mysqli_stmt_bind_param($stmtUpdate, "i", $producto_ID);

        if (mysqli_stmt_execute($stmtUpdate)) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($con);
        }

        // Cierra la conexión y el statement
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmtUpdate);
        mysqli_close($con);
    }

    // Limpia el carrito después de completar la compra
    unset($_SESSION['carrito']);

    // Limpia el monto final de la sesión
    unset($_SESSION['monto_final']);

    // Redirige a la página de compra exitosa
    header('Location: compra_exitosa.php');
    exit();
} else {
    // Si el carrito está vacío, redirige al usuario a otra página
    header('Location: products.php');
    exit();
}
?>
