<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
</head>
<body>
<?php

    $myFile = fopen("agenda.csv", "a") or die("Error al abrir el archivo");
    $nuevoContacto = $_POST["name"] . ',' . $_POST["surname"] . ',' . $_POST["phone"] . "\n";
    fwrite($myFile, $nuevoContacto);
    fclose($myFile);

    $rows = file("agenda.csv");
    echo "<table><tr><td>Nombre</td><td>Apellido</td><td>Número</td></tr>";
    foreach ($rows as $row) { // También se puede while (rows!="")
        $columns = explode(',', $row);
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>", $column, "</td>";
        }
    echo "</tr>";
    }
echo "</table>";
?>


</body>
</html>