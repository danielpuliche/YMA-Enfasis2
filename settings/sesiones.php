<?php

function usuario_autenticado() {
    if (!revisar_usuario()) {
        # code...
        header('location: /views/login.php?mensaje=1');
        exit();
    }
}

function revisar_usuario() {
    return isset($_SESSION['usuario']);
}

session_start();
usuario_autenticado();

?>