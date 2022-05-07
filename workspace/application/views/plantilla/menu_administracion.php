<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div>
            <h1 class="logo"><a href="index.html">Reparaciones <span>CCE</span></a></h1>
            <p><b>Usuario: </b><?php echo $this->session->userdata('nombres_completos');?></p>
        </div>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="<?= base_url() ?>public/assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
            <?php if($this->session->userdata('tipo_usuario') == 'Administrador'){ ?>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/usuarioVista">Usuario</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/categoriaVista">Categoría</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/establecimientoVista">Establecimiento</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/catalogoVista">Catálogo</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/welcome">Salir</a></li>
            <?php }else if($this->session->userdata('tipo_usuario') == 'Técnico'){ ?>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/productoVista">Productos</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/reparacionVista">Reparación</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/admin/reporteVista">Reporte</a></li>
                <li><a class="nav-link scrollto " href="<?= base_url() ?>index.php/welcome">Salir</a></li>
            <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

    </div>
</header>
<!-- End Header -->