<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Bicicletas</title>
</head>
<body>

<table class="table table-striped">
<?php
$myFile = fopen("AccidentesBicicletas_2022.csv", "r") or die("Error al abrir el archivo");
$rows = file("AccidentesBicicletas_2022.csv");

foreach ($rows as $row) {
    $columns = explode(';', $row);
    echo "<tr>";
    echo "<td>", $columns[1], "</td>";
    echo "<td>", $columns[7], "</td>";
    echo "<td>", $columns[9], "</td>";
    echo "</tr>";
}

fclose($myFile);
?>
</table>
</body>
</html>
