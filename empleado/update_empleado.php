<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEmpleado = $_POST['IdEmpleado'];
    $cc = $_POST['CC'];
    $nombres = $_POST['Nombres'];
    $telefono = $_POST['Telefono'];
    $estado = $_POST['Estado'];
    $user = $_POST['User'];

    $sql = "UPDATE empleado SET CC='$cc', Nombres='$nombres', Telefono='$telefono', Estado='$estado', User='$user' WHERE IdEmpleado=$idEmpleado";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idEmpleado = $_GET['IdEmpleado'];
    $sql = "SELECT * FROM empleado WHERE IdEmpleado=$idEmpleado";
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
    <title>Actualizar Empleado</title>
</head>
<body>
    <h1>Actualizar Empleado</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdEmpleado" value="<?php echo $row['IdEmpleado']; ?>">
        CC: <input type="text" name="CC" value="<?php echo $row['CC']; ?>" required>
        <br>
        Nombres: <input type="text" name="Nombres" value="<?php echo $row['Nombres']; ?>" required>
        <br>
        Teléfono: <input type="text" name="Telefono" value="<?php echo $row['Telefono']; ?>">
        <br>
        Estado: <input type="text" name="Estado" value="<?php echo $row['Estado']; ?>" required>
        <br>
        User: <input type="text" name="User" value="<?php echo $row['User']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <br>
    <a href="read_empleado.php">Volver a la lista de empleados</a>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
