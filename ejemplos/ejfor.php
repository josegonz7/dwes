<?php
    $people = array(
        array("name" => "Juan", "salt" => "1234"),
        array("name" => "María", "salt" => "5678"),
        array("name" => "Pedro", "salt" => "9012"),
        array("name" => "Ana", "salt" => "3456")
    );

    for ($i = 0; $i < count($people); $i++) {
        $people[$i]["salt"] = rand(1000, 9999); // Generar un nuevo valor de salt aleatorio    
        echo "Nombre: " . $people[$i]["name"] . ", Salt: " . $people[$i]["salt"] . "<br>";
    }
?>