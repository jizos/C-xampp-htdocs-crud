<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCliente = $_POST['IdCliente'];
    $cc = $_POST['CC'];
    $nombres = $_POST['Nombres'];
    $direccion = $_POST['Direccion'];
    $estado = $_POST['Estado'];

    $sql = "UPDATE cliente SET CC='$cc', Nombres='$nombres', Direccion='$direccion', Estado='$estado' WHERE IdCliente=$idCliente";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idCliente = $_GET['IdCliente'];
    $sql = "SELECT * FROM cliente WHERE IdCliente=$idCliente";
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
    <title>Actualizar Cliente</title>
</head>
<body>
    <h1>Actualizar Cliente</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdCliente" value="<?php echo $row['IdCliente']; ?>">
        CC: <input type="text" name="CC" value="<?php echo $row['CC']; ?>" required>
        <br>
        Nombres: <input type="text" name="Nombres" value="<?php echo $row['Nombres']; ?>" required>
        <br>
        Dirección: <input type="text" name="Direccion" value="<?php echo $row['Direccion']; ?>">
        <br>
        Estado: <input type="text" name="Estado" value="<?php echo $row['Estado']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <br>
    <button onclick="location.href='read_cliente.php'">Volver a la lista de clientes</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
