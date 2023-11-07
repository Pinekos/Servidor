<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

    <?php
    $fila = fopen("clientesTaller.csv", "a") or die("Error al abrir el archivo");
    $nuevoCliente = $_POST["name"] . ',' . $_POST["mat"] . ',' . $_POST["tlf"] . ',' . $_POST["mail"] . ',' . $_POST["brand"] . ',' . $_POST["seg"] . "\n";
    fwrite($fila, $nuevoCliente);
    fclose($fila);
    ?>

Hola <?php echo $_POST["name"]; ?><br>
Tienes la matrícula <?php echo $_POST["mat"]; ?><br>
Teléfono: <?php echo $_POST["tlf"]; ?><br>
E-mail: <?php echo $_POST["mail"]; ?><br>
El coche <?php echo $_POST["brand"]; ?> <?php if ($_POST["seg"] == "no")
{
  echo " no";
}else{
   "";
}
echo " usa seguro"; ?><br>
<table>
  <tr>
    <td>Mañana</td>
    <td><?php if (isset($_POST["opt1"]))
    {
      echo "X";
    }else{
      echo "   ";
    };
    ?></td>
  </tr>
  <tr>
  <td>Tarde</td>
    <td><?php if (isset($_POST["opt2"]))
    {
      echo "X";
    }else{
      echo "  ";
    };
    ?></td>
  </tr>
  <tr>
  <td>Noche</td>
    <td><?php if (isset($_POST["opt3"]))
    {
      echo "X";
    }else{
      echo "  ";
    };
    ?></td>
  </tr>
</table>
</body>
</html>