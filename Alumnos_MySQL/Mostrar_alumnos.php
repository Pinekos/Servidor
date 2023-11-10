<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 10px;
        }
    </style>
    <title>Mostrar alumnos</title>
</head>

<body>
    <h1>Mostrar alumnos</h1><br>
    <?php
    $conexion = new mysqli("localhost", "root", "", "escuela");

    if ($conexion->connect_error) {
        die("Error de conexión a MySQL: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM alumnos";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['nombre']} {$row['apellido']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay alumnos.";
    }

    $conexion->close();
    ?>

    <a href="Registro_alumnos.php"><button>Registrar nuevo alumno</button></a>
    <a href="Buscar_alumnos.php"><button>Buscar alumno</button></a>
</body>

</html>