<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        define("NOMBRE","jose");
        // echo NOMBRE;
    ?>


    <?php
        echo mostrarNombre();
    ?>

    <?php
        function mostrarNombre() {
            return NOMBRE;
        }
    ?>
</body>
</html>