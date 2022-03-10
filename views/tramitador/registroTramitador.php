<?php
session_start();
if (isset($_GET['cerrar_sesion'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - YMA</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i109565/cjdowner/cryptocurrency-flat/ICON-ICX.ico" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Theme style -->

    <!-- <link rel="stylesheet" href="../../static/css/styles2.css">  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- SweetAlert y Ajax -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Validar inputs -->
    <script src="/static/js/validarInputs.js"></script>

    <style>
        body {
            height: 800px;
            background-image: url("http://localhost/YMA-Enfasis2/static/img/negocia.jpg");
            background-size: cover;
            background-size: 100rem;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>

</head>

<body class="hold-transition login-page">

    <!-- ALERTAS FLOTANTES -->

    <?php
    if (isset($_GET['mensaje'])) {
        if ($_GET['mensaje'] == 1) {
    ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Correo ya registrado!',
                })
            </script>
        <?php
        } elseif ($_GET['mensaje'] == 2) {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al registrar tramitador!',
                })
            </script>
        <?php
        } elseif ($_GET['mensaje'] == 3) {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Contraseñas no coinciden!',
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error 2!',
                })
            </script>
    <?php
        }
    }
    ?>

    <!-- Fin de alertas -->

    <div class="p-5">
        </br></br></br></br></br></br>
    </div>
    <div class="login-box p-5" style="background-color:#FFFFFF;">
        <div class="login-logo">
            <a href="#"><b><FONT SIZE=7 COLOR="black" WEIGHT="bold">YMA</FONT></strong></h1></b><br><FONT SIZE=4 COLOR="black" WEIGHT="bold">Your Medical Assistant</FONT></strong></h1></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body login">
                <p class="login-box-msg">Registrarse - Tramitador</p>
                <br>

                <form action="/settings/tramitador/controller.php" id="signup-tramitador" name="signup-tramitador" method="post">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="names" placeholder="Nombres" onkeyup="this.value=ValChar(this.value)" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="lastnames" placeholder="Apellidos" onkeyup="this.value=ValChar(this.value)" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="identificacion" placeholder="Identificación" onkeyup="this.value=ValChar(this.value)" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Correo" onkeyup="this.value=ValChar(this.value)" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="pass1" placeholder="Contraseña" onkeyup="this.value=ValChar(this.value)" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password2" id="pass2" placeholder=" Repetir contraseña" onkeyup="this.value=ValChar(this.value)" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="hidden" name="signup_tramitador" value="1">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </div>


                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/4e2a256b4d.js" crossorigin="anonymous"></script>
    <!-- SweetAlert y Ajax -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>