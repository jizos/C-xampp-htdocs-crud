<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProducto = $_POST['IdProducto'];

    $sql = "DELETE FROM producto WHERE IdProducto=$idProducto";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idProducto = $_GET['IdProducto'];
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
    <title>Eliminar Producto</title>
</head>
<body>
    <h1>Eliminar Producto</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdProducto" value="<?php echo $idProducto; ?>">
        <p>¿Estás seguro de que deseas eliminar este producto?</p>
        <input type="submit" value="Eliminar">
    </form>
    <br>
    <a href="read_producto.php">Volver a la lista de productos</a>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
