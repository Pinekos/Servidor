<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="estiloCuaderno.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    
<style>
.red {
color: red;
}

.green {
color: green;
}
</style>
</head>
<body>
    <div>
    <?php
    
    //Fallos
    $repetir = true;

    if ($_GET["res"] == $_GET["resC"]) {
      $repetir = false;
      echo "<p>Resultado correcto</p>";
    }else{
      echo "<p>Resultado incorrecto</p>";
    }
    $repetirOp = $_GET["resOp"];
    $repetirVar1 = $_GET["resVar1"];
    $repetirVar2 = $_GET["resVar2"];
    // echo "El resultado de la operacion " . $_GET["resVar1"] . " " . $_GET["resOp"]. " " . $_GET["resVar2"] . " es " . $_GET["resC"] . "</p>";
    ?>
    
      <form action="CuadernilloPHP.php">
      <input type="hidden" id="falloOp" name="falloOp" value="<?php echo $repetirOp; ?>">
      <input type="hidden" id="falloVar1" name="falloVar1" value="<?php echo $repetirVar1; ?>">
      <input type="hidden" id="falloVar2" name="falloVar2" value="<?php echo $repetirVar2; ?>">
      <input type="hidden" id="repBool" name="repBool" value="<?php echo $repetir; ?>">
      <input type="submit" value="Volver">
      </form>
    </div>
</body>
</html>