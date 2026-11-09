<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nombre']) && !empty($_POST['apellidos'])) {
        $_SESSION['nombre_usuario'] = $_POST['nombre'];
        $_SESSION['apellido_usuario'] = $_POST['apellidos'];
        header('Location: bienvenida.php');
        exit();
    } else {
        header('Location: formulario.html');
        exit();
    }
}
?>