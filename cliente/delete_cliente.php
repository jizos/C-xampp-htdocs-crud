<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCliente = $_POST['IdCliente'];

    $sql = "DELETE FROM cliente WHERE IdCliente=$idCliente";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idCliente = $_GET['IdCliente'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Cliente</title>
</head>
<body>
    <h1>Eliminar Cliente</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdCliente" value="<?php echo $idCliente; ?>">
        <p>¿Estás seguro de que deseas eliminar este cliente?</p>
        <input type="submit" value="Eliminar">
    </form>
    <br>
    <button onclick="location.href='read_cliente.php'">Volver a la lista de clientes</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>
