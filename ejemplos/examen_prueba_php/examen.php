<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        define("IVA", 0.21);
        $descuento = 0.1;
        $uds = 3;
        $producto = "teclado mecanico";
        $precioUnit = 49.99;

        $moneda = "€";

        $importeBase = $precioUnit * $uds;
        $ivaAplicar = $importeBase * IVA;
        $conIVA = $importeBase + $ivaAplicar;
        $importeFinal = $conIVA - ($conIVA * $descuento);

        function linea($etiqueta, $valor) {
            global $moneda;

            echo "<p><strong>{$etiqueta}:</strong> " . number_format($valor, 2) . " {$moneda}</p>";
        }

        echo "<h2>Resumen del pedido: </h2>";
        linea("importe base", $importeBase);
        linea("IVA", $ivaAplicar);
        linea("Importe con iva", $conIVA);
        linea("Descuento", $conIVA * $descuento);
        linea("total a pagar", $importeFinal);

    ?>
</body>
</html>