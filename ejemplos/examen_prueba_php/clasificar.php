<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Clasificación de películas</title>
</head>
<body>
  <h1>Clasificación de películas</h1>


<?php
// CE3.f: Verificar envío por POST y recuperar datos del formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['titulo']) || empty($_POST['anio']) || empty($_POST['duracion'])) {
    echo '<p>No se recibieron datos. <a href="entrada.html">Volver al formulario</a></p>';
    exit;
}


$titulos   = $_POST['titulo'];
$anios     = $_POST['anio'];
$duraciones= $_POST['duracion'];


// CE3.c: Consolidar en un array de películas (alineando por índice)
$peliculas = [];
$filas = min(count($titulos), count($anios), count($duraciones));


for ($i = 0; $i < $filas; $i++) {
    // Saneado básico y tipado mínimo
    $titulo   = trim($titulos[$i] ?? '');
    $anio     = (int)($anios[$i] ?? 0);
    $duracion = (int)($duraciones[$i] ?? 0);


    if ($titulo !== '' && $anio > 0 && $duracion > 0) {
        $peliculas[] = [
            'titulo'   => htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'),
            'anio'     => $anio,
            'duracion' => $duracion
        ];
    }
}


// CE3.d + CE3.a + CE3.g: Función con decisiones y comentarios
/**
 * determinarCategoria
 * Devuelve la categoría en función de reglas de año y duración:
 * - "Estreno Imperdible": año >= 2023 Y duración > 120
 * - "Clásico Reconocido": año <= 2000
 * - "Contenido General" : resto de casos
 */
function determinarCategoria(int $anio, int $duracion): string {
    // CE3.a: decisiones con if/elseif/else
    if ($anio >= 2023 && $duracion > 120) {
        return 'Estreno Imperdible';
    } elseif ($anio <= 2000) {
        return 'Clásico Reconocido';
    } else {
        return 'Contenido General';
    }
}


// CE3.b: Recorrer con foreach y generar tabla
if (empty($peliculas)) {
    echo '<p>No hay películas válidas para clasificar. <a href="entrada.html">Volver</a></p>';
    exit;
}
?>
  <table>
    <thead>
      <tr>
        <th>Título</th>
        <th>Año</th>
        <th>Duración (min)</th>
        <th>Categoría</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($peliculas as $p): ?>
        <?php $categoria = determinarCategoria($p['anio'], $p['duracion']); // CE3.d llamada a función ?>
        <tr>
          <td><?= $p['titulo'] ?></td>
          <td><?= $p['anio'] ?></td>
          <td><?= $p['duracion'] ?></td>
          <td><span><?= $categoria ?></span></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


  <p><a href="entrada.html">← Volver al formulario</a></p>

  
</body>
</html>
