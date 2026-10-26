<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $x = 10;

        $x += 5;

        echo $x;

        echo ($x >= 15) ? "<br/> es mayor": "<br/> es menor";

        if ($x === 15) {
            echo " <br/> es 15";
        } else {
            echo "<br/> no es 15";
        }

        $nombreUsuario = "hola";
        $user = $nombreUsuario ?? "sin-nombre";
        $user = ($nombreUsuario != null) ? $nombreUsuario : "sin-nombre";
        echo "<br/>".$user;
    ?>
</body>
</html>