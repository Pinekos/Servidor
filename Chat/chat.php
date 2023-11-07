<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightblue;
        }

        .chat-box {
            background-color: azure;
            height: 300px;
            width: 80%;
            overflow-y: scroll;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header("Location: chatUsuarios.php"); // Redirigir a la página de inicio de sesión si no hay una sesión iniciada
        exit();
    }
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Chat</title>
    </head>

    <body>
        <h1>Bienvenid@ a la sala de chat,
            <?php echo $username; ?>!
        </h1>

        <div class ="chat-box" id="chat-box">
            <?php
            // Cargar y mostrar el contenido del archivo de registro
            $chatLog = file_get_contents('chat-log.txt');
            echo nl2br($chatLog); // La función nl2br convierte saltos de línea en <br>
            ?>
        </div>
        <br>
        <!-- Formulario para enviar mensajes -->
        <form method="post" action="procesar_mensaje.php">
            <input type="text" name="message" placeholder="Escribe tu mensaje" required>
            <input type="submit" value="Enviar">
        </form>
        <br>
        <a href="chatUsuarios.php">Cerrar sesión</a>
    </body>

    </html>

</body>

</html>