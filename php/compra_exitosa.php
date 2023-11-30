<!DOCTYPE html>
<html lang="en">
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
          Coffee Milk
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
         <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="../index.php">
          <span>
            Coffee Milk
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">
                Productos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.php">
                Por qué nosotros
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.php">
                Testimonios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacto.php">Contáctanos</a>
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

    <!-- Contenido de la página -->
    <section class="compra-done">
      <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>¡Compra Exitosa!</h2>
                <p>Gracias por tu compra. Tu pedido ha sido procesado con éxito.</p>
                <p>Recibirás un correo electrónico de confirmación con los detalles de tu compra.</p>
                <a href="../index.php" class="btn btn-primary">Volver a la página principal</a>
            </div>
        </div>
    </div>
  </section>
    <!-- Resto de tu código HTML -->

  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="../js/custom.js"></script>

</body>
</html>
