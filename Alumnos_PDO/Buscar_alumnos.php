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
    <title>Buscar alumnos</title>
</head>

<body>
    <h1>Buscar alumnos</h1>

    <form method="GET" action="">
        <label for="search">Buscar por nombre:</label>
        <input type="text" id="search" name="search">
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
        $searchTerm = $_GET['search'];

        try {
            $dsn = "mysql:host=localhost;dbname=escuela";
            $username = "root";
            $password = "";

            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM alumnos WHERE nombre LIKE :searchTerm";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                echo "<h2>Resultados de la búsqueda:</h2>";
                echo "<ul>";
                foreach ($results as $result) {
                    echo "<li>{$result['nombre']} {$result['apellido']}</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No se encontraron resultados para '$searchTerm'.</p>";
            }
        } catch (PDOException $e) {
            die("Error de conexión a MySQL: " . $e->getMessage());
        } finally {
            $pdo = null;
        }
    }
    ?>

    <a href="Mostrar_alumnos.php"><button>Volver a Mostrar Alumnos</button></a>
</body>

</html>
