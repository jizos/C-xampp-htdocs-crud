<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cc = $_POST['CC'];
    $nombres = $_POST['Nombres'];
    $telefono = $_POST['Telefono'];
    $estado = $_POST['Estado'];
    $user = $_POST['User'];

    $sql = "INSERT INTO empleado (CC, Nombres, Telefono, Estado, User) VALUES ('$cc', '$nombres', '$telefono', '$estado', '$user')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo empleado creado exitosamente";
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
    <title>Crear Empleado</title>
</head>
<body>
    <h1>Crear Empleado</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        CC: <input type="text" name="CC" required>
        <br>
        Nombres: <input type="text" name="Nombres" required>
        <br>
        Teléfono: <input type="text" name="Telefono">
        <br>
        Estado: <input type="text" name="Estado" required>
        <br>
        User: <input type="text" name="User" required>
        <br>
        <input type="submit" value="Crear">
    </form>
    <br>
    <button onclick="location.href='read_cliente.php'">Volver a la lista de Empleados</button>
    <br>
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</body>
</html>

