
<?php
$contactos = array(
    array('nombre' => 'Juan', 'email' => 'juan@example.com'),
    array('nombre' => 'María', 'email' => 'maria@example.com'),
);

//header('Content-Type: application/json');
echo json_encode($contactos);
?>