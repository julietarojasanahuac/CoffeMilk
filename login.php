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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.php">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.php">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacto.php">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
          <?php
          if (isset($_SESSION['nombre_usuario'])) {
          echo '<span><i class="fa fa-user" aria-hidden="true"></i>' . $_SESSION['nombre_usuario'] . '</span>';
          echo '<a href="carrito.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>';
          } else {
          echo '<a href="login.php"><i class="fa fa-user" aria-hidden="true"></i><span>Login</span></a>';
          }
          ?>
              <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
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
          border-radius: 25px;
          ">
      <div class="card-body py-5 px-md-5">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Haz login ahora</h2>
            <form action="" method="POST">
              <?php 
              include ("sesion.php");
              ?>

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

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>
</html>