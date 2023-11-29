<?php

$con = mysqli_connect("localhost", "root", "", "coffeeshop");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Realiza una consulta para obtener los productos
$sql = "SELECT * FROM productos";
$result = mysqli_query($con, $sql);

// Verifica si hay resultados
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Aquí puedes imprimir o utilizar la información del producto
        $id_producto = $row['ID_producto'];
        $nombre_producto = $row['nombre'];
        $descripcion_producto = $row['descripcion'];
        $foto_producto = $row['fotos'];
        $precio_producto = $row['precio'];

        // Construye el HTML para el producto y agrégalo a la variable
        $productos_html .= '<div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                  <a href="#" onclick="mostrarDetalle(' . $id_producto . ')">
                    <div class="img-box">
                      <img src="' . $foto_producto . '" alt="' . $nombre_producto . '">
                    </div>
                    <div class="detail-box">
                      <h6>' . $nombre_producto . '</h6>
                      <h6>Price <span>$' . $precio_producto . '</span></h6>
                    </div>
                  </a>
                </div>
              </div>';
    }
} else {
    $productos_html = "No hay productos disponibles.";
}

// Imprime el HTML fuera del bucle
echo '<div class="row">' . $productos_html . '</div>';

// Cierra la conexión a la base de datos
mysqli_close($con);
?>

<script>
function mostrarDetalle(idProducto) {
    // Incluye el código de detalle_producto.php en el div con el id "detalle-container"
    $("#detalle-container").load("detalle_producto.php?id=" + idProducto);
}
</script>

<div id="detalle-container"></div>
