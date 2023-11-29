<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include_once 'carrito_funciones.php';

// Obtener el monto final del carrito
$monto_final = calcularMontoFinal($_SESSION['carrito']);

// // Verificar si se ha enviado el formulario de tarjeta de crédito
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numero_tarjeta'])) {
//     // Validar la información de la tarjeta (aquí deberías implementar tu propia lógica de validación)

//     // Proceso de pago (aquí deberías llamar a la API de la pasarela de pago)
//     $pago_exitoso = procesarPago($_POST['numero_tarjeta'], $monto_final);

//     if ($pago_exitoso) {
//         // Actualizar el estado de la compra en tu base de datos (aquí deberías implementar tu propia lógica de actualización)
//         actualizarEstadoCompra($_SESSION['id_compra'], 'completada');

//         // Redirigir a la página de confirmación
//         header('Location: compra_exitosa.php');
//         exit();
//     } else {
//         // El pago no fue exitoso, puedes mostrar un mensaje de error o manejarlo según tus necesidades
//         echo 'Error en el pago. Por favor, inténtalo nuevamente.';
//     }
//}

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
            echo '<span>Bienvenido, ' . $_SESSION['username'] . '</span>';
            echo '<div class="user_option">';
            echo '<a href="carrito.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>';
            echo '<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a>'; // Enlace para cerrar sesión
            echo '</div>';
            } else {
            // Si no está autenticado, muestra el enlace de inicio de sesión
            echo '<a href="login.php">';
            echo '<div class="user_option">';
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

        <div class="cart_area">
        <div class="px-4 px-lg-0">
            <div class="pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                            <!-- Shopping cart table -->
                            <?php
                            // Asegúrate de que $_SESSION['carrito'] esté definido antes de llamar a mostrarCarrito
                            if (isset($_SESSION['carrito'])) {
                                mostrarCarrito($_SESSION['carrito']);
                            } else {
                                echo '<p>No hay productos en el carrito.</p>';
                            }
                            ?>
                            <!--Shopping cart table -->
                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-lg">
                    <div class="col-lg-6">
                        <?php
                        // Mostrar el formulario de tarjeta
                        if (!isset($_POST['numero_tarjeta'])) {
                            mostrarFormularioTarjeta();
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?php
                        // Mostrar el resumen de compra
                        mostrarResumenCompra($monto_final);
                        ?>
                    </div>
                </div>

             </div>
        </div>
    </div>
</div>

    <!-- Resto de tu código HTML -->

</body>
</html>




<!-- <php
                            // Muestra el formulario solo si no se ha proporcionado el número de tarjeta
                            if (!isset($_POST['numero_tarjeta'])) {
                            ?>
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Ingresa tu número de tarjeta</div>
                                <form method="post" action="checkout.php">
                                    <div class="p-4">
                                        <p class="font-italic mb-4">Si tienes un código de cupón, ingrésalo en la casilla a continuación</p>
                                        <div class="input-group mb-4 border rounded-pill p-2">
                                            <input type="text" name="numero_tarjeta" placeholder="Ingresa tu número de tarjeta" aria-describedby="button-addon3" class="form-control border-0" required>
                                            <div class="input-group-append border-0">
                                                <button id="button-addon3" type="submit" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-credit-card-alt mr-2"></i>Verifica tu tarjeta</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instrucciones para el vendedor</div>
                                <div class="p-4">
                                    <p class="font-italic mb-4">Si tienes información para el vendedor, puedes dejarla en el cuadro a continuación</p>
                                    <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                            <php } else { // Muestra el resumen de compra solo si se proporciona el número de tarjeta ?>
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen de compra</div>
                                <div class="p-4">
                                    <p class="font-italic mb-4">Los gastos de envío y los costos adicionales se calculan en función de los valores que has ingresado.</p>
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal del pedido</strong><strong>$<?= $monto_final ?></strong></li>
                                        -- Puedes agregar más líneas según tus necesidades 
                                    </ul>
                                    <a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Proceder al pago</a>
                                </div>
                            <php } ?> -->