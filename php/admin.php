<?php
session_start();
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
        <link rel="shortcut icon" href="../images/icon-cookie.png" type="image/x-icon">
      
        <title>
          Coffee Milk Admin
        </title>
      
        <!-- slider stylesheet -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
      
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
      
        <!-- Custom styles for this template -->
        <link href="../css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="../css/responsive.css" rel="stylesheet" />
      </head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="admin.php">
                    <span>Coffee Admin</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
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
                        <li class="nav-item">
                        <a class="nav-link" href="tabla_contacto.php">Contacto</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <?php
                            if (isset($_SESSION['username'])) {
                            echo '<div class="user_option">';
                            echo '<span>Bienvenido, ' . $_SESSION['username'] . '</span>';
                            echo '<a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Mi Perfil</a>'; // Enlace a la página de perfil
                            echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a>'; // Enlace para cerrar sesión
                            // Icono de la bolsa de compras
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


<!-- slider section -->
<section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        Administra <br>
                        tu tienda
                      </h1>
                      <p>
                      ¡Bienvenido al panel de administración de tu tienda en línea! 
                      Aquí, puedes tener el control total de tu negocio digital. 
                      Desde la gestión de productos hasta el historial de pedidos, 
                      nuestro intuitivo sistema te permite supervisar y optimizar cada aspecto de tu tienda.
                      </p>
                      <a href="">
                        Comienza ahora
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img src="../images/cheff.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div> 
</section>

</div>
<script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="../js/custom.js"></script>

</body>
</html>