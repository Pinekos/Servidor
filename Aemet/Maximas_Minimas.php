<?php
$selectedMunicipio = isset($_GET['municipio']) ? $_GET['municipio'] : null;
$municipioXML = '';

$url1 = 'https://www.aemet.es/xml/municipios/localidad_28007.xml';
$url2 = 'https://www.aemet.es/xml/municipios/localidad_28079.xml';
$url3 = 'https://www.aemet.es/xml/municipios/localidad_28009.xml';

if ($selectedMunicipio === '1') {
    $municipioXML = $url1;
} elseif ($selectedMunicipio === '2') {
    $municipioXML = $url2;
} elseif ($selectedMunicipio === '3') {
    $municipioXML = $url3;
}

if (!empty($municipioXML)) {
    $xml_content = file_get_contents($municipioXML);

    if ($xml_content === false) {
        die('No se pudo obtener el archivo XML desde la URL.');
    }

    $xml = simplexml_load_string($xml_content);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Predicción del Tiempo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Predicción del Tiempo</h1>

    <form method="get">
        <label for="municipio">Selecciona un municipio:</label>
        <select name="municipio" id="municipio" onchange="this.form.submit()">
            <option value="1">Alcorcon</option>
            <option value="2">Madrid</option>
            <option value="3">Algete</option>
        </select>
    </form>

    <?php
    if (!empty($municipioXML)) {
        echo '<br><table class="table table-striped">';
        echo '<tr><th>Día</th><th>Temperatura Mínima</th><th>Temperatura Máxima</th></tr>';
        foreach ($xml->prediccion->dia as $dia) {
            //$fecha = $dia['fecha'];
            $fecha = date('d', strtotime($dia['fecha']));
            $temperaturaMinima = $dia->temperatura->minima;
            $temperaturaMaxima = $dia->temperatura->maxima;
            echo '<tr><td>' . $fecha . '</td><td>' . $temperaturaMinima . '</td><td>' . $temperaturaMaxima . '</td></tr>';
        }
        echo '</table>';
    }
    ?>

</body>

</html>