<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "coffeeshop");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $numero = mysqli_real_escape_string($con, $_POST["numero"]);
    $mensaje = mysqli_real_escape_string($con, $_POST["mensaje"]);

    $sql = "INSERT INTO contacto (nombre, email, numero, mensaje) VALUES ('$nombre', '$email', '$numero', '$mensaje')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
   echo "1 record added";

    mysqli_close($con);
}
?>
