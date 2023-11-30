<?php
session_start();
?>

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
        <link rel="shortcut icon" href="images/icon-cookie.png" type="image/x-icon">
      
        <title>
          Coffee Milk
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
     <!-- header section strats -->
     <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            Coffee Milk
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio</a>
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
                  echo '<span class="sr-only">(current)</span></a>';
              // El siguiente código solo se mostrará si el usuario no está logueado
                  echo '</div>';
                }
            ?>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    
   <!-- Section: Design Block -->
<section class="login_section">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://img.freepik.com/free-photo/gradient-earth-tone-background-soft-vintage-style_53876-125325.jpg?w=1480&t=st=1699482533~exp=1699483133~hmac=456d6ca67aa774ddbf4ee4470beef03cae8db60063eba18073aef691966e5568');
          height: 300px;
        "></div>
    <!-- Background image -->
  
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          border-radius: 25px;">
      <div class="card-body py-5 px-md-5">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Haz login ahora</h2>
            <form action="" method="POST">
              <?php 
              include ("sesion.php");?>

              <!-- Name input -->
              <div class="form-outline mb-4">
              <input type="text" id="nombre_usuario_or_email" name="nombre_usuario_or_email" class="form-control" required />
              <label class="form-label" for="nombre_usuario_or_email">Nombre de usuario o email</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
              <input type="text" id="contraseña" name="password" class="form-control" required oninput="mostrarContraseña()" onblur="ocultarContraseña()" />
              <label class="form-label" for="contraseña">Contraseña</label>
              </div>

              <script>
              function mostrarContraseña() {
              document.getElementById('contraseña').type = 'text';
              }

              function ocultarContraseña() {
              document.getElementById('contraseña').type = 'password';
              }
              </script>

              <!-- Submit button -->
              <button type="submit" name="btningresar" class="btn btn-primary btn-block mb-4">
              Log in
              </button>

              <!-- Register button -->
              <div class="text-center">
              <p>¿No tienes una cuenta?</p>
              <button type="button" class="btn btn-light btn-float">
              <a href="register.php">Regístrate aquí</a>
              </button>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

  <!-- info section -->
  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              Sobre nosotros
            </h6>
            <p>
            Descubre nuestra historia de pasión por la calidad y servicio al cliente. Somos tu destino confiable para productos excepcionales.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Ingresa tu email">
                <button>
                  Subscríbete
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Ayuda
            </h6>
            <p>
            ¿Necesitas asistencia? Estamos aquí para hacer tu experiencia de compra sin complicaciones. 
            Tu satisfacción es nuestra prioridad.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Contáctanos
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Champ de Mars, 5 Av. Anatole France, 75007 Paris, France.</span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+52 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> coffemilk@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved by
          <a href="https://html.design/">Coffeemilk</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->
  </section>
  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>