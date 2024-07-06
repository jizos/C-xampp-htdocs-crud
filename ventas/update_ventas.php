<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idVentas = $_POST['IdVentas'];
    $idCliente = $_POST['IdCliente'];
    $idEmpleado = $_POST['IdEmpleado'];
    $fecha = $_POST['Fecha'];
    $totalVenta = $_POST['TotalVenta'];

    $sql = "UPDATE ventas SET IdCliente='$idCliente', IdEmpleado='$idEmpleado', Fecha='$fecha', TotalVenta='$totalVenta' WHERE IdVentas=$idVentas";

    if ($conn->query($sql) === TRUE) {
        echo "Venta actualizada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idVentas = $_GET['IdVentas'];
    $sql = "SELECT * FROM ventas WHERE IdVentas=$idVentas";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Fluid viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.fluid.classless.min.css"
/>
    <title>Actualizar Venta</title>
</head>
<body>
    <h1>Actualizar Venta</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdVentas" value="<?php echo $row['IdVentas']; ?>">
        IdCliente: <input type="text" name="IdCliente" value="<?php echo $row['IdCliente']; ?>" required>
        <br>
        IdEmpleado: <input type="text" name="IdEmpleado" value="<?php echo $row['IdEmpleado']; ?>" required>
        <br>
        Fecha: <input type="date" name="Fecha" value="<?php echo $row['Fecha']; ?>" required>
        <br>
        Total Venta: <input type="text" name="TotalVenta" value="<?php echo $row['TotalVenta']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <br>
    <a href="read_ventas.php">Volver a la lista de ventas</a>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
