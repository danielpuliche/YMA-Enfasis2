<?php
// Conexion a la base de datos
include_once("../settings/db.php");
$connection = mysqli_connect($host, $user, $pw, $db);
mysqli_set_charset($connection, "utf8");

// Controlador para login
if (isset($_POST['login'])) {

    $usuario = $_POST['user'];
    $password = $_POST['password'];

    try {
        $stmt = $connection->prepare("SELECT password FROM staff WHERE username = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($password_admin); //bind_result retorna los resultados de usar SELECT y permite asignarle en ese retorno las variables que se desean usar
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                if (password_verify($password, $password_admin)) {
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $stmt->close();
                    $connection->close();
                    header("Location: /index.php");
                }else{
                    $stmt->close();
                    $connection->close();
                    header("Location: /views/login.php?mensaje=1");
                }
            } else{
                $stmt->close();
                $connection->close();
                header("Location: /views/login.php?mensaje=1");
            }
        }else{
            $stmt->close();
            $connection->close();
            header("Location: /views/login.php?mensaje=1");
        }
    } catch (Exception $e) {
        // echo "Error: " . $e->getMessage();
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
    if(!$resultado){
        header("Location: /views/read.php?mensaje=2");
    }
    //Con este comando retorna a la página principal y muestra los datos
    header("Location: /views/read.php?mensaje=1");
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

// Controlador para borrar film
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM film WHERE film_id = $id";
    $resultado = mysqli_query($connection, $query);
    if(!$resultado){
        header("Location: /views/read.php?mensaje=2");
    }
    header("Location: /views/read.php?mensaje=1");
}

?>