<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller</title>
</head>
<body>

<h2>Formulario</h2>

<form action="recogeTaller.php" method="post">
  <label for="name">Nombre:</label><br>
  <input type="text" id="name" name="name" placeholder="Introduce tu nombre"><br>

  <label for="mat">Matrícula:</label><br>
  <input type="text" id="mat" name="mat" placeholder="Nº de matrícula"><br>

  <label for="tlf">Teléfono:</label><br>
  <input type="number" id="tlf" name="tlf" placeholder="Nº móvil o fijo"><br>

  <label for="mail">E-mail:</label><br>
  <input type="email" id="mail" name="mail" placeholder="Introduce tu e-mail"><br>

  <label for="brand">Marca:</label>
  
  <select name="brand" id="brand">
  <?php
  $coches = file("marcasCoche.csv");
  foreach ($coches as $coche) {  // También se puede while (coches!="")
      $elementos = explode(',', $coche);
      echo "<option value='" . $elementos[1] . "'>" . $elementos[0] . "</option>";
  }
  ?>
  </select>

    <p>¿Usa seguro?</p>
    <input type="radio" id="s1" name="seg" value="si">
    <label for="s1">Sí usa seguro</label>
    <input type="radio" id="s2" name="seg" value="no">
    <label for="s2">No tiene seguro</label>

    <h3>Escoge horarios</h3>
    <input type="checkbox" id="opt1" name="opt1" value="Mañana">
    <label for="opt1">Mañana</label><br>
    <input type="checkbox" id="opt2" name="opt2" value="Tarde">
    <label for="opt2">Tarde</label><br>
    <input type="checkbox" id="opt3" name="opt3" value="Noche">
    <label for="opt3">Noche</label><br><br>
    
    <input type="submit" value="Enviar">
  
</form>
</body>
</html>