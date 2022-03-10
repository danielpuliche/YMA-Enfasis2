<?php
$GLOBALS['mensaje'] = 'Solicitante';
// Validacion de la sesion
include("../../settings/sesiones.php");
include("../../templates/header.php");
include("../../templates/navbar.php");
include("../../templates/menu.php");
// Conexion a la base de datos
include("../../settings/db.php");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mis trámites</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <ul class="nav nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Cita Médica</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Medicamentos</a>
            </li>
        </ul>
    </section>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Eps</th>
                                    <th>Régimen</th>
                                    <th>Especialidad</th>
                                    <th>Fecha disponible</th>
                                    <th>Precio</th>
                                    <th>Documentos</th>
                                    <th>Estado</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $conn = mysqli_connect($host, $user, $pw, $db);
                                    $conn->set_charset("utf8");
                                    $id = $_SESSION['usuario_id'];
                                    $sql = "SELECT t.tramite_id, t.eps, t.regimen, tm.especialidad, tm.fecha_disponible, t.precio, t.estado_tramite FROM tramite t
                                INNER JOIN tramite_citamedica tm ON tm.tramite_citamedica_id=t.tramite_id
                                WHERE t.solicitante_id=$id AND (t.estado_tramite='Negociacion' OR t.estado_tramite='Espera' OR t.estado_tramite='Proceso')";
                                    $resultado = $conn->query($sql);
                                } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                while ($tramite = $resultado->fetch_assoc()) { ?>

                                    <tr>

                                        <td> <?php echo $tramite['eps']; ?> </td>
                                        <td> <?php echo $tramite['regimen']; ?> </td>
                                        <td> <?php echo $tramite['especialidad']; ?> </td>
                                        <td> <?php echo $tramite['fecha_disponible']; ?> </td>
                                        <td> <?php echo $tramite['precio']; ?> </td>
                                        <td> <a href="https://file-examples-com.github.io/uploads/2017/10/file-sample_150kB.pdf" target="_blank">Ver aquí</a> </td>
                                        <td> <?php echo $tramite['estado_tramite']; ?> </td>
                                        <td>
                                            <?php if ($tramite['estado_tramite'] == 'Negociacion') {
                                                echo '<a href="negociarTramite.php?id=', $tramite['tramite_id'], '&tipo=0" class="btn bg-primary btn-flat margin rounded">Elegir</a>';
                                            } ?>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot></tfoot>
                            <tr>
                                <th>Eps</th>
                                <th>Régimen</th>
                                <th>Especialidad</th>
                                <th>Fecha disponible</th>
                                <th>Precio</th>
                                <th>Documentos</th>
                                <th>Estado</th>
                                <th>Opción</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body">

                        <table id="myTable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Eps</th>
                                    <th>Régimen</th>
                                    <th>Medicamentos</th>
                                    <th>Fecha Entrega</th>
                                    <th>Precio</th>
                                    <th>Documentos</th>
                                    <th>Estado</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $conn = mysqli_connect($host, $user, $pw, $db);
                                    $conn->set_charset("utf8");
                                    $id = $_SESSION['usuario_id'];
                                    $sql = "SELECT t.tramite_id, t.eps, t.regimen, tm.medicamentos, tm.fecha_entrega, t.precio, t.estado_tramite FROM tramite t
                                INNER JOIN tramite_medicamentos tm ON tm.tramite_medicamentos_id=t.tramite_id
                                WHERE t.solicitante_id=$id AND (t.estado_tramite='Negociacion' OR t.estado_tramite='Espera' OR t.estado_tramite='Proceso')";
                                    $resultado = $conn->query($sql);
                                } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                while ($tramite = $resultado->fetch_assoc()) { ?>

                                    <tr>
                                        <td> <?php echo $tramite['eps']; ?> </td>
                                        <td> <?php echo $tramite['regimen']; ?> </td>
                                        <td> <?php echo $tramite['medicamentos']; ?> </td>
                                        <td> <?php echo $tramite['fecha_entrega']; ?> </td>
                                        <td> <?php echo $tramite['precio']; ?> </td>
                                        <td> <a href="https://file-examples-com.github.io/uploads/2017/10/file-sample_150kB.pdf" target="_blank">Ver aquí</a> </td>
                                        <td> <?php echo $tramite['estado_tramite']; ?> </td>
                                        <td>
                                            <?php if ($tramite['estado_tramite'] == 'Negociacion') {
                                                echo '<a href="negociarTramite.php?id=', $tramite['tramite_id'], '&tipo=1" class="btn bg-primary btn-flat margin rounded">Elegir</a>';
                                            } ?>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot></tfoot>
                            <tr>
                                <th>Eps</th>
                                <th>Régimen</th>
                                <th>Medicamentos</th>
                                <th>Fecha Entrega</th>
                                <th>Precio</th>
                                <th>Documentos</th>
                                <th>Estado</th>
                                <th>Opción</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<?php
include_once("../../templates/footer.php");
?>