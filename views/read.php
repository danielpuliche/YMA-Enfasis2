<?php
include("../templates/header.php");
include("../templates/navbar.php");
include("../templates/menu.php");
// Validacion de la sesion
include_once("../settings/sesiones.php");
// Conexion a la base de datos
include("../settings/db.php");
?>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Sweet Alert 2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_GET['mensaje'])) {
    if($_GET['mensaje']==1){
?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Wow...',
        text: 'Operación exitosa!',
    })
</script>
<?php
    }else{
?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Error al realizar la operación!',
    })
</script>
<?php
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista Películas</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gestion de películas </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Descripción</th>
                                    <th>Fecha de lanzamiento</th>
                                    <th>Lenguaje</th>
                                    <th>Duración</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $conn = mysqli_connect($host, $user, $pw, $db);
                                    $sql = "SELECT f.film_id, f.title, f.description, f.release_year, l.name as 'language', 
                                    f.rental_duration FROM film f INNER JOIN language l ON f.language_id = l.language_id ORDER BY f.description ASC";                                
                                    $resultado = $conn->query($sql);
                                } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                while ($registro = $resultado->fetch_assoc()) { ?>

                                    <tr>
                                        <td> <?php echo $registro['title']; ?> </td>
                                        <td> <?php echo $registro['description']; ?> </td>
                                        <td> <?php echo $registro['release_year']; ?> </td>
                                        <td> <?php echo $registro['language']; ?> </td>
                                        <td> <?php echo $registro['rental_duration']; ?> </td>
                                        <td> 
                                            <a href="edit.php?id=<?php echo $registro['film_id']; ?>" class="btn bg-primary btn-flat margin rounded">
                                                <i class="fa fa-pencil"></i>
                                            </a> 
                                        </td>
                                        <td>
                                            <a href="#" data-id="<?php echo $registro['film_id']; ?>" class="btn bg-danger btn-flat margin rounded btn-eliminar">
                                                <i class="fa fa-trash" data-id="<?php echo $registro['film_id']; ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                <?php } ?>
                            </tbody>
                            <tfoot></tfoot>
                                <tr>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fecha de lanzamiento</th>
                                <th>Lenguaje</th>
                                <th>Duración</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
    $('.btn-eliminar').click((ev)=>{
        let event = $(ev.target);
        let id = event.data('id');
        Swal.fire({
            title: '¿Estas seguro?',
            text: "No podrás revertir la acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(location).prop('href', `/settings/controller.php?id=${id}`)
            }
        });
    });
</script>

<?php
include_once("../templates/footer.php");
?>