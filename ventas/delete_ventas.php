<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idVentas = $_POST['IdVentas'];

    $sql = "DELETE FROM ventas WHERE IdVentas=$idVentas";

    if ($conn->query($sql) === TRUE) {
        echo "Venta eliminada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idVentas = $_GET['IdVentas'];
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
    <title>Eliminar Venta</title>
</head>
<body>
    <h1>Eliminar Venta</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdVentas" value="<?php echo $idVentas; ?>">
        <p>¿Estás seguro de que deseas eliminar esta venta?</p>
        <input type="submit" value="Eliminar">
    </form>
    <br>
    <a href="read_ventas.php">Volver a la lista de ventas</a>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
