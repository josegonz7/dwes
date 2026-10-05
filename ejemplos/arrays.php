<?php

$array = [1, 2, 3, 4, 5];
foreach ($array as $valor) {
    echo $valor . "\n";
}

$asociativo = ["a" => 1, "b" => 2, "c" => 3];
foreach ($asociativo as $clave => $valor) {
    echo "Clave: " . $clave . ", Valor: " . $valor . "\n";
}

?>