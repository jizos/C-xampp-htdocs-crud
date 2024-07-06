<?php
include '../db.php';

$sql = "SELECT * FROM ventas";
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
    <title>Lista de Ventas</title>
</head>
<body>
    <h1>Lista de Ventas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>IdCliente</th>
            <th>IdEmpleado</th>
            <th>Fecha</th>
            <th>Total Venta</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['IdVentas'] . "</td>";
                echo "<td>" . $row['IdCliente'] . "</td>";
                echo "<td>" . $row['IdEmpleado'] . "</td>";
                echo "<td>" . $row['Fecha'] . "</td>";
                echo "<td>" . $row['TotalVenta'] . "</td>";
                echo "<td>";
                echo "<a href='update_ventas.php?IdVentas=" . $row['IdVentas'] . "'>Actualizar</a> ";
                echo "<a href='delete_ventas.php?IdVentas=" . $row['IdVentas'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay ventas</td></tr>";
        }
        ?>
    </table>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
