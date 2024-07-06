<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProducto = $_POST['IdProducto'];
    $nombres = $_POST['Nombres'];
    $precio = $_POST['Precio'];
    $stock = $_POST['Stock'];
    $estado = $_POST['Estado'];

    $sql = "UPDATE producto SET Nombres='$nombres', Precio='$precio', Stock='$stock', Estado='$estado' WHERE IdProducto=$idProducto";

    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idProducto = $_GET['IdProducto'];
    $sql = "SELECT * FROM producto WHERE IdProducto=$idProducto";
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
    <title>Actualizar Producto</title>
</head>
<body>
    <h1>Actualizar Producto</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdProducto" value="<?php echo $row['IdProducto']; ?>">
        Nombres: <input type="text" name="Nombres" value="<?php echo $row['Nombres']; ?>" required>
        <br>
        Precio: <input type="text" name="Precio" value="<?php echo $row['Precio']; ?>" required>
        <br>
        Stock: <input type="text" name="Stock" value="<?php echo $row['Stock']; ?>" required>
        <br>
        Estado: <input type="text" name="Estado" value="<?php echo $row['Estado']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <br>
    <a href="read_producto.php">Volver a la lista de productos</a>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
