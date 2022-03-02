<?php
$host = 'localhost';
$user = 'root';
$pw = '';
$db = 'yma_database';
$connection = mysqli_connect($host, $user, $pw, $db);

if($connection){
    // echo 'La bd tareas_db está conectada';
    // var_dump($connection);
}else{
    exit('No se pudo conectar');
}
mysqli_set_charset($connection, "utf8");
?>
