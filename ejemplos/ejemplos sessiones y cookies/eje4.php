<?php

session_start();

if (isset($_SESSION['contador'])) {
    $_SESSION['contador']= 0;
} else {
    $_SESSION['contador']++;
}

echo "El contador de la sesión es: " . $_SESSION['contador'];
echo "<br><a href='eje4a.php'>Siguiente</a>";
echo "<br><a href='eje4b.php'>Cerrar sesión</a>";