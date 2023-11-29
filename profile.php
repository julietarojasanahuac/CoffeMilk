<?php
session_start();

// Verificar si el usuario está autenticado, de lo contrario redirigir a la página de inicio
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Crear la conexión
$con = mysqli_connect("localhost", "root", "", "coffeeshop");

// Verificar la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

// Obtener datos del usuario
$nombreUsuario = $_SESSION['username'];
$sqlUsuario = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombreUsuario'";
$resultUsuario = $con->query($sqlUsuario);

if ($resultUsuario->num_rows > 0) {
    $usuario = $resultUsuario->fetch_assoc();

    // Si se hace clic en el botón de "Editar Perfil"
    if (isset($_POST['btnEditProfile'])) {
        $editMode = true;
    } else {
        $editMode = false;
    }

    // Si se hace clic en el botón de "Guardar Cambios"
    if (isset($_POST['btnSaveChanges'])) {
        $newName = $_POST['new_name'];
        $newEmail = $_POST['new_email'];

        // Actualizar la base de datos
        $sqlUpdate = "UPDATE usuarios SET nombre_usuario = '$newName', email = '$newEmail' WHERE ID_usuario = " . $usuario['ID_usuario'];
        if ($con->query($sqlUpdate) === TRUE) {
            echo "Datos actualizados correctamente.";
            // Recargar la página para mostrar la información actualizada
            header("Location: profile.php");
            exit();
        } else {
            echo "Error al actualizar datos: " . $con->error;
        }
    }
}

// Cerrar la conexión
$con->close();
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
<body class="profile-body">
    <div class="hero_area">
        <!-- header section starts -->
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
          if (isset($_SESSION['username'])) {
            echo '<div class="user_option">';
            echo '<span>Bienvenido, ' . $_SESSION['username'] . '</span>';
            echo '<a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Mi Perfil</a>'; // Enlace a la página de perfil
            echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a>'; // Enlace para cerrar sesión
            echo '</div>';
          } else {
    // Si no está autenticado, muestra el enlace de inicio de sesión
            echo '<div class="user_option">';
            echo '<a href="login.php">';
            echo '<i class="fa fa-user" aria-hidden="true"></i>';
            echo '<span>Login</span>';
            echo '</a>';
            echo '<a href="carrito.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>';
            echo '</div>';
          }
          ?>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

    <section class="profile_section layout_padding">
    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        Perfil del usuario
                                    </h2>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tus datos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Historial de compras</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Navegador</p>
                            <a href="index.php">Inicio</a><br/>
                            <a href="products.php">Productos</a><br/>
                            <a href="whyus.php">Nosotros</a><br/>
                            <a href="testimonial.php">Testimonios</a><br/>
                            <a href="contact.php">Informes</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><?php echo $editMode ? 'Nuevo Nombre' : 'Nombre'; ?></label>
                                    </div>
                                    <div class="col-md-6">
                                    <?php if ($editMode) { ?>
                                        <input type="text" name="new_name" value="<?php echo $usuario['nombre_usuario']; ?>"/>
                                    <?php } else { ?>
                                        <p><?php echo $usuario['nombre_usuario']; ?></p>
                                    <?php } ?>
                                    </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                         <label><?php echo $editMode ? 'Nuevo Email' : 'Email'; ?></label>
                                        </div>
                                        <div class="col-md-6">
                                        <?php if ($editMode) { ?>
                                            <input type="text" name="new_email" value="<?php echo $usuario['email']; ?>"/>
                                        <?php } else { ?>
                                            <p><?php echo $usuario['email']; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?php if (!empty($historialCompra['fecha']) && !empty($historialCompra['producto'])) { ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Fecha</label>
                                            </div>
                                            <div class="col-md-6">
                                            <label>Producto</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><?php echo $historialCompra['fecha']; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $historialCompra['producto']; ?></p>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>No hay historial de compras.</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 ml-auto">
                    <?php if (!$editMode) { ?>
                            <form method="post">
                                <input type="submit" class="profile-edit-btn" name="btnEditProfile" value="Editar perfil"/>
                            </form>
                        <?php } else { ?>
                            <form method="post">
                                <input type="submit" class="profile-edit-btn" name="btnSaveChanges" value="Guardar Cambios"/>
                            </form>
                    <?php } ?>
                    </div>
                </div>
            </form>           
</div>
</section>

                        

            


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
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
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
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
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
