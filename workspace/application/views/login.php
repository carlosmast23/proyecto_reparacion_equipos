<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/welcome/loginVerificar" method="post" role="form">
        <div class="section-title">
            <h3><span>Login </span>Sistema</h3>
            <p>Por favor Ingrese su usuario y clave para ingresar al sistema</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="password" name="clave" class="form-control" placeholder="Clave" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <button type="submit" style="width: 100%;" class="btn btn-primary">Ingresar</button>                
            </div>
        </div>        
    </form>
</div>

