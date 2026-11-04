<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    define("DEBUG", false);
        function mensajeDebug($mensaje) {
            if (DEBUG) {
                echo $mensaje;
            }
        }    

        function crearFila($constante, $valor) {
            echo "<tr>";
                echo "<td>";
                    echo $constante;
                echo "</td>";
                echo "<td>";
                    echo $valor;
                echo "</td>";
            echo "</tr>";
        }
    ?>
    <table border = "1">
        <tr>
            <th>
                CONSTANTE MAGICA
            </th>
            <th>
                VALOR
            </th>
        </tr>
        <?php
            crearFila("__LINE__", __LINE__);
            mensajeDebug("Tras LINE: " . __LINE__);
            crearFila("__FILE__", __FILE__);
            crearFila("__DIR__", __DIR__);
            crearFila("PHP_VERSION", PHP_VERSION);
        ?>
    </table>
</body>
</html>