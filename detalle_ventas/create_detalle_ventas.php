<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idVentas = $_POST['IdVentas'];
    $idProducto = $_POST['IdProducto'];
    $cantidad = $_POST['Cantidad'];
    $precioVenta = $_POST['PrecioVenta'];

    $sql = "INSERT INTO detalle_ventas (IdVentas, IdProducto, Cantidad, PrecioVenta) VALUES ('$idVentas', '$idProducto', '$cantidad', '$precioVenta')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo detalle de venta creado exitosamente";
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
    <title>Crear Detalle de Ventas</title>
</head>
<body>
    <h1>Crear Detalle de Ventas</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        IdVentas: <input type="text" name="IdVentas" required>
        <br>
        IdProducto: <input type="text" name="IdProducto" required>
        <br>
        Cantidad: <input type="text" name="Cantidad" required>
        <br>
        Precio Venta: <input type="text" name="PrecioVenta" required>
        <br>
        <input type="submit" value="Crear">
    </form>
    <br>
    <button onclick="location.href='read_detalle_ventas.php'">Volver a la lista de detalles de ventas</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
