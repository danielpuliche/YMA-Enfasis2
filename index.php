<?php
session_start();
if (isset($_GET['cerrar_sesion'])) {
   session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Favicon -->
   <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i109565/cjdowner/cryptocurrency-flat/ICON-ICX.ico" />
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>YMA - Your Medical Assistant</title>
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

   <style>
      .bg {
         background: #281e5d;
      }
   </style>

</head>
<!-- body -->

<body class="main-layout" style="  min-height: 100vh;
               max-width: 100%;
               margin: 0 auto;">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="static/img/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="bg">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-7 col-lg-7 col-md-6 col-sm-6">
                  <div class="center-desk">
                     <div> <a style="color:#FFFFFF;" class="inicio" href="#">
                           <FONT SIZE=6>YMA</FONT>
                        </a> </div>
                  </div>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                  <div class="row py-3">
                     <div class="col-5 col-md-4  px-4">
                        <a class="sesion text-center" style="color:#FFFFFF;" href="views/solicitante/registroSolicitante.php">
                           <FONT SIZE=2>??Solicitante nuevo?</FONT>
                        </a>
                     </div>
                     <div class="col-5 col-md-4 px-4">
                        <a class="sesion text-center" style="color:#FFFFFF;" href="views/tramitador/registroTramitador.php">
                           <FONT SIZE=2>??Tramitador nuevo?</FONT>
                        </a>
                     </div>
                     <div class="col-2 col-md-4">
                        <a class="sesion text-center" style="color:#FFFFFF;" href="views\login.php">
                           <FONT SIZE=2>Iniciar Sesi??n</FONT>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end header inner -->
   </header>
   <!-- end header -->
   <section class="slider_section">
      <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="first-slide" src="static/img/tramite.jpg" width="100%" alt="First slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1>
                        <FONT COLOR="White">??Necesitas un tr??mite?</FONT>
                        <br>
                     </h1>
                     <p><B>
                           <FONT COLOR="white">Pidelo aqu?? r??pido y al instante</FONT>
                        </B></p>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="second-slide" src="static/img/negocia.jpg" width="100%" alt="Second slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1>
                        <FONT COLOR="white">Brindamos la conexi??n con nuestros tramitadores</FONT>
                        <br>
                     </h1>
                     <p><B>
                           <FONT COLOR="white">Especialistas en atender todas tus solicitudes</FONT>
                        </B></p>

                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="third-slide" src="static/img/pagos.jpg" width="100%" alt="Third slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1>
                        <FONT COLOR="white">Todo al alcance de tus manos</FONT>

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

   <!-- about  -->
   <div id="about" class="center ">
      <div class="py-5"></div>
      <div class="container-fluid">
         <div class="row-xl-10 py-5">
            <div class="col-md-12">
               <div class="text-center">
                  <h1><strong>
                        <FONT SIZE=7 COLOR="black" WEIGHT="bold">Descripci??n del sistema</FONT>
                     </strong></h1>
                  <hr width=300 noshade="noshade" size=2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-7 noticia">
               <div class="img-box">
                  <figure><img src="static/img/Slide.png" width="800" alt="img" align="left" /></figure>
               </div>
            </div>
            <div class="col-xl-5 row pt-5">
               <div class="indentacion right col-md-12 pt-5">
                  <aside>El proyecto YMA de la Universidad del Cauca, consiste en un sistema que permite la conexi??n entre solicitantes
                     y tramitadores, esto con el find de lograr una mayor facilidad a la hora de realizar tus tr??mites m??dicos
                     desde la comodidad de tu hogar, a la vez que ayuda a generar empleos y fomentar el mejoramiento de los sistemas de la salud.</aside>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end abouts -->

   <!-- about  -->
   <div id="about" class="center about top_layer">
      <hr width=100%>
      <div class="container-fluid">
         <div class="row-xl-10 py-5">
            <div class="col-md-12">
               <div class="text-center">
                  <h1><strong>
                        <FONT SIZE=7 COLOR="black" WEIGHT="bold">Servicios</FONT>
                     </strong></h1>
               </div>
               <hr width=300 noshade="noshade" size=2>
            </div>
         </div>
         <div class="row py-1">
            <div class="col-xl-7 noticia">
               <div class="img-box">
                  <figure><img src="static/img/servicios.png" width="680" alt="img" align="center" /></figure>
               </div>
            </div>
            <div class="col-xl-5">
               <div class="indentacion right col-md-12 text-center py-5">
                  <h1><strong>
                        <FONT SIZE=5 COLOR="black" WEIGHT="bold">Citas M??dicas</FONT>
                     </strong></h1>
               </div>
               <div class="indentacion right col-md-12 text-left py-3">
                  <ul>Se brinda la oportunidad de tener un tramitador al alcance de tu mano, o de convertirte en uno!</u>
                     <ul>Se genera<i> comodidad </i> y se <i> impulsa el empleo y desarrollo del pa??s </i> .</ul>
               </div>
               <div class="img-box py-5">
                  <a href="views/solicitante/registroSolicitante.php">Crea Cita</a>
               </div>
            </div>
         </div>
         <div class="row py-5">
            <div class="py-5" VSPACE="50"></div>
            <div class="py-5" VSPACE="50"></div>
            <div class="col-xl-7 noticia">
               <div class="img-box">
                  <figure><img src="static/img/farmacia.jpg" width="670" alt="img" align="center" /></figure>
               </div>
            </div>
            <div class="col-xl-5">
               <div class="indentacion right col-md-12 text-center py-5">
                  <h1><strong>
                        <FONT SIZE=5 COLOR="black" WEIGHT="bold">Reclamo de Medicamentos</FONT>
                     </strong></h1>
               </div>
               <div class="indentacion right col-md-12 text-left py-3">
                  <ul>Se brinda la oportunidad de tener un tramitador al alcance de tu mano, o de convertirte en uno!</u>
                     <ul>Se genera<i> comodidad </i> y se <i> impulsa el empleo y desarrollo del pa??s </i> .</ul>
               </div>
               <div class="img-box py-5">
                  <a href="views/solicitante/registroSolicitante.php">Solicita Medicamentos</a>
               </div>
            </div>
         </div>
         <hr width=100%>
      </div>
   </div>
   <!-- end abouts -->

   <!-- about  -->
   <div id="about" class="center">
      <div class="container-fluid">
         <div class="row-xl-10 py-5">
            <div class="col-md-12">
               <div class="text-center">
                  <h1><strong>
                        <FONT SIZE=7 COLOR="black" WEIGHT="bold">??Quienes somos?</FONT>
                     </strong></h1>
                  <hr width=300 noshade="noshade" size=2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-7 noticia">
               <div class="img-box">
                  <figure><img src="static/img/collage.png" width="700" alt="img" align="center" /></figure>
               </div>
            </div>
            <div class="col-xl-5 row pt-5">
               <div class="indentacion right col-md-12 pt-5">
                  <aside><br>Somos un grupo de cuatro (4) estudiantes de octavo semestre de la Universidad del Cauca,
                     con el objetivo de crear un proyecto que suministre a los ciudadanos la oportunidad de tener
                     un tramitador al alcance de su mano, o de convertirte en uno!. De esta forma se genera<i> comodidad </i>
                     y se <i> impulsa el empleo y desarrollo del pa??s </i> .</aside>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- end abouts -->

   <a type="button" class="text-center pt-3" href="#" style="background-color:#484295; min-height: 8vh; width: 100%; color:#FFFFFF; vertical-align: middle; justify-content: center;">Inicio P??gina</a>
   <!-- about  -->
   <div class="bg py-5">
      <div class="container-fluid pb-2">
         <div class="row py-5">
            <div class="col-1"></div>
            <div class="col-2 px-4" style="color:#FFFFFF;">
               <ol>
                  <li><strong>Con??cenos</strong></li>
                  <li>Segundo elemento de la lista</li>
                  <li>Tercer elemento de la lista</li>
               </ol>
            </div>
            <div class="col-3 px-5" style="color:#FFFFFF;">
               <ol>
                  <li><strong>Gana Dinero con Nosotros</strong></li>
                  <li><a class="sesion" href="views/tramitador/registroTramitador.php" style="color:#FFFFFF;">Vuelvet?? Tramitador</a></li>
                  <li><br></br></li>
                  <li><strong>Realiza Tramites con Nosotros</strong></li>
                  <li><a class="sesion" href="views/solicitante/registroSolicitante.php" style="color:#FFFFFF;">Solicita tu cita medica</a></li>
                  <li><a class="sesion" href="views/solicitante/registroSolicitante.php" style="color:#FFFFFF;">Solicita tu medicamento</a></li>
               </ol>
            </div>
            <div class="col-2 px-5" style="color:#FFFFFF;">
               <ol>
                  <li><strong>Servicios YMA</strong></li>
                  <li>Segundo elemento de la lista</li>
                  <li>Tercer elemento de la lista</li>
               </ol>
            </div>
            <div class="col-3 px-5" style="color:#FFFFFF;">
               <ol>
                  <li><strong>Podemos Ayudarte</strong></li>
                  <li>Segundo elemento de la lista</li>
                  <li>Tercer elemento de la lista</li>
               </ol>
            </div>
         </div>
      </div>

      <div class="bg py-3" style="padding: 25rem">
         <hr style="border-top: 1px solid #9646c2;">
      </div>

      <div style="text-align: center; color: #a6a6a6;">
         <footer class="main-footer">
            <div class="d-none d-xl-block">
               <b>Version</b> 1.0.0
            </div>
            <strong>&nbsp;Copyright &copy; 2022 Hecho por YMA-Team</strong> All rights
            reserved.
         </footer>
      </div>



      <!-- end abouts -->

      <!-- Javascript files-->
      <script src="static/js/jquery.min.js"></script>
      <script src="static/js/popper.min.js"></script>
      <script src="static/js/bootstrap.bundle.min.js"></script>
      <script src="static/js/jquery-3.0.0.min.js"></script>
      <script src="static/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="static/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="static/js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function() {
            $(".fancybox").fancybox({
               openEffect: "none",
               closeEffect: "none"
            });
            $(".zoom").hover(function() {
               $(this).addClass('transition');
            }, function() {
               $(this).removeClass('transition');
            });
         });
      </script>
</body>

</html>