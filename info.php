<?php   
    $unBoo1 = true;
    $unInt = 1;
    $unFloat = 1.0;
    $unString = "Hello World!";

    echo var_dump($unBoo1) . "<br>";
    echo var_dump($unInt) . "<br>";
    echo var_dump($unFloat) . "<br>";
    echo var_dump($unString) . "<br>";

    if (is_bool($unBoo1)) {
        echo "The variable is a boolean.<br>";
    } else {
        echo "The variable is not a boolean.<br>";
    }

    if (is_int($unInt)) {
        echo "The variable is an integer.<br>";
    } else {
        echo "The variable is not an integer.<br>";
    }

    if (is_float($unFloat)) {
        echo "The variable is a float.<br>";
    } else {
        echo "The variable is not a float.<br>";
    }

    if (is_string($unString)) {
        echo "The variable is a string.<br>";
    } else {
        echo "The variable is not a string.<br>";
    }

    $foo = (int)10;
    $bar = 20;
    $result = $foo + $bar;
    echo "The result of adding $foo and $bar is: $result<br>";
?>