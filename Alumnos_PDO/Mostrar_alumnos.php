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
    try {
        $dsn = "mysql:host=localhost;dbname=escuela";
        $username = "root";
        $password = "";

        $pdo = new PDO($dsn, $username, $password);

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM alumnos";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($alumnos) {
            echo "<ul>";
            foreach ($alumnos as $alumno) {
                echo "<li>{$alumno['nombre']} {$alumno['apellido']}</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay alumnos.";
        }
    } catch (PDOException $e) {
        die("Error de conexión a MySQL: " . $e->getMessage());
    } finally {
        $pdo = null; // Close the connection
    }
    ?>

    <a href="Registrar_alumnos.php"><button>Registrar nuevo alumno</button></a>
    <a href="Buscar_alumnos.php"><button>Buscar alumno</button></a>
</body>

</html>
