<?php
// Conexion a la base de datos
include_once("../settings/db.php");
$connection = mysqli_connect($host, $user, $pw, $db);
mysqli_set_charset($connection, "utf8");

// Controlador para login
if (isset($_POST['login'])) {

    $correo = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $connection->prepare("SELECT password_usuario FROM usuario WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->bind_result($password_gotten); //bind_result retorna los resultados de usar SELECT y permite asignarle en ese retorno las variables que se desean usar
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                if (password_verify($password, $password_gotten)) {
                    $stmt->close();
                    $sql = "SELECT tramitador.tramitador_id from tramitador,usuario WHERE (usuario.correo = '$correo' AND tramitador.tramitador_id=usuario.usuario_id)";
                    $result = $connection->query($sql);
                    $id = $result->fetch_assoc();
                    if ($id != null) {
                        session_start();
                        $_SESSION['usuario'] = $correo;
                        $connection->close();
                        header("Location: /views/tramitador/tramitadorMain.php");
                    } else {
                        $sql = "SELECT solicitante.solicitante_id from solicitante,usuario WHERE (usuario.correo = '$correo' AND solicitante.solicitante_id=usuario.usuario_id)";
                        $result = $connection->query($sql);
                        $id = $result->fetch_assoc();
                        if ($id != null) {
                            session_start();
                            $_SESSION['usuario'] = $correo;
                            $connection->close();
                            header("Location: /views/solicitante/solicitanteMain.php");
                        } else {
                            echo 'xD';
                        }
                    }
                } else {

                    $connection->close();
                    header("Location: /views/login.php?mensaje=1");
                }
            } else {
                $stmt->close();
                $connection->close();
                header("Location: /views/login.php?mensaje=2");
            }
        } else {
            $stmt->close();
            $connection->close();
            header("Location: /views/login.php?mensaje=3");
        }
    } catch (Exception $e) {
        // echo "Error: " . $e->getMessage();
    }
}

// Controlador para crear tramitador
if (isset($_POST['signup_tramitador'])) {

    $nombres = $_POST['names'];
    $apellidos = $_POST['lastnames'];
    $identificacion = $_POST['identificacion'];
    $correo = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO usuario(`correo`, `nombres`, `apellidos`, `identificacion`, `password_usuario`) VALUES ('$correo','$nombres','$apellidos','$identificacion','$password')";
    //Ejecuta la consulta

    try {
        $resultado = mysqli_query($connection, $query);
    } catch (Exception) {
    }

    if (!$resultado) {
        header("Location: /views/tramitador/registroTramitador.php?mensaje=2");
    } else {
        $sql = "SELECT usuario.usuario_id from usuario WHERE usuario.correo = '$correo'";
        $result = $connection->query($sql);
        $id_tramitador = $result->fetch_assoc()['usuario_id'];
        $query = "INSERT INTO tramitador(`usuario_id`) VALUES ('$id_tramitador')";

        //Ejecuta la consulta
        $resultado = mysqli_query($connection, $query);
        if (!$resultado) {
            header("Location: /views/tramitador/registroTramitador.php?mensaje=3");
        } else {
            //Con este comando retorna al login
            header("Location: /views/login.php?mensaje=4");
        }
    }
}

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

    try {
        $resultado = mysqli_query($connection, $query);
    } catch (Exception) {
    }

    if (!$resultado) {
        header("Location: /views/solicitante/registroSolicitante.php?mensaje=2");
    } else {
        $sql = "SELECT usuario.usuario_id from usuario WHERE usuario.correo = '$correo'";
        $result = $connection->query($sql);
        $id_solicitante = $result->fetch_assoc()['usuario_id'];
        $query = "INSERT INTO solicitante(`usuario_id`,`telefono`,`direccion`) VALUES ('$id_solicitante','$telefono','$direccion')";

        //Ejecuta la consulta
        $resultado = mysqli_query($connection, $query);
        if (!$resultado) {
            header("Location: /views/solicitante/registroSolicitante.php?mensaje=3");
        } else {
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
