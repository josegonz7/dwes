<?php

function calcularMedia(array $notas) :float {
    if (count($notas) ==0) {
        return 0.0;
    }
    // $suma = array_sum($notas);
    $sumaT = 0;
    foreach($notas as $value) {
        $sumaT += $value;
    }
    return round($sumaT / count($notas), 2);
}
$calificaciones = [7.5,8.2,3.2];
$media = calcularMedia($calificaciones);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Media</h2>
    <p>Las notas son: <?php echo implode(", ", $calificaciones);?></p>
    <p>Nota media: <?php echo $media; ?></p>
</body>
</html>