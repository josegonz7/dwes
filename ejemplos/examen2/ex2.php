<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Resumen de Reservas</title>
  <style>
    body { font-family: sans-serif; max-width: 900px; margin: 2rem auto; }
    table { border-collapse: collapse; width: 100%; margin-bottom: 2rem; }
    th, td { border: 1px solid #ccc; padding: 0.5rem; text-align: left; }
    thead th { background: #f3f3f3; }
    .total-box { background: #eef; padding: 1rem; border: 1px solid #ccd; border-radius: 5px; }
  </style>
</head>
<body>
  <h1>Resumen de Facturación</h1>

<?php
// 1. Constantes y verificación
define('TASA_TURISTICA', 1.50);

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['nombre'])) {
    echo '<p>Acceso denegado.</p><a href="formulario.html">Volver</a>';
    exit;
}

// 2. Consolidación de datos
$reservas = [];
$totalFilas = count($_POST['nombre']);

for ($i = 0; $i < $totalFilas; $i++) {
    $nombre = trim($_POST['nombre'][$i]);
    $noches = (int)$_POST['noches'][$i];
    $precio = (float)$_POST['precio'][$i];
    $tipo   = $_POST['tipo'][$i];

    // Validación idéntica a la de tu foto[cite: 8]
    if ($nombre !== "" && $noches > 0 && $precio > 0) {
        $reservas[] = [
            'cliente'      => htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'),
            'noches'       => $noches,
            'precio_noche' => $precio,
            'tipo_cliente' => $tipo
        ];
    }
}

// Si está vacío, mensaje y salir (Idéntico a tu foto)[cite: 8]
if (empty($reservas)) {
    echo '<p>No hay reservas válidas para procesar. <a href="formulario.html">Volver al formulario</a></p>';
    exit;
}

// 3. Funciones (Idéntico a tu foto)[cite: 8]
function calcularDescuento(int $noches, string $tipoCliente): float {
    if ($tipoCliente === 'vip') {
        return 0.20; // 20% descuento
    } elseif ($noches >= 4 && $noches <= 7 && $tipoCliente === 'estandar') {
        return 0.10; // 10% descuento
    } else {
        return 0.00; // Sin descuento
    }
}

function imprimirFilaResumen($r, $descuentoMoneda, $tasaTotal, $totalReserva) {
    echo "<tr>";
    echo "<td>{$r['cliente']}</td>";
    echo "<td>{$r['tipo_cliente']}</td>";
    echo "<td>{$r['noches']}</td>";
    echo "<td>" . number_format($descuentoMoneda, 2) . " €</td>";
    echo "<td>" . number_format($tasaTotal, 2) . " €</td>";
    echo "<td><strong>" . number_format($totalReserva, 2) . " €</strong></td>";
    echo "</tr>";
}

$granTotalRecaudado = 0;
?>

  <!-- 4. Renderizado y Bucle Foreach -->
  <table>
    <thead>
      <tr>
        <th>Cliente</th>
        <th>Tipo</th>
        <th>Noches</th>
        <th>Descuento</th>
        <th>Tasa Turística</th>
        <th>Total a Pagar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Bucle idéntico a las fotos[cite: 4, 7]
      foreach ($reservas as $r):
          $subtotalNoches = $r['noches'] * $r['precio_noche'];
          $porcentajeDesc = calcularDescuento($r['noches'], $r['tipo_cliente']);
          $descuentoMoneda = $subtotalNoches * $porcentajeDesc;
          $tasaTotal      = $r['noches'] * TASA_TURISTICA;
          $totalReserva   = ($subtotalNoches - $descuentoMoneda) + $tasaTotal;

          // Acumulamos el total general
          $granTotalRecaudado += $totalReserva;

          // Llamada a la función de renderizado
          imprimirFilaResumen($r, $descuentoMoneda, $tasaTotal, $totalReserva);
      endforeach;
      ?>
    </tbody>
  </table>

  <!-- Salida final idéntica a tu foto[cite: 4] -->
  <div class="total-box">
      <h3>Importe Total Recaudado: <?= number_format($granTotalRecaudado, 2) ?> €</h3>
  </div>
  
  <p style="margin-top:1.5rem;"><a href="formulario.html">← Volver al formulario</a></p>

</body>
</html>