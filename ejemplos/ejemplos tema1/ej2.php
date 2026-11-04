<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function test() {
        $foo = "variable local";
        echo '$foo en contexto local: ' .  $foo;
        echo '<br/> $foo en contexto global: ' . $GLOBALS["foo"];        
    }
    $foo = "variable global";
    test();

    $foo2 = "segunda variable global";
    
    function test2() {
        global $foo2;

        echo '<br/> $foo en contexto global: ' . $foo2;        
    }
    test2();
    ?>
</body>
</html>