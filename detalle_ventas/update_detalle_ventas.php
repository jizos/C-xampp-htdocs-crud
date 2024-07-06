<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDetalleVentas = $_POST['IdDetalleVentas'];
    $idVentas = $_POST['IdVentas'];
    $idProducto = $_POST['IdProducto'];
    $cantidad = $_POST['Cantidad'];
    $precioVenta = $_POST['PrecioVenta'];

    $sql = "UPDATE detalle_ventas SET IdVentas='$idVentas', IdProducto='$idProducto', Cantidad='$cantidad', PrecioVenta='$precioVenta' WHERE IdDetalleVentas=$idDetalleVentas";

    if ($conn->query($sql) === TRUE) {
        echo "Detalle de venta actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idDetalleVentas = $_GET['IdDetalleVentas'];
    $sql = "SELECT * FROM detalle_ventas WHERE IdDetalleVentas=$idDetalleVentas";
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
    <title>Actualizar Detalle de Venta</title>
</head>
<body>
    <h1>Actualizar Detalle de Venta</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdDetalleVentas" value="<?php echo $row['IdDetalleVentas']; ?>">
        IdVentas: <input type="text" name="IdVentas" value="<?php echo $row['IdVentas']; ?>" required>
        <br>
        IdProducto: <input type="text" name="IdProducto" value="<?php echo $row['IdProducto']; ?>" required>
        <br>
        Cantidad: <input type="text" name="Cantidad" value="<?php echo $row['Cantidad']; ?>" required>
        <br>
        Precio Venta: <input type="text" name="PrecioVenta" value="<?php echo $row['PrecioVenta']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <br>
    <a href="read_detalle_ventas.php">Volver a la lista de detalles de ventas</a>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
