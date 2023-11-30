<?php
session_start();

// Variable para almacenar la tabla a mostrar
$tablaAMostrar = '';

// Verificar si se ha hecho clic en algún enlace del menú
if (isset($_GET['tabla'])) {
    $tablaElegida = $_GET['tabla'];
    
    // Según el enlace del menú, redirige a la página correspondiente
    switch ($tablaElegida) {
        case 'productos':
            header("Location: tabla_productos.php");
            exit();
        case 'usuarios':
            header("Location: tabla_usuarios.php");
        case 'historial':
            header("Location: tabla_historial_compras.php");
        case 'carrito':
            header("Location: tabla_carrito_compras.php");
        case 'contacto':
            header("Location: tabla_contacto.php");    
            exit();
        // Agrega más casos según sea necesario
    }
}


// Verificar si el usuario está autenticado como administrador
$isAdmin = (isset($_SESSION["username"]) && $_SESSION["username"] == "admin");

// Incluir funciones para evitar la inyección de SQL
function validarDatos($con, $datos) {
    $datos = mysqli_real_escape_string($con, $datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// Conectar a la base de datos (asegúrate de incluir tus credenciales de conexión)
$con = mysqli_connect("localhost", "root", "", "coffeeshop");

// Verificar la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

// Lógica para editar un producto
if (isset($_POST['editar'])) {
    $idProductoEditar = validarDatos($con, $_POST['id_producto']);
    $nuevoNombre = validarDatos($con, $_POST['nuevo_nombre']);
    $nuevaDescripcion = validarDatos($con, $_POST['nueva_descripcion']);

    // Agrega lógica para actualizar los datos en la base de datos
    $sqlEditar = "UPDATE productos SET nombre = '$nuevoNombre', descripcion = '$nuevaDescripcion' WHERE ID_Producto = $idProductoEditar";
    $con->query($sqlEditar);
}

// Lógica para agregar un nuevo producto
if (isset($_POST['agregar'])) {
    $nuevoNombre = validarDatos($con, $_POST['nuevo_nombre']);
    $nuevaDescripcion = validarDatos($con, $_POST['nueva_descripcion']);

    // Agrega lógica para insertar un nuevo producto en la base de datos
    $sqlAgregar = "INSERT INTO productos (nombre, descripcion) VALUES ('$nuevoNombre', '$nuevaDescripcion')";
    $con->query($sqlAgregar);
}

// Lógica para borrar un producto
if (isset($_POST['borrar'])) {
    $idProductoBorrar = validarDatos($con, $_POST['id_producto_borrar']);

    // Agrega lógica para borrar el producto de la base de datos
    $sqlBorrar = "DELETE FROM productos WHERE ID_Producto = $idProductoBorrar";
    $con->query($sqlBorrar);
}

// Obtener todos los productos de la base de datos
$sqlProductos = "SELECT * FROM productos";
$resultProductos = $con->query($sqlProductos);
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
          Productos
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
                    <ul class="navbar-nav  ">
                        <li class="nav-item ">
                        <a class="nav-link" href="admin.php">Inicio </a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="tabla_productos.php">
                            Productos
                            <span class="sr-only">(current)</span></a>
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
        Tabla de Productos
        </h2>
      </div>
        

        <?php
        // Mostrar la tabla de productos
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="text-align: center;">ID Producto</th>';
        echo '<th style="text-align: center;">Foto</th>';
        echo '<th style="text-align: center;">Nombre</th>';
        echo '<th style="text-align: center;">Descripción</th>';
        echo '<th style="text-align: center;">Precio</th>';
        echo '<th style="text-align: center;">Cantidad</th>';
        echo '<th style="text-align: center;">Fabricante</th>';
        echo '<th style="text-align: center;">Origen</th>';
        echo '<th style="text-align: center;">Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Mostrar los productos en la tabla
        while ($row = $resultProductos->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["ID_producto"] . '</td>';
            $rutaImagen = $row['fotos'];
            echo '<td style="text-align: center;"><img src="' . $rutaImagen . '" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;"></td>';
            echo '<td style="text-align: center;">' . $row["nombre"] . '</td>';
            echo '<td style="text-align: center;">' . $row["descripcion"] . '</td>';
            echo '<td style="text-align: center;">' . $row["precio"] . '</td>';
            echo '<td style="text-align: center;">' . $row["cantidad"] . '</td>';
            echo '<td style="text-align: center;">' . $row["fabricante"] . '</td>';
            echo '<td style="text-align: center;">' . $row["origen"] . '</td>';
            echo '<td style="text-align: center;">';
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="id_producto" value="' . $row["ID_Producto"] . '">';
            echo '<input type="text" name="nuevo_nombre" placeholder="Nuevo nombre">';
            echo '<input type="text" name="nueva_descripcion" placeholder="Nueva descripción">';
            echo '<button type="submit" name="editar">Editar</button>';
            echo '</form>';
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="id_producto_borrar" value="' . $row["ID_Producto"] . '">';
            echo '<button type="submit" name="borrar">Borrar</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        ?>

        <!-- Formulario para agregar un nuevo producto -->
        <form method="post" action="">
            <input type="text" name="nuevo_nombre" placeholder="Nombre del nuevo producto">
            <input type="text" name="nueva_descripcion" placeholder="Descripción del nuevo producto">
            <button type="submit" name="agregar">Agregar Producto</button>
        </form>
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
