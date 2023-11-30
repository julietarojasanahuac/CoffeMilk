<?php
session_start();

// Conectar a la base de datos (asegúrate de incluir tus credenciales de conexión)
$con = mysqli_connect("localhost", "root", "", "coffeeshop");

// Verificar la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

// Obtener todos los registros de la tabla de contacto de la base de datos
$sqlContacto = "SELECT * FROM contacto";
$resultContacto = $con->query($sqlContacto);
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="images/icon-cookie.png" type="image/x-icon">
      
        <title>
          Contacto
        </title>
      
        <!-- slider stylesheet -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
      
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="css/responsive.css" rel="stylesheet" />
      </head>
<body>
<div class="hero_area">
        <!-- header section starts -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.php">
                    <span>Coffee Admin</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                        <a class="nav-link" href="admin.php">Inicio 
                        <li class="nav-item">
                        <a class="nav-link" href="tabla_productos.php">
                            Productos
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="tabla_usuarios.php">
                            Usuarios
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="tabla_historial_compras.php">
                            Historial de compras
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="tabla_carrito_compras.php">Carrito de compras</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="tabla_contacto.php">Contacto<span class="sr-only">(current)</span></a>
                        </li></a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <?php
                            if (isset($_SESSION['username'])) {
                            echo '<div class="user_option">';
                            echo '<span>Bienvenido, ' . $_SESSION['username'] . '</span>';
                            echo '<a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Mi Perfil</a>'; // Enlace a la página de perfil
                            echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a>'; // Enlace para cerrar sesión
                            echo '<a href="carrito.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>'; // Icono de la bolsa de compras
                            echo '</div>';
                            }     else {
                        // Si no está autenticado, muestra el enlace de inicio de sesión
                            echo '<div class="user_option">';
                            echo '<a href="login.php">';
                            echo '<i class="fa fa-user" aria-hidden="true"></i>';
                            echo '<span>Login</span>';
                            echo '</a>';
                        // El siguiente código solo se mostrará si el usuario no está logueado
                            echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </nav>
        </header>
        <!-- end header section -->
</div>

    <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
        Tabla de Contacto
        </h2>
      </div>


        <?php
        // Mostrar la tabla de contacto
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="text-align: center;">ID</th>';
        echo '<th style="text-align: center;">Nombre</th>';
        echo '<th style="text-align: center;">Email</th>';
        echo '<th style="text-align: center;">Mensaje</th>';
        // Agregar columnas adicionales según sea necesario
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Mostrar los registros de la tabla de contacto en la tabla
        while ($row = $resultContacto->fetch_assoc()) {
            echo '<tr>';
            echo '<td style="text-align: center;">' . $row["ID"] . '</td>';
            echo '<td style="text-align: center;">' . $row["nombre"] . '</td>';
            echo '<td style="text-align: center;">' . $row["email"] . '</td>';
            echo '<td style="text-align: center;">' . $row["mensaje"] . '</td>';
            // Agregar columnas adicionales según sea necesario
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        ?>

        <!-- Puedes agregar formularios y lógica adicional según sea necesario -->

    </div>

    </section>

    <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>
</html>

<?php
// Cierra la conexión a la base de datos al finalizar la página
$con->close();
?>
