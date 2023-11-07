<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        body {
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <header style="text-align: center;">
        <br>
        <h4> - CHAT - </h4>
    </header>
    <main>
        <div class="container">
            <form action="comprobadorUsuarios.php" method="post">
                <div class="container p-5 my-5 border" style="text-align: center;">
                    <p id="alertText">
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] === 'psw_match') {
                                echo "Las contraseñas no coinciden.";
                            }
                            if ($_GET['error'] === 'user_exists') {
                                echo "El nombre de usuario ya existe. Por favor, elige otro nombre.";
                            }
                            if ($_GET['error'] === 'user_wrong') {
                                echo "El nombre de usuario o el password son incorrectos.";
                            }
                        }
                        ?>
                    </p>
                    <label for="name">Nombre:</label><br>
                    <input type="text" id="name" name="name" placeholder="Introduce tu nombre de usuario"><br>
                    <label for="psw">Contraseña:</label><br>
                    <input type="password" id="psw" name="psw" placeholder="Introduce tu contraseña"><br>
                    <div id="repeatPWD" style="display: none;">
                        <label for="repeat">Confirmar contraseña:</label><br>
                        <input type="password" id="repeat" name="repeat" placeholder="Repite tu contraseña"><br>
                    </div>
                    <br> <!--Botones de inicio de sesión y registro-->
                    <button type="button" class="btn btn-outline-secondary"
                        onclick="document.getElementById('repeatPWD').style.display = 'none'; document.getElementById('repeat').value = ''; ">
                        Iniciar sesión</button>
                    <button type="button" class="btn btn-outline-secondary"
                        onclick="document.getElementById('repeatPWD').style.display = 'block' ">
                        Registrase</button>
                    <input class="btn btn-outline-secondary" type="submit" value="Enviar">
            </form>
        </div>
        </div>

    </main>
</body>

</html>