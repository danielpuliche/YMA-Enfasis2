<?php
// Conexion a la base de datos
include_once("../settings/db.php");
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

// Controlador para editar film
if (isset($_POST['edit-film'])) {

    $id = $_POST['edit-film'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $language = $_POST['language'];
    $duration = $_POST['duration'];

    $query = "UPDATE film f SET f.description='$description', f.release_year=$year, f.language_id=$language, f.rental_duration=$duration WHERE f.film_id = $id";
    //Ejecuta la consulta
    $resultado = mysqli_query($connection, $query);
    if (!$resultado) {
        header("Location: /views/read.php?mensaje=2");
    }
    //Con este comando retorna a la página principal y muestra los datos
    header("Location: /views/read.php?mensaje=1");
}

// Controlador para borrar film
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM film WHERE film_id = $id";
    $resultado = mysqli_query($connection, $query);
    if (!$resultado) {
        header("Location: /views/read.php?mensaje=2");
    }
    header("Location: /views/read.php?mensaje=1");
}