<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="estiloCuaderno.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma</title>
</head>
<body>
    <?php

    // Cadena de operaciones
    $operation = array("*","+","-", "/");
    $selOp = "";
    // Variables
    if($_GET["repBool"] == true){
        $var1 = $_GET["falloVar1"];
        $var2 = $_GET["falloVar2"];
        $selOp = $_GET["falloOp"];
    }else{
        $var1 = rand(1,50);
        $var2 = rand(1,50);
        $varOp = rand(0,3);
        $selOp = $operation[$varOp];
    }
    $resultado = 0;

    switch ($selOp) {
        case '+':
            $resultado = $var1 + $var2;
            break;
        case '-':
            $resultado = $var1 - $var2;
            break;
        case '*':
            $resultado = $var1 * $var2;
            break;
        case '/':
            if ($var2 != 0) {
                $resultado = $var1 / $var2;
            } else {
                echo "Error: Division por cero.";
                exit;
            }
            break;
    }
    ?>
<div>
    <form action="CuadernilloRes.php">
    <h3>
    <?php echo $var1; ?> <?php echo $selOp; ?> <?php echo $var2; ?> = <input type="number" name="res" value=""></h3>
    <input type="hidden" id="resC" name="resC" value="<?php echo $resultado; ?>">
    <input type="hidden" id="resOp" name="resOp" value="<?php echo $selOp; ?>">
    <input type="hidden" id="resVar1" name="resVar1" value="<?php echo $var1; ?>">
    <input type="hidden" id="resVar2" name="resVar2" value="<?php echo $var2; ?>">
    <input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>