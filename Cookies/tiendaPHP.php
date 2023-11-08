<?php
if (isset($_COOKIE['categoria'])) {
    $categoriaSeleccionada = $_COOKIE['categoria'];
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoriaSeleccionada = $_POST['categoria'];
        setcookie('categoria', $categoriaSeleccionada, time() + 5); // 5 segundos
    } else {
        $categoriaSeleccionada = null;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tienda</title>
    <style>
        img {
            height: 150px;
            width: 150px;
        }
         li {
            list-style: none;
         }
    </style>
</head>
<body>
    <h1>Productos</h1>

    <?php if (!$categoriaSeleccionada) : ?>
        <form method="post">
            <label for="categoria">Selecciona una categoría:</label>
            <select name="categoria" id="categoria">
                <option value="camisetas">Camisetas</option>
                <option value="pantalones">Pantalones</option>
            </select>
            <input type="submit" value="Seleccionar">
        </form>
    <?php else : ?>
        <h2>Productos de la categoría: <?php echo $categoriaSeleccionada; ?></h2>

        <?php
        $productos = [];
        $csv = array_map('str_getcsv', file('catalogo.csv'));
        foreach ($csv as $row) {
            $productos[] = [
                'categoria' => $row[0],
                'talla' => $row[1],
                'color' => $row[2],
            ];
        }

        echo '<ul>';
        foreach ($productos as $producto) {
            if ($producto['categoria'] === $categoriaSeleccionada) {
                $imagenURL = $producto['categoria'] . '.jpg';
                echo '<img src="' . $imagenURL . '" alt="' . $producto['categoria'] . '"><br>';
                echo '<li>Talla: ' . $producto['talla'] . ', Color: ' . $producto['color'] . '</li>';
            }
        }
        echo '</ul>';
        ?>

    <?php endif; ?>

</body>
</html>
