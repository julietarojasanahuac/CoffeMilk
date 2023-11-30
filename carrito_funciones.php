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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_producto']) && isset($_POST['operacion'])) {
    $id_producto = $_POST['id_producto'];
    $operacion = $_POST['operacion'];

    // Llama a la función para cambiar la cantidad
    cambiarCantidadEnCarrito($id_producto, $operacion);

    // Redirige de vuelta al carrito
    header("Location: carrito.php");
    exit();
}

// Función para actualizar la cantidad de un producto en el carrito
function cambiarCantidadEnCarrito($idProducto, $operacion) {
    // Verifica si el producto está en el carrito
    if (isset($_SESSION['carrito'][$idProducto])) {
        $cantidadActual = $_SESSION['carrito'][$idProducto]['cantidad'];

        // Actualiza la cantidad según la operación
        if ($operacion === 'incrementar') {
            $_SESSION['carrito'][$idProducto]['cantidad'] = $cantidadActual + 1;
        } elseif ($operacion === 'decrementar' && $cantidadActual > 0) {
            $_SESSION['carrito'][$idProducto]['cantidad'] = $cantidadActual - 1;
        }

        // Mensaje de éxito (puedes quitar esto si no lo necesitas)
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

function mostrarCarrito($carrito) {
    echo '<table class="table">
            <thead>
              <tr>
                <th scope="col" class="border-0 bg-light">
                  <div class="p-2 px-3 text-uppercase">Producto</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="p-2 px-3 text-uppercase">Nombre</div>
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
        // Verifica si $producto es un array antes de intentar acceder a sus elementos
        if (is_array($producto)) {
            // Asegúrate de que $producto['fotos'] sea una cadena antes de imprimir
            $imagen = isset($producto['fotos']) ? $producto['fotos'] : '';

            echo '
                <tr>
                    <td class="border-0">
                        <img src="' . $imagen . '" alt="" width="70" class="img-fluid rounded shadow-sm">
                    </td>
                    <td class="border-0">
                        <div class="ml-3">
                            <h5 class="mb-0">
                                <a href="#" class="text-dark">' . $producto['nombre'] . '</a>
                            </h5>
                            <span class="text-muted font-weight-normal font-italic d-block">
                                Category: ' . $producto['fabricante'] . '
                            </span>
                        </div>
                    </td>
                    <td class="border-0 align-middle">
                        <strong>$' . $producto['precio'] . '</strong>
                    </td>
                    <td class="border-0 align-middle">
                        <div class="d-flex align-items-center">
                            <!-- Formulario para cambiar la cantidad del producto -->
                            <form action="carrito.php" method="POST" class="mr-2">
                                <input type="hidden" name="id_producto" value="' . $producto['ID_producto'] . '">
                                <input type="hidden" name="operacion" value="decrementar">
                                <button type="submit" class="text-dark" style="border: none; background-color: transparent;">
                                    <i class="fa fa-arrow-down"></i>
                                </button>
                            </form>

                            <!-- Cantidad actual -->
                            <span class="mr-2">' . $producto['cantidad'] . '</span>

                            <!-- Formulario para cambiar la cantidad del producto -->
                            <form action="carrito.php" method="POST">
                                <input type="hidden" name="id_producto" value="' . $producto['ID_producto'] . '">
                                <input type="hidden" name="operacion" value="incrementar">
                                <button type="submit" class="text-dark" style="border: none; background-color: transparent;">
                                    <i class="fa fa-arrow-up"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td class="border-0">
                        <form action="eliminar_producto.php" method="GET">
                            <input type="hidden" name="id" value="' . $producto['ID_producto'] . '">
                            <button type="submit" class="text-dark" style="border: none; background-color: transparent;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>';
        }
    }

    echo '</tbody></table>';
}

function calcularMontoFinal($carrito) {
    // Lógica para calcular el monto final del pedido
    $monto_final = 0;

    foreach ($carrito as $producto) {
        // Asegúrate de que $producto['precio'] y $producto['cantidad'] estén definidos
        if (isset($producto['precio']) && isset($producto['cantidad'])) {
            $monto_final += $producto['precio'] * $producto['cantidad'];
        }
    }

    return $monto_final;
}

// Función para mostrar el formulario de tarjeta de crédito
function mostrarFormularioTarjeta() {
    echo '
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Ingresa tu número de tarjeta</div>
        <form method="post" action="checkout.php" id="formularioTarjeta">
            <div class="p-4">
                <!-- Agrega el contenedor de mensajes -->
                <div id="mensaje_validacion" class="mb-3"></div>

                <p class="font-italic mb-4">Para finalizar tu pedido verificaremos tu número de tarjeta proporcionado anteriormente para realizar el pago.</p>
                <div class="input-group mb-4 border rounded-pill p-2">
                    <input type="text" name="numero_tarjeta" placeholder="Ingresa tu tarjeta" aria-describedby="button-addon3" class="form-control border-0" required>
                    <div class="input-group-append border-0">
                        <!-- Modifica el tipo de botón y agrega el evento onclick para llamar a la función de validación -->
                        <button type="button" class="btn btn-dark px-4 rounded-pill" onclick="validarTarjeta()">Verifica tu tarjeta</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instrucciones para el vendedor</div>
        <div class="p-4">
            <p class="font-italic mb-4">Si tienes comentarios adicionales para el tu pedido, puedes dejarlos a continuación</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
        </div>

        <!-- Agrega el script JavaScript al final de la página o en la sección head -->
        <script>
            function validarTarjeta() {
                // Lógica de validación de tarjeta con JavaScript
                var numeroTarjeta = document.getElementsByName("numero_tarjeta")[0].value;
                var mensaje = document.getElementById("mensaje_validacion");

                // Ejemplo de lógica de validación (para un varchar(16))
                if (numeroTarjeta.length === 16 && !isNaN(numeroTarjeta)) {
                    mensaje.innerHTML = "Tarjeta válida. Puedes proceder al pago.";
                    mensaje.style.color = "green";
                    document.getElementById("proceder_pago_btn").disabled = false;
                } else {
                    mensaje.innerHTML = "Número de tarjeta incorrecto. Verifícalo e intenta de nuevo.";
                    mensaje.style.color = "red";
                    document.getElementById("proceder_pago_btn").disabled = true;
                }
            }
        </script>';
}


// Función para mostrar el resumen de compra
function mostrarResumenCompra($monto_final) {
    echo '
    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen de compra</div>
    <ul class="list-unstyled">
        <li class="d-flex justify-content-between py-2 border-bottom">
            <span class="text-muted">Subtotal del pedido</span>
            <span>$' . number_format($monto_final, 2) . '</span>
        </li>
        <li class="d-flex justify-content-between py-2 border-bottom">
            <span class="text-muted">Total del pedido</span>
            <span>$' . number_format($monto_final, 2) . '</span>
        </li>
    </ul>

    <button id="proceder_pago_btn" class="btn btn-dark rounded-pill btn-block mt-3" disabled>Proceder al pago</button>

    <script>
        // Manejador de clic para el botón de proceder al pago
        document.getElementById("proceder_pago_btn").addEventListener("click", function() {
            // Realiza la acción en completar_compra.php (puedes incluir el código PHP directamente aquí)
            
            // Después de ejecutar la acción, redirige a compra_exitosa.php
            window.location.href = "compra_exitosa.php";
        });
    </script>
    ';
}

?>


