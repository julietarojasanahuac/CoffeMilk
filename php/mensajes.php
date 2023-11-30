<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>      
    
    <title>Mostrar información</title>
</head>

<body>
    <div class="container">
        <h1 style="
            color: rgb(50, 179, 234);
            text-align: center;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 50px">Mostrar información</h1>

        <?php
        $con = mysqli_connect("localhost", "root", "", "coffeeshop");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con, "SELECT * FROM contacto;");
        echo '<table class="table table-striped table-hover">';
        echo '<thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Número</th>
            <th>Mensaje</th>
            </tr>
            </thead>
            <tbody>';

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["numero"] . "</td>";
            echo "<td>" . $row["mensaje"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";

        mysqli_close($con);
        ?>
    </div>

    <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="../js/custom.js"></script>
  
</body>
</html>
