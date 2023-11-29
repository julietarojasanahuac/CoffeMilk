<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$con=mysqli_connect("localhost","root","","coffeeshop");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Get form data
$nombre_usuario = mysqli_real_escape_string($con, $_POST["nombre"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$contraseña = mysqli_real_escape_string($con, $_POST["contraseña"]);
$fecha_nacimiento = mysqli_real_escape_string($con, $_POST["fecha_nacimiento"]);
$numero_tarjeta = mysqli_real_escape_string($con, $_POST["numero_tarjeta"]);
$codigo_postal = mysqli_real_escape_string($con, $_POST["codigo_postal"]);

// Insert data into the database
$sql = "INSERT INTO usuarios (nombre_usuario, email, contraseña, fecha_nacimiento, numero_tarjeta, codigo_postal) 
        VALUES ('$nombre_usuario', '$email', '$contraseña', '$fecha_nacimiento', '$numero_tarjeta', '$codigo_postal')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}else{
    echo "<script>alert('Te has registrado correctamente')</script>";
    session_start();
    $_SESSION['nombre_usuario'] = $nombre_usuario;
    header("location:index.php");
}
mysqli_close($con);
?>