<?php
include("../../settings/sesiones.php");
$GLOBALS['mensaje'] = 'Tramitador';
$GLOBALS['array_regimenes'] = [];
$GLOBALS['array_especialidades'] = [];
include("../../templates/header.php");
include("../../templates/navbar.php");
include("../../templates/menu.php");
include('../../settings/db.php');
// Validacion de la sesion
?>

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
        <div class="form-row">
            <div class="form-group col-md-6">
                <h4>Especialidad: <?php echo $tramite['especialidad']; ?></h4>
            </div>
            <div class="form-group col-md-6">
                <h4>Fecha para programación: <?php echo $tramite['fecha_disponible']; ?></h4>
            </div>
        </div>
        <form class="p-4" method="POST" action="/settings/tramitador/controller.php">
            <div class="d-flex justify-content-around align-items-center">
                <img src="../../static/img/down.png" id="down" width="100em" alt="">
                <span id="val-min" style="display: none;"><?php echo $tramite['precio']; ?></span>
                <input style="pointer-events:none; background-color: #f4f6f9; font-size: 6em; width: 3em; border: 0px solid; color:black;" type="number" name="precio" id="precio" value="<?php echo $tramite['precio']; ?>" min="<?php echo $tramite['precio']; ?>" readonly required>
                <img src="../../static/img/up.png" id="up" width="100em" alt="">
            </div>
            <div class="form-row">
                <div style="width:100%" class="d-flex justify-content-around align-items-center">
                    <input type="hidden" name="negociar" value="1">
                    <input type="hidden" name="tramitador_id" value="<?php echo $_SESSION['usuario_id']; ?>">
                    <input type="hidden" name="tramite_id" value="<?php echo $id ?>">
                    <input type="submit" class="btn btn-lg btn-success" value="Aceptar"></input>
                    <a class="btn btn-lg btn-danger" href="#" role="button">Rechazar</a>
                </div>
            </div>
        </form>
    </section>
    <!-- /. Main content -->
</div>
<!-- /.content-wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(() => {
        $('#up').click(() => {
            $('#precio').val(parseInt($('#precio').val()) + 500);
        });
        $('#down').click(() => {
            let valMin = $('#val-min').html()
            if (parseInt($('#precio').val()) > parseInt(valMin)) {
                $('#precio').val(parseInt($('#precio').val()) - 500);
            }
        });
    });
</script>
<?php
include_once("../../templates/footer.php");
?>