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

  <?php
for ($i = 1; $i <= 5; $i++) {
echo"Tabla del {$i}:" . PHP_EOL;
$j = 1;
while ($j <= 10) {
$resultado = $i * $j;
echo"{$i} x {$j} = {$resultado}" . PHP_EOL;
$j++;
    }
echoPHP_EOL;
}
?>


<?php
$numero = 17;
$esPrimo = true;


if ($numero <= 1) {
$esPrimo = false;
} else {
for ($i = 2; $i <= sqrt($numero); $i++) {
if ($numero % $i == 0) {
$esPrimo = false;
break;
        }
    }
}


if ($esPrimo) {
echo"El número {$numero} es primo." . PHP_EOL;
} else {
echo"El número {$numero} no es primo." . PHP_EOL;
}
?>