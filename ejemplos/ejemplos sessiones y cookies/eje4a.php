<?php

session_start();

echo "La variable de sesión es: " . $_SESSION['contador'] . ".<br>";

echo "<br><a href='eje4.php'>Anterior</a>";
echo "<br><a href='eje4b.php'>Cerrar sesión</a>";