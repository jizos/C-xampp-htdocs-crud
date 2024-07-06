<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cc = $_POST['CC'];
    $nombres = $_POST['Nombres'];
    $direccion = $_POST['Direccion'];
    $estado = $_POST['Estado'];

    $sql = "INSERT INTO cliente (CC, Nombres, Direccion, Estado) VALUES ('$cc', '$nombres', '$direccion', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo cliente creado exitosamente";
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
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Cliente</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        CC: <input type="text" name="CC" required>
        <br>
        Nombres: <input type="text" name="Nombres" required>
        <br>
        Dirección: <input type="text" name="Direccion">
        <br>
        Estado: <input type="text" name="Estado" required>
        <br>
        <input type="submit" value="Crear">
    </form>
    <br>
    <button onclick="location.href='read_cliente.php'">Volver a la lista de clientes</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
