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
                    <h1>Negociar precio</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form class="p-4" method="POST" action="/settings/solicitante/controller.php">

        <div class="form-row">
            <div class="form-group col-md-6">
                <h3>Solicitante</h3>
            </div>
            <div class="form-group col-md-6">
                <h3>Solicitante</h3>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <h3>Solicitante</h3>
            </div>
            <div class="form-group col-md-6">
                <h3>Solicitante</h3>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <h3>Solicitante</h3>
            </div>
            <div class="form-group col-md-6">
                <h3>Solicitante</h3>
            </div>
        </div>
    </form>
        <div class="d-flex justify-content-around align-items-center">
            <img src="../../static/img/down.png" id="down" width="100em" alt="">
            <input style="font-size: 6em; width: 3em; border: 0px solid; color:black;" type="number" name="" id="precio" value="8000" disabled>
            <img src="../../static/img/up.png" id="up" width="100em" alt="">
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $( document ).ready(()=>{
                $('#up').click(()=>{
                    $('#precio').val(parseInt($('#precio').val()) + 500);
                });
                $('#down').click(()=>{
                    $('#precio').val(parseInt($('#precio').val()) - 500);
                });
            });
        </script>
        <div>
            <form class="p-4" method="POST" action="/settings/solicitante/controller.php">
                <div class="form-row">
                    <div style="width:100%" class="d-flex justify-content-around align-items-center">
                        <input type="hidden" name="negociar" value="1">
                        <input type="submit" class="btn btn-lg btn-success" value="Aceptar"></input>
                        <a class="btn btn-lg btn-danger" href="#" role="button">Rechazar</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /. Main content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once("../../templates/footer.php");
?>