<?php
include("../../settings/sesiones.php");
$GLOBALS['mensaje'] = 'Solicitante';
$GLOBALS['array_regimenes'] = [];
$GLOBALS['array_especialidades'] = [];
include("../../templates/header.php");
include("../../templates/navbar.php");
include("../../templates/menu.php");
include('../../settings/db.php');
// Validacion de la sesion
?>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Negociar precio</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        try {
            $conn = mysqli_connect($host, $user, $pw, $db);
            $conn->set_charset("utf8");
            $id = $_GET['id'];
            $tipo = $_GET['tipo'];
            if ($tipo == 0) {
                //0 = cita medica
                $sql = "SELECT u.nombres, u.apellidos, t.eps, t.regimen, tm.especialidad, tm.fecha_disponible, t.precio FROM tramite t
                INNER JOIN usuario u ON u.usuario_id=t.solicitante_id
                INNER JOIN tramite_citamedica tm ON tm.tramite_citamedica_id=t.tramite_id
                WHERE t.tramite_id=$id";
            } else {
                //1 = medicamento
                $sql = "SELECT u.nombres, u.apellidos, t.eps, t.regimen, tm.medicamentos, tm.fecha_entrega, t.precio FROM tramite t
                INNER JOIN usuario u ON u.usuario_id=t.solicitante_id
                INNER JOIN tramite_medicamentos tm ON tm.tramite_medicamentos_id=t.tramite_id
                WHERE t.tramite_id=$id";
            }
            $resultado = $conn->query($sql);
        } catch (Exception $e) {
            $error = $e->getMessage();
            echo $error;
        }
        $tramite = $resultado->fetch_assoc()
        ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <h4>Solicitante: <?php echo $tramite['nombres']; ?> <?php echo $tramite['apellidos']; ?></h4>
            </div>
            <div class="form-group col-md-6">
                <h4>Tipo de trámite: <?php if ($tipo == 0) {
                                            echo 'Cita Médica';
                                        } else {
                                            echo 'Solicitud Medicamentos';
                                        } ?></h4>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <h4>EPS: <?php echo $tramite['eps']; ?></h4>
            </div>
            <div class="form-group col-md-6">
                <h4>Régimen: <?php echo $tramite['regimen']; ?></h4>
            </div>
        </div>
        <?php
        if ($tipo == 0) {
            //0 = cita medica
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h4>Especialidad: <?php echo $tramite['especialidad']; ?></h4>
                </div>
                <div class="form-group col-md-6">
                    <h4>Fecha para programación: <?php echo $tramite['fecha_disponible']; ?></h4>
                </div>
            </div>
        <?php
        } else {
            //1 = medicamento
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h4>Medicamentos: <?php echo $tramite['medicamentos']; ?></h4>
                </div>
                <div class="form-group col-md-6">
                    <h4>Fecha de entrega: <?php echo $tramite['fecha_entrega']; ?></h4>
                </div>
            </div>
        <?php
        }
        ?>
        <form class="p-4" method="POST" action="/settings/solicitante/controller.php">
            <div class="d-flex justify-content-around align-items-center">
                <span id="val-min" style="display: none;"><?php echo $tramite['precio']; ?></span>
                <input style="pointer-events:none; background-color: #f4f6f9; font-size: 6em; width: 3em; border: 0px solid; color:black;" type="number" name="precio" id="precio" value="<?php echo $tramite['precio']; ?>" min="<?php echo $tramite['precio']; ?>" readonly required>
            </div>
            <div class="form-row">
                <div style="width:100%" class="d-flex justify-content-around align-items-center">
                    <input type="hidden" name="negociar" value="1">
                    <input type="hidden" name="tramite_id" value="<?php echo $id;?>">
                    <input type="submit" class="btn btn-lg btn-success" value="Aceptar"></input>
                    <a class="btn btn-lg btn-danger btn-rechazar" data-id="<?php echo $id; ?>" href="#" role="button">
                        <i data-id="<?php echo $id; ?>">Rechazar</i>
                    </a>
                </div>
            </div>
        </form>
    </section>
    <!-- /. Main content -->

    <script>
        $('.btn-rechazar').click((ev) => {
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
                    $(location).prop('href', `/settings/solicitante/controller.php?id=${id}`)
                }
            });
        });
    </script>

</div>
<!-- /.content-wrapper -->
<?php
include_once("../../templates/footer.php");
?>