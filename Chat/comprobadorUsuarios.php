<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $password = $_POST['psw'];

    // Abrir el archivo en modo "a+" para lectura y escritura
    $myFile = fopen("usuarios.csv", "a+") or die("Error al abrir el archivo");

    $loginSuccess = false;
    $userExists = false;

    while (!feof($myFile)) {
        $line = fgets($myFile);
        if (empty($line)) {
            continue; // Salta líneas vacías
        }

        list($storedUsername, $storedPassword) = explode(',', $line);

        if ($_POST['repeat'] == '') { // Inicio de sesión
            if ($username == $storedUsername && $password == $storedPassword) {
                $loginSuccess = true;
                break; // Usuario y contraseña correctos
            }
        } elseif ($_POST['repeat'] != '') { // Registro
            if ($username == $storedUsername) { // El usuario ya existe
                $userExists = true;
                break;
            }
        }
    }

    fclose($myFile);

    if ($_POST['repeat'] == '') { // Inicio de sesión
        if ($loginSuccess) {
            $_SESSION['username'] = $username;
            header("Location: chat.php"); // Lleva a la página de chat
            exit();
        } else {
            header("Location: chatUsuarios.php?error=user_wrong"); // Redirige de nuevo a la página de inicio de sesión
            exit();
        }
    } else { // Registro
        if ($userExists) {
            header("Location: chatUsuarios.php?error=user_exists"); // Usuario existente
            exit();
        }
        if ($_POST['psw'] !== $_POST['repeat']) {
            header("Location: chatUsuarios.php?error=psw_match");
            exit();
        } else {
            // Abre el archivo nuevamente para agregar el nuevo usuario
            $myFile = fopen("usuarios.csv", "a") or die("Error al abrir el archivo"); // Usuario válido

            $nuevoUsuario = $username . ',' . $password . "\n";
            fwrite($myFile, $nuevoUsuario);
            fclose($myFile);

            $_SESSION['username'] = $username;
            header("Location: chat.php"); // Redirige a la página de chat
            exit();
        }
    }
} else {
    header("Location: chatUsuarios.php"); // Redirige si no se accede a través de un formulario POST
    exit();
}
?>