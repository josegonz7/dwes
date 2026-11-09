<?php

include 'conexion.php';

session_start();

if (($_POST["usuario"]) && ($_POST["contrasena"] == "1234")) {
    $_SESSION["usuario"] = $_POST["usuario"];
    $_SESSION["contrasena"] = $_POST["contrasena"];

    header("Location: home.php"); 
} else {
    header("Location: index.php");
}
?> 