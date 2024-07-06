<?php
include '../db.php';

$sql = "SELECT * FROM producto";
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
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['IdProducto'] . "</td>";
                echo "<td>" . $row['Nombres'] . "</td>";
                echo "<td>" . $row['Precio'] . "</td>";
                echo "<td>" . $row['Stock'] . "</td>";
                echo "<td>" . $row['Estado'] . "</td>";
                echo "<td>";
                echo "<a href='update_producto.php?IdProducto=" . $row['IdProducto'] . "'>Actualizar</a> ";
                echo "<a href='delete_producto.php?IdProducto=" . $row['IdProducto'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay productos</td></tr>";
        }
        ?>
    </table>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
