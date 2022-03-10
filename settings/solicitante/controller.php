<?php
// Conexion a la base de datos
include_once("../../settings/db.php");
$connection = mysqli_connect($host, $user, $pw, $db);
mysqli_set_charset($connection, "utf8");

// Controlador para crear solicitante
if (isset($_POST['signup_solicitante'])) {

    $nombres = $_POST['names'];
    $apellidos = $_POST['lastnames'];
    $identificacion = $_POST['identificacion'];
    $telefono = $_POST['phone'];
    $direccion = $_POST['address'];
    $correo = $_POST['email'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password1 != $password2)
        header("Location: /views/solicitante/registroSolicitante.php?mensaje=3");
    else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario(`correo`, `nombres`, `apellidos`, `identificacion`, `password_usuario`) VALUES ('$correo','$nombres','$apellidos','$identificacion','$password')";
        //Ejecuta la consulta

        try {
            $resultado = mysqli_query($connection, $query);
        } catch (Exception) {
        }

        if (!$resultado) {
            header("Location: /views/solicitante/registroSolicitante.php?mensaje=1");
        } else {
            $sql = "SELECT usuario.usuario_id from usuario WHERE usuario.correo = '$correo'";
            $result = $connection->query($sql);
            $id_solicitante = $result->fetch_assoc()['usuario_id'];
            $query = "INSERT INTO solicitante(`solicitante_id`,`telefono`,`direccion`) VALUES ('$id_solicitante','$telefono','$direccion')";

            //Ejecuta la consulta
            $resultado = mysqli_query($connection, $query);
            if (!$resultado) {
                header("Location: /views/solicitante/registroSolicitante.php?mensaje=2");
            } else {
                //Con este comando retorna al login
                header("Location: /views/login.php?mensaje=4");
            }
        }
    }
}

//Controlador para crear trámite cita médica
if (isset($_POST['crear_cita'])) {
    session_start();
    $solicitante_id = $_SESSION['usuario_id'];
    $eps = $_POST['eps'];
    $regimen = $_POST['regimen'];
    $precio = $_POST['preciocita'];
    $estado_tramite = 'Espera';

    $especialidad = $_POST['especialidad'];
    $fecha_disponible = $_POST['fecha_disponible'];

    $query = "INSERT INTO tramite(solicitante_id, eps, regimen, precio, precio_ini, estado_tramite) VALUES ('$solicitante_id', '$eps', '$regimen', '$precio', '$precio', '$estado_tramite')";

    //Ejecuta la consulta
    $resultado = mysqli_query($connection, $query);

    if (!$resultado) {
        exit("Error");
    } else {
        $query = "SELECT MAX(tramite_id) AS max_id from tramite";
        $result = mysqli_query($connection, $query);
        $result = $result->fetch_assoc();
        $tramite_id = $result['max_id'];
        $query = "INSERT INTO tramite_citamedica(tramite_citamedica_id, especialidad, fecha_disponible) VALUES ('$tramite_id', '$especialidad', '$fecha_disponible')";
        $result = $connection->query($query);

        if (!$resultado) {
            header("Location: /views/solicitante/solicitanteMain.php?mensaje=1");
        }
        header("Location: /views/solicitante/solicitanteMain.php?mensaje=2");
    }
}

//Controlador para crear trámite medicamentos
if (isset($_POST['crear_medicamento'])) {

    // echo "medicamentos";

    session_start();
    $solicitante_id = $_SESSION['usuario_id'];
    $eps = $_POST['eps'];
    $regimen = $_POST['regimen'];
    $precio = $_POST['preciomedicamentos'];
    $estado_tramite = 'Espera';

    $medicamentos = $_POST['medicamentos'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $direccion_entrega = $_POST['direccion_entrega'];
    $direccion_recogida = $_POST['direccion_recogida'];

    $query = "INSERT INTO tramite(solicitante_id, eps, regimen, precio, precio_ini, estado_tramite) VALUES ('$solicitante_id', '$eps', '$regimen', '$precio', '$precio', '$estado_tramite')";

    //Ejecuta la consulta
    $resultado = mysqli_query($connection, $query);

    if (!$resultado) {
        exit("Error");
    } else {
        $query = "SELECT MAX(tramite_id) AS max_id from tramite";
        $result = mysqli_query($connection, $query);
        $result = $result->fetch_assoc();
        $tramite_id = $result['max_id'];
        $query = "INSERT INTO tramite_medicamentos(tramite_medicamentos_id, medicamentos, direccion_recogida, direccion_entrega, fecha_entrega) VALUES ('$tramite_id', '$medicamentos', '$direccion_recogida', '$direccion_entrega', '$fecha_entrega')";
        $result = $connection->query($query);

        if (!$resultado) {
            header("Location: /views/solicitante/solicitanteMain.php?mensaje=1");
        }
        header("Location: /views/solicitante/solicitanteMain.php?mensaje=2");
    }
}

// Controlador para la negociación
if (isset($_POST['negociar'])) {

    $tramite_id = $_POST['tramite_id'];
    $query = "UPDATE tramite t SET t.estado_tramite='Proceso' WHERE t.tramite_id=$tramite_id";
    //Ejecuta la consulta
    echo $query;

    try {
        $resultado = mysqli_query($connection, $query);
    } catch (Exception) {
    }

    if (!$resultado) {
        header("Location: /views/solicitante/solicitanteMain.php?mensaje=4");
    }
    header("Location: /views/solicitante/solicitanteMain.php?mensaje=3");
}

// Controlador para rechazar 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    $query = "UPDATE tramite t SET t.estado_tramite='Espera', t.tramitador_id=NULL, t.precio=t.precio_ini WHERE t.tramite_id=$id";
    $resultado = mysqli_query($connection, $query);

    if (!$resultado) {
        header("Location: /views/solicitante/solicitanteMain.php?mensaje=6");
    }
    header("Location: /views/solicitante/solicitanteMain.php?mensaje=5");
}
