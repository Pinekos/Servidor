<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username']) && isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);
    $username = $_SESSION['username'];

    // Almacena el mensaje en un archivo de registro
    $logFile = fopen("chat-log.txt", "a") or die("Error al abrir el archivo de registro");
    $newMessage = "[" . date('Y-m-d H:i:s') . "] $username: $message\n<br>";
    fwrite($logFile, $newMessage);
    fclose($logFile);
}

// Redirige nuevamente a la página de chat (chat.php)
header("Location: chat.php");
exit();
?>
