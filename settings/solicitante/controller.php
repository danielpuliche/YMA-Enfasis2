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
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO usuario(`correo`, `nombres`, `apellidos`, `identificacion`, `password_usuario`) VALUES ('$correo','$nombres','$apellidos','$identificacion','$password')";
    //Ejecuta la consulta

    try{
        $resultado = mysqli_query($connection, $query);
    } catch(Exception){
    }

    if (!$resultado) {
        header("Location: /views/solicitante/registroSolicitante.php?mensaje=2");
    }else{
        $sql = "SELECT usuario.usuario_id from usuario WHERE usuario.correo = '$correo'";
        $result = $connection->query($sql);
        $id_solicitante = $result->fetch_assoc()['usuario_id'];
        $query = "INSERT INTO solicitante(`usuario_id`,`telefono`,`direccion`) VALUES ('$id_solicitante','$telefono','$direccion')";

        //Ejecuta la consulta
        $resultado = mysqli_query($connection, $query);
        if (!$resultado) {
            header("Location: /views/solicitante/registroSolicitante.php?mensaje=3");
        }else{
            //Con este comando retorna al login
            header("Location: /views/login.php?mensaje=4");
        }
    }
}

//Controlador para crear trámite
if (isset($_POST['crear_cita'])) {

    $solicitante_id = $_SESSION['usuario_id'];
    $eps = $_POST['eps'];
    $regimen = $_POST['regimen'];
    $precio = $_POST['precio'];
    $estado_tramite = 'Espera';
    $especialidad = $_POST['precio'];
    $fecha_disponible = $_POST['fecha_disponible'];

    $query = "INSERT INTO tramite(solicitante_id, eps, regimen, precio, estado_tramite) VALUES ($solicitante_id, $eps, $regimen, $precio, $estado_tramite)";
    
    //Ejecuta la consulta
    $resultado = mysqli_query($connection, $query);

    if (!$resultado) {
        exit("Error");
    }else{
        $query = "SELECT MAX(tramite_id) from tramite";
        $result = mysqli_query($connection, $query);
        $tramite_id = $result->fetch_assoc()['tramite_id'];
        
        $query = "INSERT INTO tramite_citamedica(tramite_citamedica_id, especialidad, fecha_disponible) VALUES ($tramite_id, $especialidad, $fecha_disponible)";        
        $result = $connection->query($sql);
        
        if (!$result) {
            exit("Error");
        }else{
            //Con este comando retorna al login
            header("Location: ../../views/solicitante/historialTramites.php");
        }
    }
}











// Controlador para crear film
if (isset($_POST['agregar-film'])) {
        
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['description'];
    $year = $_POST['year'];
    $lenguaje = $_POST['language'];
    $duration = $_POST['duration'];
    $query = "INSERT INTO film (title, description, release_year, language_id, rental_duration) VALUES ('$titulo', '$descripcion', $year ,$lenguaje, $duration)";
    //Ejecuta la consulta
    $resultado = mysqli_query($connection, $query);
    if(!$resultado){
        header("Location: /views/read.php?mensaje=2");
    }
    //Con este comando retorna a la página principal y muestra los datos
    header("Location: /views/read.php?mensaje=1");
}
