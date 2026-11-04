
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Resumen de Reservas</title>
  <style>
    body { font-family: system-ui, sans-serif; max-width: 950px; margin: 2rem auto; padding: 0 1rem; }
    table { border-collapse: collapse; width: 100%; margin-top: 1rem; }
    th, td { border: 1px solid #ccc; padding: 0.5rem; text-align: left; }
    thead th { background: #e9ecef; }
    .badge-vip { background: #ffe8cc; color: #d9480f; padding: 0.2rem 0.4rem; border-radius: 4px; font-weight: bold; }
    .badge-std { background: #e7f5ff; color: #1864ab; padding: 0.2rem 0.4rem; border-radius: 4px; }
    .total-box { margin-top: 1.5rem; padding: 1rem; background: #f1f3f5; border-left: 5px solid #0066cc; }
  </style>
</head>
<body>


  <h1>Resumen de Facturación de Reservas</h1>


  <?php
  // FALTA: CE3.f: Verificación del método de envío POST y presencia de datos
	if (!$_SERVER["REQUEST_METHOD"] == "POST") { // condicion para ver si el formulario es del metodo post
		// error
		echo "Error";
	}

  // FALTA: CE2.g: Constante de tasa turística fija
	define("TASA_TURISTICA", 2.50); // constante

  // FALTA: CE2.h: Variable global moneda
	$moneda = "€"; // Variable global

  // FALTA: CE3.f / CE3.c: Recuperación, tipado, sanitización y creación de arrays asociativos

	$cliente = $_POST($Huesped[]);
	$noches = $_POST($Noche[]);
	$precio_noche = $_POST($Precio/Noche[]);
	$tipo_cliente = $_POST($tipoCliente[]);

	$reserva[];
	$total[
	 	$cliente,
	 	$noches,
	 	$precio_noche,
		$tipo_cliente
	];

	for (int $i = 0; $i > total; $i++) {
		
		$cliente = $_POST(trim($Huesped[i]));
		$noches = $_POST(int($Noche[i]));
		$precio_noche = $_POST(float($PrecioNoche[i]));
		$tipo_cliente = $_POST(htmlspecialchars($tipo_cliente[i]));
		
		if (!$cliente == "" && !$noches < 0 && !precio_noche < 0 && !tipo_cliente == "") {
			$reserva = [
				$cliente[i];
				$noches =[i];
				$precio_noche[i];
				$tipo_cliente [i];
			];
		}
		
	}


  /**
   * FALTA: CE3.d + CE3.a: Función calcularDescuento con lógica para determinar el porcentaje de descuento
   */
	
	function calcularDescuento(int $noches, string $tipo_cliente): float {
		$descuento; // declaramos varable descuento
		
		// condiciones para poner un valor a descuento
		if ($reserva["noches"] > 7 || $reserva['tipo_cliente'] === 'vip') {
			$descuento = 0.20;
		}
		else if ($reserva["noches"] =< 7 && $reserva["noches"] >= 4 || $reserva['tipo_cliente'] === 'estandar') {
			$descuento = 0.10;
		}
		else {
			$descuento = 0.00;
		}
		return $descuento;
	}

  /**
   * FALTA: CE2.h + CE3.d: Función imprimirFilaResumen que utiliza ámbito global y ámbito estático
   */
  function imprimirFilaResumen(array $reserva, float $descuentoMoneda, float $tasaTotal, float $totalFinal): void {
      // FALTA: CE2.h: Uso explícito del ámbito global de $moneda
		
		global $moneda; // variable global

      // FALTA: CE2.h: Variable estática para conteo persistente

		// variable static
		static $numeroReserva = 1;
		$claseBadge = ($reserva['tipo_cliente'] === 'vip') ? 'badge-vip' : 'badge-std';
		$textoTipo  = strtoupper($reserva['tipo_cliente']);

        // FALTA: rellenar la tabla

	// elementos de la fila
      echo "<tr>";
      echo "<td><strong>Nº</strong></td>";
      echo "<td>$reserva["cliente"]</td>";
      echo "<td>$reserva["noches"]</td>";
      echo "<td>$reserva["precio_noche"]</td>";
      echo "<td><span class='{$claseBadge}'>{$textoTipo}</span></td>";
      echo "<td>$descuentoMoneda</td>";
      echo "<td>$tasaTotal</td>";
      echo "<td><strong>$totalReserva</strong></td>";
      echo "</tr>";


        // FALTA: Incrementa la variable estática para la siguiente llamada
		$numeroReserva++; // Incrementamos
  }


  $granTotalRecaudado = 0.0;
  ?>


  <table>
    <thead>
      <tr>
        <th>Nº</th>
        <th>Huésped</th>
        <th>Noches</th>
        <th>Precio/Noche</th>
        <th>Tipo Cliente</th>
        <th>Descuento</th>
        <th>Tasa Turística</th>
        <th>Total a Pagar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // FALTA: CE3.b: Recorrido del array asociativo mediante foreach
     
			foreach ($reserva as $r){ // for each
				$subtotal = $r["noches"] * $r["precio_noche"];
				$descuentoMoneda = $subtotal * calcularDescuento(int $noches, string $tipoCliente);
				$tasaTotal = $r["noches"] * $TASA_TURISTICA;
				$totalReserva = $tasaTotal + ($subtotal - calcularDescuento(int $noches, string $tipoCliente));
			}
          // FALTA: Acumulamos el total general
			$granTotalRecaudado = $totalReserva; // acumulamos
			
          // Llamada a la función de renderizado
          imprimirFilaResumen($r, $descuentoMoneda, $tasaTotal, $totalReserva);
      ?>
    </tbody>
  </table>


  <div class="total-box">
    <h3>Importe Total Recaudado: <?= number_format($granTotalRecaudado, 2) . " " . $moneda ?></h3>
  </div>


  <p style="margin-top:1.5rem;"><a href="formulario.html">← Volver al formulario</a></p>


</body>
</html>
