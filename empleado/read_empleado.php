<?php
include '../db.php';

$sql = "SELECT * FROM empleado";
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
    <title>Lista de Empleados</title>
</head>
<body>
    <h1>Lista de Empleados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>CC</th>
            <th>Nombres</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>User</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['IdEmpleado'] . "</td>";
                echo "<td>" . $row['CC'] . "</td>";
                echo "<td>" . $row['Nombres'] . "</td>";
                echo "<td>" . $row['Telefono'] . "</td>";
                echo "<td>" . $row['Estado'] . "</td>";
                echo "<td>" . $row['User'] . "</td>";
                echo "<td>";
                echo "<a href='update_empleado.php?IdEmpleado=" . $row['IdEmpleado'] . "'>Actualizar</a> ";
                echo "<a href='delete_empleado.php?IdEmpleado=" . $row['IdEmpleado'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay empleados</td></tr>";
        }
        ?>
    </table>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
