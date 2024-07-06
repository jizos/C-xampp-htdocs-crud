<?php
include 'db.php';

$query = $_GET['query'];
$table = $_GET['table'];

$sql = "";
switch ($table) {
    case "cliente":
        $sql = "SELECT * FROM cliente WHERE CC LIKE '%$query%' OR Nombres LIKE '%$query%' OR Direccion LIKE '%$query%' OR Estado LIKE '%$query%'";
        break;
    case "producto":
        $sql = "SELECT * FROM producto WHERE Nombres LIKE '%$query%' OR Estado LIKE '%$query%'";
        break;
    case "empleado":
        $sql = "SELECT * FROM empleado WHERE CC LIKE '%$query%' OR Nombres LIKE '%$query%' OR Telefono LIKE '%$query%' OR Estado LIKE '%$query%' OR User LIKE '%$query%'";
        break;
    case "ventas":
        $sql = "SELECT * FROM ventas WHERE IdCliente LIKE '%$query%' OR IdEmpleado LIKE '%$query%' OR NumeroSerie LIKE '%$query%' OR Estado LIKE '%$query%'";
        break;
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados de la Búsqueda</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="cliente/create_cliente.php">Crear Cliente</a>
            <a href="cliente/read_cliente.php">Ver Clientes</a>
            <a href="detalle_ventas/create_detalle_ventas.php">Crear Detalle Ventas</a>
            <a href="detalle_ventas/read_detalle_ventas.php">Ver Detalle Ventas</a>
            <a href="empleado/create_empleado.php">Crear Empleado</a>
            <a href="empleado/read_empleado.php">Ver Empleados</a>
            <a href="producto/create_producto.php">Crear Producto</a>
            <a href="producto/read_producto.php">Ver Productos</a>
            <a href="ventas/create_ventas.php">Crear Venta</a>
            <a href="ventas/read_ventas.php">Ver Ventas</a>
        </div>
        <div class="main">
            <h1>Resultados de la Búsqueda en <?php echo ucfirst($table); ?></h1>
            <table>
                <tr>
                    <?php
                    if ($table == "cliente") {
                        echo "<th>ID</th><th>CC</th><th>Nombres</th><th>Dirección</th><th>Estado</th>";
                    } elseif ($table == "producto") {
                        echo "<th>ID</th><th>Nombres</th><th>Precio</th><th>Stock</th><th>Estado</th>";
                    } elseif ($table == "empleado") {
                        echo "<th>ID</th><th>CC</th><th>Nombres</th><th>Teléfono</th><th>Estado</th><th>Usuario</th>";
                    } elseif ($table == "ventas") {
                        echo "<th>ID</th><th>IdCliente</th><th>IdEmpleado</th><th>Número Serie</th><th>Fecha</th><th>Monto</th><th>Estado</th>";
                    }
                    ?>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $col) {
                            echo "<td>" . htmlspecialchars($col) . "</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
                }
                ?>
            </table>
            <div class="button-container">
                <button onclick="location.href='search_index.php'">Volver a la búsqueda</button>
                <button onclick="location.href='index.php'">Volver al inicio</button>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
