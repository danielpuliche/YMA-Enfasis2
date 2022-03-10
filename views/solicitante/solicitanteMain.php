<?php
include("../../settings/sesiones.php");
$GLOBALS['mensaje'] = 'Solicitante';
include("../../templates/header.php");
include("../../templates/navbar.php");
include("../../templates/menusolicitante.php");
include('../../settings/db.php');
// Validacion de la sesion

?>

<?php
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] == 1) {
?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Solicitud fallida!',
            })
        </script>
    <?php
    } elseif ($_GET['mensaje'] == 2) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Solicitud realizada correctamente!',
            })
        </script>
    <?php
    } elseif ($_GET['mensaje'] == 3) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Proceso en marcha!',
            })
        </script>
    <?php
    } elseif ($_GET['mensaje'] == 4) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Proceso no pudo ser iniciado!',
            })
        </script>
    <?php
    } elseif ($_GET['mensaje'] == 5) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Oferta rechazada!',
            })
        </script>
    <?php
    } elseif ($_GET['mensaje'] == 6) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se pudo rechazar la oferta!',
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos no válidos!',
            })
        </script>
<?php
    }
}
?>

<head>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="./static/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="./static/css/responsive.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="./static/css/jquery.mCustomScrollbar.min.css">
    <!-- fevicon -->
    <link rel="shortcut icon" type="image/png" href="./static/img/favicon.png">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="../../static/img/Slide.png" width="100%" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>
                                <FONT COLOR="White">BIENVENIDO</FONT>
                                <br>
                            </h1>
                            <p><B>
                                    <FONT COLOR="white"></FONT>
                                </B></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="../../static/img/medicinas.png" width="100%" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>
                                <FONT COLOR="white">¿Necesitas un trámite?</FONT>
                                <br>
                            </h1>
                            <p><B>
                                    <FONT COLOR="white">Especialistas en atender todas tus solicitudes</FONT>
                                </B></p>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="../../static/img/desarrollo-medicamento.png" width="100%" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>
                                <FONT COLOR="white">Solicita tus medicamentos o Citas Medicas</FONT>

                            </h1>
                            <br></h1>
                            <p><B>
                                    <FONT COLOR="white">Desde la comodidad de tu hogar</FONT>
                                </B></p>

                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>
    <section class="content">

        <!-- Tarjetas Info -->
        <div class="row pt-4 px-2">

            <!-- col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Historial de trámites</p>
                    </div>
                    <a href="historialTramites.php" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Mis trámites</p>
                    </div>
                    <a href="tramitesProceso.php" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Solicitar trámite</p>
                    </div>
                    <a href="solicitarTramite.php" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <!-- /. Tarjetas Info -->


    </section>
    <!-- /. Main content -->
</div>
<!-- /.content-wrapper -->

<?php

include_once("../../templates/footer.php");

?>