<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Buscar Alumno</title>
    <style>
        body{
            padding: 10px;
        }
    </style>
</head>

<body>
    <h1>Buscar Alumno</h1><br>
    <form action="Buscar_alumnos.php" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>
        <button type="submit">Buscar</button>
    </form>

    <?php
    $conexion = new mysqli("localhost", "root", "", "escuela");

    if ($conexion->connect_error) {
        die("Error de conexión a MySQL: " . $conexion->connect_error);
    }

    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        $sql = "SELECT * FROM alumnos WHERE nombre LIKE '%$nombre%'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['nombre']} {$row['apellido']}</li>";
            }
            echo "</ul>";
        } else {
            echo "No se encontraron resultados.";
        }
    }

    $conexion->close();
    ?>
    <br>
    <a href="Mostrar_alumnos.php"><button>Volver al listado</button></a>
</body>

</html>