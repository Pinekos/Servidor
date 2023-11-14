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
    <title>Registrar nuevo alumno</title>
</head>

<body>
    <h1>Registrar nuevo alumno</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        try {
            $dsn = "mysql:host=localhost;dbname=escuela";
            $username = "root";
            $password = "";

            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO alumnos (nombre, apellido) VALUES (:nombre, :apellido)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $stmt->execute();

            echo "<p>Alumno registrado correctamente.</p>";
        } catch (PDOException $e) {
            die("Error de conexión a MySQL: " . $e->getMessage());
        } finally {
            $pdo = null;
        }
    }
    ?>

    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <button type="submit">Registrar</button>
    </form>

    <a href="Mostrar_alumnos.php"><button>Volver a Mostrar Alumnos</button></a>
</body>

</html>
