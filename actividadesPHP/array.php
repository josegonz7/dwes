<?php
$persona = [
    "nombre" => "Juan",
    "edad" => 25,
    "ciudad" => "Madrid"
];

echo "Nombre: " . $persona["nombre"] . "\n";
echo "Edad: " . $persona["edad"] . "\n";
echo "Ciudad: " . $persona["ciudad"] . "\n";
?>


<?php
$frutas = ["manzana", "plátano", "naranja"];

echo $frutas[0] . "\n";
echo $frutas[1] . "\n";
echo $frutas[2] . "\n";
?>


<?php
$ciudades = ["Madrid", "Barcelona", "Valencia"];

foreach ($ciudades as $ciudad) {
    echo $ciudad . "\n";
}
?>


<?php
$categorias = [
    "frutas" => ["manzana", "plátano", "naranja"],
    "vehiculos" => ["coche", "moto", "bicicleta"]
];

echo $categorias["frutas"][1]; // Plátano
?>


<?php
$numeros = [10, 20, 30];

// Modificar el primer elemento
$numeros[0] = 15;

// Añadir un nuevo número al final
$numeros[] = 40;

// Eliminar el segundo elemento
unset($numeros[1]);

print_r($numeros);
?>


<?php
$colores = ["rojo", "verde", "azul", "amarillo"];

// Eliminar el tercer elemento (índice 2)
unset($colores[2]);

// Reindexar el array
$colores = array_values($colores);

print_r($colores);
?>


<?php
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];

$resultado = array_merge($array1, $array2);

print_r($resultado);
?>


<?php
$frutas = ["manzana", "plátano", "naranja"];

if (in_array("plátano", $frutas)) {
    echo "El array contiene la fruta plátano.";
} else {
    echo "El array no contiene la fruta plátano.";
}
?>


<?php
$producto = [
    "nombre" => "Portátil",
    "precio" => 800,
    "stock" => 10
];

$claves = array_keys($producto);

print_r($claves);
?>


<?php
$numeros = [1, 2, 3, 4, 5];

$mayoresQueTres = array_filter($numeros, function($numero) {
    return $numero > 3;
});

print_r($mayoresQueTres);
?>