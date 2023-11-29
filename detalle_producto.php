<?php
$con = mysqli_connect("localhost", "root", "", "coffeeshop");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Realiza una consulta para obtener los productos
$sql = "SELECT * FROM productos";
$result = mysqli_query($con, $sql);

// Inicializa una variable para almacenar el HTML
$productos_html = '';

// Verifica si hay resultados
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Aquí puedes imprimir o utilizar la información del producto
        $id_producto = $row['ID_producto'];
        $nombre_producto = $row['nombre'];
        $descripcion_producto = $row['descripcion'];
        $foto_producto = $row['fotos'];
        $precio_producto = $row['precio'];
        $cantidad_producto = $row['cantidad'];
        $fabricante_producto = $row['fabricante'];
        $origen_producto = $row['origen'];

        // Construye el HTML para el producto y agrégalo a la variable
        $productos_html .= '<div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#modal' . $id_producto . '">
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

        // Construye el modal para el producto
        $productos_html .= '<div class="modal fade" id="modal' . $id_producto . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">' . $nombre_producto . '</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="' . $foto_producto . '" alt="' . $nombre_producto . '" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <p>' . $descripcion_producto . '</p>
                                <p>Price: $' . $precio_producto . '</p>
                                <p>Quantity: ' . $cantidad_producto . '</p>
                                <p>Manufacturer: ' . $fabricante_producto . '</p>
                                <p>Origin: ' . $origen_producto . '</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="carrito.php?id_producto=' . $id_producto . '" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                </div>
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