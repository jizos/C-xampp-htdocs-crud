<?php
include '../db.php';

$sql = "SELECT * FROM cliente";
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
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>CC</th>
            <th>Nombres</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['IdCliente'] . "</td>";
                echo "<td>" . $row['CC'] . "</td>";
                echo "<td>" . $row['Nombres'] . "</td>";
                echo "<td>" . $row['Direccion'] . "</td>";
                echo "<td>" . $row['Estado'] . "</td>";
                echo "<td>";
                echo "<a href='update_cliente.php?IdCliente=" . $row['IdCliente'] . "'>Actualizar</a> ";
                echo "<a href='delete_cliente.php?IdCliente=" . $row['IdCliente'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay clientes</td></tr>";
        }
        ?>
    </table>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
