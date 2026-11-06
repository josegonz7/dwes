<?php

// crear una sesion  que almacene el nombre de usuario 
// y un enlace a una agina eje5a.php que muestre el noombre 
// de usuario. En la pafgina de destino, si no existe debe 
// mostrar el mensaje de incioo de sesion

session_start();

if (!isset($_SESSION['usuario'])) {
    echo "No hay sesión iniciada.";
    exit();
}

if (!isset($_SESSION[login_time])) {
    $_SESSION[login_time] = time();
}

if (time() - $_SESSION[login_time] > 300) {
    session_destroy();
    echo "<br>La sesión ha expirado.";
} else {
    echo "El nombre de usuario es: " . $_SESSION['usuario'];
}