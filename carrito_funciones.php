<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

// Función para agregar un producto al carrito
function agregarProductoAlCarrito($id_producto) {
    if (!isset($_SESSION['carrito'][$id_producto])) {
        // Añade el producto al carrito
        $_SESSION['carrito'][$id_producto] = obtenerDetallesProducto($id_producto);
        echo "Producto añadido al carrito.";
    } else {
        echo "El producto ya está en el carrito.";
    }
}

// Función para obtener detalles de un producto
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_producto']) && isset($_GET['operacion'])) {
    $id_producto = $_GET['id_producto'];
    $operacion = $_GET['operacion'];

    // Llama a la función para cambiar la cantidad
    cambiarCantidadEnCarrito($id_producto, $operacion);

    // Redirige de vuelta al carrito
    header("Location: carrito.php");
    exit();
} else {
    echo "Error: ID de producto o operación no proporcionados.";
}

// Función para actualizar la cantidad de un producto en el carrito
function cambiarCantidadEnCarrito($idProducto, $operacion) {
    session_start();

    if (isset($_SESSION['carrito'][$idProducto])) {
        $cantidadActual = $_SESSION['carrito'][$idProducto]['cantidad'];

        if ($operacion === 'incrementar') {
            $_SESSION['carrito'][$idProducto]['cantidad'] = $cantidadActual + 1;
        } elseif ($operacion === 'decrementar' && $cantidadActual > 0) {
            $_SESSION['carrito'][$idProducto]['cantidad'] = $cantidadActual - 1;
        }

        echo "Cantidad actualizada.";
    } else {
        echo "Error: Producto no encontrado en el carrito.";
    }
}


function eliminarProductoDelCarrito($id_producto) {
    // Lógica para eliminar el producto con $id_producto del carrito
    if (isset($_SESSION['carrito'][$id_producto])) {
        unset($_SESSION['carrito'][$id_producto]);
        echo "Producto eliminado del carrito.";
    } else {
        echo "El producto no está en el carrito.";
    }
}

// Función para mostrar el contenido del carrito
function mostrarCarrito($carrito) {
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

        // Verifica si $producto es un array antes de intentar acceder a sus elementos
        if (is_array($producto)) {
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
                    <td class="border-0 align-middle">
                        <strong>$' . $producto['precio'] . '</strong>
                    </td>
                    <td class="border-0 align-middle">
                        <div class="d-flex">
                        <!-- Formulario para cambiar la cantidad del producto -->
                        <!-- Formulario para cambiar la cantidad del producto -->
<form action="carrito.php" method="GET">
    <input type="hidden" name="id_producto" value="<?php echo $producto['ID_producto']; ?>">
    <input type="hidden" name="operacion" value="incrementar">
    <button type="submit" class="text-dark" style="border: none; background-color: transparent;">
        <i class="fa fa-arrow-up"></i>
    </button>
</form>

<!-- Cantidad actual (solo lectura) -->
<span style="width: 30px; text-align: center;"><?php echo $producto['cantidad']; ?></span>

<!-- Formulario para cambiar la cantidad del producto (decrementar) -->
<form action="carrito.php" method="GET">
    <input type="hidden" name="id_producto" value="<?php echo $producto['ID_producto']; ?>">
    <input type="hidden" name="operacion" value="decrementar">
    <button type="submit" class="text-dark" style="border: none; background-color: transparent;">
        <i class="fa fa-arrow-down"></i>
    </button>
</form>

                        </div>
                    </td>
                    <td class="border-0 align-middle"><a href="eliminar_producto.php?id=' . $producto['ID_producto'] . '" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>';
        } else {
            // Manejar el caso en que $producto no es un array
            echo '<p>Error: Producto no válido en el carrito.</p>';
        }
    }

    echo '</tbody></table>';
}

?>
