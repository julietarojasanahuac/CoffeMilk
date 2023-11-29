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
        // Inicio de sesión exitoso, guarda el nombre de usuario en la sesión
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['nombre_usuario'];
        
        // Redirige a la página principal
        header("Location: index.php");
        exit();
    } else {
        // Credenciales incorrectas, puedes mostrar un mensaje de error si lo deseas
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }

    // Cierra la conexión a la base de datos
    $con->close();
}
?>

