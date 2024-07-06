<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDetalleVentas = $_POST['IdDetalleVentas'];

    $sql = "DELETE FROM detalle_ventas WHERE IdDetalleVentas=$idDetalleVentas";

    if ($conn->query($sql) === TRUE) {
        echo "Detalle de venta eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idDetalleVentas = $_GET['IdDetalleVentas'];
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
    <title>Eliminar Detalle de Venta</title>
</head>
<body>
    <h1>Eliminar Detalle de Venta</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdDetalleVentas" value="<?php echo $idDetalleVentas; ?>">
        <p>¿Estás seguro de que deseas eliminar este detalle de venta?</p>
        <input type="submit" value="Eliminar">
    </form>
    <br>
    <button onclick="location.href='read_cliente.php'">Volver a la lista de detalle ventas</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
