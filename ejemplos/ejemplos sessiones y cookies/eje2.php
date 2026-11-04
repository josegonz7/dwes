<?php
session_start();

if (isset($_SESSION["usuario"])) {
    echo "Hola " . $_SESSION["usuario"] . "<br>";
}
else {
    echo "Aceso denegado. inicie sesión.<br>";
}
?>