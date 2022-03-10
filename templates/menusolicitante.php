<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <?php
    $tipo = $GLOBALS['mensaje'];
    ?>

    <!-- Brand Logo -->
    <a href="/views/<?php echo strtolower($tipo) ?>/<?php echo strtolower($tipo) ?>Main.php" class="brand-link">
        <img src="https://iconarchive.com/download/i109565/cjdowner/cryptocurrency-flat/ICON-ICX.ico" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">
            <?php
            echo $tipo;
            ?>
        </span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href=# class="d-block">
                    <?php
                    echo ($_SESSION['usuario']);
                    ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/views/<?php echo strtolower($tipo) ?>/<?php echo strtolower($tipo) ?>Main.php" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/views/solicitante/solicitarTramite.php" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>Solicitar Trámite</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/views/solicitante/tramitesProceso.php" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>Mis trámites</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/views/solicitante/historialTramites.php" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>Historial de Trámites</p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Películas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/views/create.php" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Agregar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/views/read.php" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>