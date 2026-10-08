
<?php
// Fecha de hoy
$hoy = date('Y-m-d');
echo "Fecha de hoy: " . $hoy . "\n";

// Fecha de ayer
$ayer = date('Y-m-d', strtotime('-1 day'));
echo "Fecha de ayer: " . $ayer . "\n";

// Fecha de mañana
$manana = date('Y-m-d', strtotime('+1 day'));
echo "Fecha de mañana: " . $manana . "\n";
?>


<?php
function saludar($nombre) {
    return "Hola, " . $nombre;
}

echo saludar("Carlos");
?>


<?php
function presentar($nombre, $ciudad = "Madrid") {
    return "Me llamo " . $nombre . " y vivo en " . $ciudad;
}

echo presentar("Ana") . "\n";
echo presentar("Juan", "Barcelona");
?>


<?php
function multiplicar($a, $b) {
    return $a * $b;
}

echo multiplicar(5, 4);
?>

<?php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5);
?>


<?php
function incrementar(&$numero) {
    $numero += 10;
}

$valor = 5;
incrementar($valor);
echo $valor;
?>


<?php
function sumar(...$numeros) {
    return array_sum($numeros);
}

echo sumar(1, 2, 3, 4, 5);
?>


<?php
function imprimir_array($array) {
    foreach ($array as $item) {
        echo $item . "\n";
    }
}

imprimir_array(["Manzana", "Pera", "Naranja"]);
?>


<?php
function obtener_informacion_usuario() {
    return [
        "nombre" => "María",
        "edad" => 28
    ];
}

$usuario = obtener_informacion_usuario();
print_r($usuario);
?>


<?php
function ordenar_personalizado($numeros, $orden = "ascendente") {
    if ($orden === "descendente") {
        rsort($numeros);
    } else {
        sort($numeros);
    }
    print_r($numeros);
    return $numeros;
}

ordenar_personalizado([4, 2, 8, 1]);
?>


<?php
function fibonacci($n) {
    $resultado = [];
    for ($i = 0; $i < $n; $i++) {
        if ($i === 0) {
            $resultado[] = 0;
        } elseif ($i === 1) {
            $resultado[] = 1;
        } else {
            $resultado[] = $resultado[$i - 1] + $resultado[$i - 2];
        }
    }
    return $resultado;
}

print_r(fibonacci(7));
?>


<?php
function calcular_inventario($productos) {
    $total = 0;
    foreach ($productos as $producto) {
        $total += $producto["precio"] * $producto["cantidad"];
    }
    return $total;
}

$productos = [
    ["nombre" => "Laptop", "precio" => 1000, "cantidad" => 5],
    ["nombre" => "Teclado", "precio" => 50, "cantidad" => 30],
    ["nombre" => "Mouse", "precio" => 25, "cantidad" => 50],
];

echo "Total inventario: " . calcular_inventario($productos);
?>


<?php
$cadena = "esto es una cadena";
$palabras = explode(" ", $cadena);
sort($palabras);
$resultado = implode(" ", $palabras);

echo $resultado;
?>


<?php
function analizar_numeros($numeros) {
    $minimo = min($numeros);
    $maximo = max($numeros);
    $media = array_sum($numeros) / count($numeros);

    return [
        "minimo" => $minimo,
        "maximo" => $maximo,
        "media" => $media
    ];
}

$datos = [14, 3, 27, 8, 42, 11, 90, 5, 22, 19];
$resultado = analizar_numeros($datos);
print_r($resultado);
?>
