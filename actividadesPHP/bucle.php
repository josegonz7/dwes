//bucles act

// act 1
<?php
    for ($i = 0; $i <= 20; $i+=2) {
    echo "$i ";
}

?> 

// act 2

<?php

$cadena = "Desarrollo de Aplicaciones Web en PHP";
$totalVocales = 0;

$cadenaMin = strtolower($cadena);

$caracteres = str_split($cadenaMin);

$vocales = ['a', 'e', 'i', 'o', 'u'];

foreach ($caracteres as $caracter) {
    if (in_array($caracter, $vocales)) {
        $totalVocales++;
    }
}

echo "Cadena: \"{$cadena}\"" . PHP_EOL;
echo "total de vocales: {$totalVocales}" . PHP_EOL;
?>



<?php
function doblar($numero) {
    return $numero * 2;
}
$numero = 5;
$resultado = doblar($numero);
echo "El doble de " . $numero . " es: " . $resultado;
?>
