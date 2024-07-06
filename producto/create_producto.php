<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['Nombres'];
    $precio = $_POST['Precio'];
    $stock = $_POST['Stock'];
    $estado = $_POST['Estado'];

    $sql = "INSERT INTO producto (Nombres, Precio, Stock, Estado) VALUES ('$nombres', '$precio', '$stock', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo producto creado exitosamente";
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
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombres: <input type="text" name="Nombres" required>
        <br>
        Precio: <input type="text" name="Precio" required>
        <br>
        Stock: <input type="text" name="Stock" required>
        <br>
        Estado: <input type="text" name="Estado" required>
        <br>
        <input type="submit" value="Crear">
    </form>
    <br>
    <button onclick="location.href='read_cliente.php'">Volver a la lista de productos</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
