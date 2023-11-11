<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Países</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Información de Países</h2>
    <button onclick="obtenerInformacion()">Obtener Información</button>
    <table id="infoTable">
        <tr>
            <th>País</th>
            <th>Capital</th>
            <th>Google Maps</th>
        </tr>
    </table>

    <script>
        async function obtenerInformacion() {
            try {
                const response = await fetch('https://restcountries.com/v3.1/all');
                const json = await response.json();

                const tabla = document.getElementById("infoTable");

                /*while (tabla.rows.length > 1) {
                    tabla.deleteRow(1);
                }*/

                json.forEach(pais => {
                    const row = tabla.insertRow(-1);
                    const cell1 = row.insertCell(0);
                    const cell2 = row.insertCell(1);
                    const cell3 = row.insertCell(2);

                    cell1.textContent = pais.name.common;
                    cell2.textContent = pais.capital[0];
                    cell3.innerHTML = "<a href="${pais.maps.googleMaps}" target="_blank">Ver en Google Maps</a>";
                });
            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        }
    </script>
</body>
</html>
