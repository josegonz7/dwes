<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $var="hola";
        echo $var;
        $var2 = "";  
        echo isset($var2);

        //isset es true si existe la variable, 
        // no es null y no esta vacia 
        // (es cadena vacia o un valor de incio)
        
        // isset es falso si no existe la variable o es null

        unset($var2);
        echo isset($var2);

        $var3 = trim("  asd "); // quita los espacios en blanco de alante y atras
        if(empty($var3)) {
            echo "esta vacia";
        } else {
            echo "esta llena";
        }
        echo "<br/>";
        var_dump($var3);
    ?>
</body>
</html>