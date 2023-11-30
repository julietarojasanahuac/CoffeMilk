<?php
session_start();
?>

<!DOCTYPE html>
<html>

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
    Coffe Milk
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
            <li class="nav-item ">
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
            <li class="nav-item active">
              <a class="nav-link" href="testimonial.php">Testimonios<span class="sr-only">(current)</span></a>
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
  </div>
  <!-- end hero area -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonios
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Fabiola García
                  </h5>
                  <h6>
                    Cliente frecuente
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                "¡La Cafetería Coffee Milk es mi lugar favorito para consentirme! Sus galletas y brownies son simplemente deliciosos, 
                con una textura y sabor que me transportan a otro mundo. Además, los cafés tienen ese toque especial que los hace únicos, 
                y las malteadas son una verdadera indulgencia. Siempre encuentro la combinación perfecta para satisfacer mi antojo dulce y 
                mi amor por el buen café. ¡Definitivamente, una experiencia deliciosa que recomendaré a todos mis amigos!"

              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Sofía Montes
                  </h5>
                  <h6>
                    Nuevo cliente
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                "Descubrí la Cafetería Coffee Milk hace unos meses, y desde entonces se ha convertido en mi refugio personal. 
                Las galletas y brownies son irresistibles, con una mezcla de sabores que nunca decepciona. Pero lo que realmente me conquistó fueron las malteadas; 
                ¡son como un sueño hecho realidad en cada sorbo! Este lugar ha elevado mis estándares para las cafeterías, y 
                no puedo dejar de recomendarlo a todos mis conocidos."</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Mario Ortiz
                  </h5>
                  <h6>
                    Cliente frecuente
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>No hay lugar como la Cafetería Coffee Milk. Soy un amante del buen café, y este lugar ha superado todas mis expectativas. 
                Cada taza es una obra maestra, y su selección de galletas y brownies es excepcional. Me encanta la atención al detalle que
                ponen en cada producto. Además, las malteadas son la opción perfecta para esos días en los que quiero algo más refrescante. 
                ¡Una parada obligatoria para cualquier amante de los sabores auténticos y la calidad inigualable!"</p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

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
              <h6>
                Newsletter
              </h6>
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