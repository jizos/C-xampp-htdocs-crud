<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCliente = $_POST['IdCliente'];
    $idEmpleado = $_POST['IdEmpleado'];
    $fecha = $_POST['Fecha'];
    $totalVenta = $_POST['TotalVenta'];

    $sql = "INSERT INTO ventas (IdCliente, IdEmpleado, Fecha, TotalVenta) VALUES ('$idCliente', '$idEmpleado', '$fecha', '$totalVenta')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva venta creada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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
    <title>Crear Venta</title>
</head>
<body>
    <h1>Crear Venta</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        IdCliente: <input type="text" name="IdCliente" required>
        <br>
        IdEmpleado: <input type="text" name="IdEmpleado" required>
        <br>
        Fecha: <input type="date" name="Fecha" required>
        <br>
        Total Venta: <input type="text" name="TotalVenta" required>
        <br>
        <input type="submit" value="Crear">
    </form>
    <br>
    <button onclick="location.href='read_cliente.php'">Volver a la lista de ventas</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>

