<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (asegúrate de incluir tus credenciales de conexión)
    $con = mysqli_connect("localhost", "root", "", "coffeeshop");

    // Verificar la conexión
    if ($con->connect_error) {
        die("Conexión fallida: " . $con->connect_error);
    }

    // Obtener los datos del formulario
    $nombreUsuarioOrEmail = $_POST["nombre_usuario_or_email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE (nombre_usuario = '$nombreUsuarioOrEmail' OR email = '$nombreUsuarioOrEmail') AND contraseña = '$password'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso, verifica si el nombre de usuario es 'admin'
        $row = $result->fetch_assoc();
        if ($row['nombre_usuario'] == 'admin') {
            // Es el administrador, guarda el nombre de usuario en la sesión
            $_SESSION['username'] = $row['nombre_usuario'];

            // Redirige a la página del panel de administrador
            header("Location: admin.php");
            exit();
        } else {
            // Es un usuario normal, guarda el nombre de usuario en la sesión
            $_SESSION['username'] = $row['nombre_usuario'];

            // Redirige a la página principal de usuario normal
            header("Location: ../index.php");
            exit();
        }
    } else {
        // Credenciales incorrectas, puedes mostrar un mensaje de error si lo deseas
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }

    // Cierra la conexión a la base de datos
    $con->close();
}
?>

?>

