<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once 'carrito_funciones.php';

// Verifica si se proporcionó el ID del producto
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];

    // Agrega el producto al carrito
    agregarProductoAlCarrito($id_producto);
    
    // Redirige a la misma página
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Error: ID de producto no proporcionado.";
}
?>


<!-- ?php
session_start();

include_once 'add_carrito.php';

if (isset($_SESSION['nombre_usuario'])) {
    $usuario_nombre = $_SESSION['nombre_usuario'];
} else {
    $usuario_nombre = '';
}

// Verifica si existe una sesión de carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verifica si se envió el formulario con el ID del producto
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];

    // Verifica si el producto ya está en el carrito
    if (!isset($_SESSION['carrito'][$id_producto])) {
        // Añade el producto al carrito
        $_SESSION['carrito'][$id_producto] = obtenerDetallesProducto($id_producto);
        echo "Producto añadido al carrito.";
    } else {
        echo "El producto ya está en el carrito.";
    }

    // Redirige de vuelta al catálogo
    header("Location: products.php");
    exit();
} else {
    echo "Error: ID de producto no proporcionado.";
}

function obtenerDetallesProducto($id_producto) {
    $con = new mysqli("localhost", "root", "", "coffeeshop");

    if ($con->connect_error) {
        die("Error de conexión a la base de datos: " . $con->connect_error);
    }

    // Consulta para obtener detalles del producto
    $sql = "SELECT * FROM productos WHERE ID_producto = $id_producto";
    $res = $con->query($sql);

    if ($res->num_rows > 0) {
        // Devuelve los detalles del producto como un array asociativo
        return $res->fetch_assoc();
    } else {
        return null;
    }
}

function mostrarCarrito($carrito)
{
    echo '<table class="table">
            <thead>
              <tr>
                <th scope="col" class="border-0 bg-light">
                  <div class="p-2 px-3 text-uppercase">Producto</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Precio</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Cantidad</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Borrar</div>
                </th>
              </tr>
            </thead>
            <tbody>';

    foreach ($carrito as $producto) {
        // Asegúrate de que $producto['fotos'] sea una cadena antes de imprimir
        $imagen = is_array($producto) && isset($producto['fotos']) ? $producto['fotos'] : '';
        
        echo '<tr>
                <th scope="row" class="border-0">
                  <div class="p-2">
                  <img src="' . $imagen . '" alt="" width="70" class="img-fluid rounded shadow-sm">
                    <div class="ml-3 d-inline-block align-middle">
                      <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">' . $producto['nombre'] . '</a></h5>
                      <span class="text-muted font-weight-normal font-italic d-block">Category: ' . $producto['fabricante'] . '</span>
                    </div>
                  </div>
                </th>
                <td class="border-0 align-middle"><strong>$' . $producto['precio'] . '</strong></td>
                <td class="border-0 align-middle"><strong>' . $producto['cantidad'] . '</strong></td>
                <td class="border-0 align-middle"><a href="eliminar_producto.php?id=' . $producto['ID_producto'] . '" class="text-dark"><i class="fa fa-trash"></i></a></td>
              </tr>';
    }

    echo '</tbody>
          </table>';
}
?> -->
