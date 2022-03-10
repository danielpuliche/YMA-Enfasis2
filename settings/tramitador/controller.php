<?php
// Conexion a la base de datos
include_once("../../settings/db.php");
$connection = mysqli_connect($host, $user, $pw, $db);
mysqli_set_charset($connection, "utf8");

// Controlador para crear tramitador
if (isset($_POST['signup_tramitador'])) {

    $nombres = $_POST['names'];
    $apellidos = $_POST['lastnames'];
    $identificacion = $_POST['identificacion'];
    $correo = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if ($password != $password2)
        header("Location: /views/tramitador/registroTramitador.php?mensaje=3");
    else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario(`correo`, `nombres`, `apellidos`, `identificacion`, `password_usuario`) VALUES ('$correo','$nombres','$apellidos','$identificacion','$password')";
        //Ejecuta la consulta

        try {
            $resultado = mysqli_query($connection, $query);
        } catch (Exception) {
        }

        if (!$resultado) {
            header("Location: /views/tramitador/registroTramitador.php?mensaje=1");
        } else {
            $sql = "SELECT usuario.usuario_id from usuario WHERE usuario.correo = '$correo'";
            $result = $connection->query($sql);
            $id_tramitador = $result->fetch_assoc()['usuario_id'];
            $query = "INSERT INTO tramitador(`tramitador_id`) VALUES ('$id_tramitador')";

            //Ejecuta la consulta
            $resultado = mysqli_query($connection, $query);
            if (!$resultado) {
                header("Location: /views/tramitador/registroTramitador.php?mensaje=2");
            } else {
                //Con este comando retorna al login
                header("Location: /views/login.php?mensaje=4");
            }
        }
    }
}

// Controlador para la negociación
if (isset($_POST['negociar'])) {

    $tramitador_id = $_POST['tramitador_id'];
    $tramite_id = $_POST['tramite_id'];
    echo $tramite_id;
    $precio = $_POST['precio'];
    $query = "UPDATE tramite t SET t.tramitador_id=$tramitador_id, t.precio=$precio, t.estado_tramite='Negociacion' WHERE t.tramite_id=$tramite_id";
    //Ejecuta la consulta
    echo $query;

    try {
        $resultado = mysqli_query($connection, $query);
    } catch (Exception) {
    }

    if (!$resultado) {
        header("Location: /views/tramitador/tramitadorMain.php?mensaje=1");
    }
    header("Location: /views/tramitador/tramitadorMain.php?mensaje=2");
}
