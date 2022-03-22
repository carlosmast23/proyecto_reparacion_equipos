<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/welcome/reservaGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Proceso </span>Reserva</h3>
        </div>

        <input type="hidden" name="idPaqueteTurista" value="<?php echo $paquete['id'] ?>" >

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <h5>Datos Reserva:</h5>
                <b>Paquete:</b> <?php echo $paquete['nombre'] ?>
                <br>
                <b>Precio:</b> <?php echo $paquete['precio'] ?>

            </div>
        </div>


        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <h5>Datos Turista:</h5>
                <input type="text" name="nombre" value="<?php echo $dato['nombre'] ?>" class="form-control" placeholder="Nombre" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="telefono" value="<?php echo $dato['telefono'] ?>" class="form-control" placeholder="Telefono" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="email" value="<?php echo $dato['email'] ?>" class="form-control" placeholder="Email" required>
            </div>
        </div>


        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <button type="submit" style="width: 100%;" class="btn btn-primary">Reservar</button>
            </div>
        </div>
    </form>

</div>