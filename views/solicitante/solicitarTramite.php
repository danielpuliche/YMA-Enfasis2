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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Solicitar trámite</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <ul class="nav nav-pills mb-3 px-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Cita médica</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Medicamentos</a>
            </li>
        </ul>

        <!-- CAMBIANTE -->
        <div class="tab-content p-3" id="pills-tabContent">

            <!-- PILL 1 -->

            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                <!-- CABEZA -->
                <form class="p-4" method="POST" action="/settings/solicitante/controller.php">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">EPS</label>
                            <input type="text" class="form-control" name="eps" required>
                        </div>
                        <div class="form-group col-md-6">

                            <?php
                            try {
                                $conn = mysqli_connect($host, $user, $pw, $db);
                                $conn->set_charset("utf8");
                                $sql = "SELECT column_type FROM information_schema.COLUMNS WHERE table_schema = 'yma_database' AND TABLE_NAME = 'tramite'  AND column_name = 'regimen';";
                                $resultado = $conn->query($sql);
                                $registro = $resultado->fetch_assoc()['column_type'];
                                $registro = trim($registro, "enum");
                                $registro = trim($registro, "()");
                                $registro = explode(",", $registro);
                                $num_registro = count($registro);

                                for ($i = 0; $i < $num_registro; ++$i) {
                                    $array_regimenes[$i] = trim($registro[$i], "'");
                                }
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            ?>

                            <label for="inputState">Régimen</label>
                            <select name="regimen" class="form-control" required>
                                <option selected value="">Escoger...</option>
                                <?php
                                for ($i = 0; $i < count($array_regimenes); $i++) {
                                ?>
                                    <option value="<?php echo $array_regimenes[$i] ?>"><?php echo $array_regimenes[$i] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">

                        <?php
                        try {
                            $conn = mysqli_connect($host, $user, $pw, $db);
                            $conn->set_charset("utf8");
                            $sql = "SELECT column_type FROM information_schema.COLUMNS WHERE table_schema = 'yma_database' AND TABLE_NAME = 'tramite_citamedica'  AND column_name = 'especialidad';";
                            $resultado = $conn->query($sql);
                            $registro = $resultado->fetch_assoc()['column_type'];
                            $registro = trim($registro, "enum");
                            $registro = trim($registro, "()");
                            $registro = explode(",", $registro);
                            $num_registro = count($registro);
                            for ($i = 0; $i < $num_registro; ++$i) {
                                $array_especialidades[$i] = trim($registro[$i], "'");
                            }
                        } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                        }
                        ?>
                        <div class="form-group col-md-6"> <label for="inputState">Especialidad</label>
                            <select name="especialidad" class="form-control" required>
                                <option selected value="">Escoger...</option>
                                <?php
                                for ($i = 0; $i < count($array_especialidades); $i++) {
                                ?>
                                    <option value="<?php echo $array_especialidades[$i] ?>"><?php echo $array_especialidades[$i] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fecha_disponible">Fecha disponible</label>
                            <input type="date" class="form-control" name="fecha_disponible">
                        </div>

                    </div>

                    <br>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ingresar los documentos necesarios para el proceso</label>
                                <input type="file" class="form-control-file" name="filecita" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity">Ofrece un costo a pagar</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="number" class="form-control" name="preciocita" min=5000 value=5000 required>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4"> </div>
                        <div class="form-group col-md-4">
                            <input type="hidden" name="crear_cita" value="1">
                            <button type="submit" class="btn btn-primary btn-block">Pedir cita médica</button>
                        </div>
                        <div class="form-group col-md-4"> </div>
                    </div>

                </form>
            </div>

            <!-- PILL 2 -->

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <form class="p-4" method="POST" action="/settings/solicitante/controller.php">
                    <!-- CABEZA -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">EPS</label>
                            <input type="text" class="form-control" name="eps" required>
                        </div>
                        <div class="form-group col-md-6">

                            <?php
                            try {
                                $conn = mysqli_connect($host, $user, $pw, $db);
                                $conn->set_charset("utf8");
                                $sql = "SELECT column_type FROM information_schema.COLUMNS WHERE table_schema = 'yma_database' AND TABLE_NAME = 'tramite'  AND column_name = 'regimen';";
                                $resultado = $conn->query($sql);
                                $registro = $resultado->fetch_assoc()['column_type'];
                                $registro = trim($registro, "enum");
                                $registro = trim($registro, "()");
                                $registro = explode(",", $registro);
                                $num_registro = count($registro);

                                for ($i = 0; $i < $num_registro; ++$i) {
                                    $array_regimenes[$i] = trim($registro[$i], "'");
                                }
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            ?>

                            <label for="inputState">Régimen</label>
                            <select name="regimen" class="form-control" required>
                                <option selected value="">Escoger...</option>
                                <?php
                                for ($i = 0; $i < count($array_regimenes); $i++) {
                                ?>
                                    <option value="<?php echo $array_regimenes[$i] ?>"><?php echo $array_regimenes[$i] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="exampleFormControlTextarea1">Medicamentos</label>
                            <textarea class="form-control" name="medicamentos" rows="1" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha_entrega">Fecha entrega</label>
                            <input type="date" class="form-control" name="fecha_entrega">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="inputAddress">Dirección recogida</label>
                            <input type="text" class="form-control" name="direccion_recogida" placeholder="Calle 0 # 0-00" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="inputAddress">Dirección entrega</label>
                            <input type="text" class="form-control" name="direccion_entrega" placeholder="Calle 0 # 0-00" required>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ingresar los documentos necesarios para el proceso</label>
                                <input type="file" class="form-control-file" name="filemedicamentos" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity">Ofrece un costo a pagar</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="number" class="form-control" name="preciomedicamentos" min=5000 value=5000 required>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">

                        </div>
                        <div class="form-group col-md-4">
                            <input type="hidden" name="crear_medicamento" value="1">
                            <button type="submit" class="btn btn-primary btn-block">Pedir medicamentos</button>
                        </div>
                        <div class="form-group col-md-4">

                        </div>
                    </div>

                </form>

            </div>

        </div>



</div>


</section>
<!-- /. Main content -->

</div>
<!-- /.content-wrapper -->

<?php
include_once("../../templates/footer.php");
?>