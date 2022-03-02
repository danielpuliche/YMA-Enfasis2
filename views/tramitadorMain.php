<?php
    include("../templates/header.php");
    include("../templates/navbar.php");
    include("../templates/menu.php");
    include('../settings/db.php'); 
    // Validacion de la sesion
    include("../settings/sesiones.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tramitador</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Tarjetas Info -->
        <div class="row">

            <!-- col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Películas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <a href="/views/read.php" class="small-box-footer">More info  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /. Tarjetas Info -->


    </section>
    <!-- /. Main content -->
</div>
<!-- /.content-wrapper -->

<?php

include_once("../templates/footer.php");

?>