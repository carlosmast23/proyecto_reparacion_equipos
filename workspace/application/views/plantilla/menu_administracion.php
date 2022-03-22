<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">CIA MOLINUCO <span>TRANS</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="<?= base_url() ?>public/assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/usuarioVista">Usuario</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/transporteVista">Transporte</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/hospedajeAdminCtr/hospedajeVista">Hospedaje</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/paqueteCtr/paqueteVista">Paquete</a></li>                
                <li><a class="nav-link scrollto" href="<?= base_url() ?>index.php/reservaCtr/cobrarVista/null">Cobros</a></li>                
                <li><a class="nav-link scrollto" href="<?= base_url() ?>index.php/reservaCtr/reporteCobros">Reporte</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url() ?>index.php/welcome">Salir</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

    </div>
</header>
<!-- End Header -->