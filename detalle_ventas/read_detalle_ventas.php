<?php
include '../db.php';

$sql = "SELECT * FROM detalle_ventas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Fluid viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.fluid.classless.min.css"
/>
    <title>Lista de Detalles de Ventas</title>
</head>
<body>
    <h1>Lista de Detalles de Ventas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>IdVentas</th>
            <th>IdProducto</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['IdDetalleVentas'] . "</td>";
                echo "<td>" . $row['IdVentas'] . "</td>";
                echo "<td>" . $row['IdProducto'] . "</td>";
                echo "<td>" . $row['Cantidad'] . "</td>";
                echo "<td>" . $row['PrecioVenta'] . "</td>";
                echo "<td>";
                echo "<a href='update_detalle_ventas.php?IdDetalleVentas=" . $row['IdDetalleVentas'] . "'>Actualizar</a> ";
                echo "<a href='delete_detalle_ventas.php?IdDetalleVentas=" . $row['IdDetalleVentas'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay detalles de ventas</td></tr>";
        }
        ?>
    </table>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
