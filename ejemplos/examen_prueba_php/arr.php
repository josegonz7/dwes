<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $productos = [

            [
                'id' => 1, 
                'nombre' => "Portátil", 
                'precio' => 1200.00, 
                'stock' => 1,
                'disponible' => true
            ],
            [
                'id' => 2, 
                'nombre' => "Ordenador", 
                'precio' => 2000.00, 
                'stock' => 2,
                'disponible' => true
            ]

        ];

        $productos[0]['precio'] = $productos[0]['precio'] * 0.90;

        function hay_stock($producto) {

            return $producto['stock'] > 0;

        }

        function vender($producto){

            $vendido = false;

            if(hay_stock($producto)){
                $producto['stock'] -= 1;
                $vendido = true;
            }

            return $vendido;

        }

        if($productos[0]['disponible']) {
            echo vender($productos[0]) ? "<p>Vendido.</p>" : "<p>No vendido.</p>";
        }

    ?>

    <h1>Productos</h1>
    <ul>
        <?php foreach($productos as $producto): ?>
            <li>Id: <?php echo $producto['id'] ?></li>
            <li>Nombre: <?php echo $producto['nombre'] ?></li>
            <li>Precio: <?php echo $producto['precio'] 
            ?></li>
            <li>Stock: <?php echo $producto['stock'] ?></li>
            <li>Disponible: <?php echo $producto['disponible'] ?></li>
            <br><br>
        <?php endforeach; ?>
    </ul>
</body>
</html>