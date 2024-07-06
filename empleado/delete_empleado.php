<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEmpleado = $_POST['IdEmpleado'];

    $sql = "DELETE FROM empleado WHERE IdEmpleado=$idEmpleado";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $idEmpleado = $_GET['IdEmpleado'];
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
    <title>Eliminar Empleado</title>
</head>
<body>
    <h1>Eliminar Empleado</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="IdEmpleado" value="<?php echo $idEmpleado; ?>">
        <p>¿Estás seguro de que deseas eliminar este empleado?</p>
        <input type="submit" value="Eliminar">
    </form>
    <br>
    <a href="read_empleado.php">Volver a la lista de empleados</a>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
