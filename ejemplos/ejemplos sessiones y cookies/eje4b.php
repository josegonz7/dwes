<?php

session_start();

$_SESSION = array();

session_destroy();

echo "<br><a href='eje4.php'>Abrir sesión</a>";