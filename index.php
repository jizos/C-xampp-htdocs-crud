<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Ventas - CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="cliente/create_cliente.php">Crear Cliente</a>
            <a href="cliente/read_cliente.php">Ver Clientes</a>
            <a href="detalle_ventas/create_detalle_ventas.php">Crear Detalle Ventas</a>
            <a href="detalle_ventas/read_detalle_ventas.php">Ver Detalle Ventas</a>
            <a href="empleado/create_empleado.php">Crear Empleado</a>
            <a href="empleado/read_empleado.php">Ver Empleados</a>
            <a href="producto/create_producto.php">Crear Producto</a>
            <a href="producto/read_producto.php">Ver Productos</a>
            <a href="ventas/create_ventas.php">Crear Venta</a>
            <a href="ventas/read_ventas.php">Ver Ventas</a>
        </div>
        <div class="main">
            <h1>Bienvenido al Sistema de Ventas</h1>
            <p>Utiliza el menú de arriba para navegar entre las operaciones CRUD para las diferentes tablas.</p>

            <!-- Formulario de Búsqueda -->
            <div class="search-form">
                <form method="GET" action="search.php">
                    <input type="text" name="query" placeholder="Buscar..." required>
                    <select name="table">
                        <option value="cliente">Cliente</option>
                        <option value="producto">Producto</option>
                        <option value="empleado">Empleado</option>
                        <option value="ventas">Ventas</option>
                    </select>
                    <input type="submit" value="Buscar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

