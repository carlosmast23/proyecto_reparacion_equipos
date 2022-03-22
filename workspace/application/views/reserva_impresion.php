<div class="container" data-aos="fade-up">
       <div class="section-title">
            <h3><span>Comprobante de  </span>Reseva</h3>
        </div>

        <input type="hidden" name="idPaqueteTurista" value="<?php echo $reserva['id'] ?>" >

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <h5>Código: <?php echo $reserva['id'] ?></h5>
                <b>Paquete:</b> <?php echo $reserva['nombre'] ?>
                <br>
                <b>Precio:</b> <?php echo $reserva['precio'] ?>
                <br>
                <b>Hospedaje:</b> <?php echo $reserva['nombreHospedaje'] ?>
                <br>
                <b>Transporte Placa:</b> <?php echo $reserva['placa'] ?>
                <br>
                <b>Nombre:</b> <?php echo $reserva['nombre'] ?>
                <br>
                <b>Telefono:</b> <?php echo $reserva['telefono'] ?>
                <br>
                <b>Email:</b> <?php echo $reserva['email'] ?>
                <br>
                <b>Descripcion:</b> <?php echo $reserva['descripcionPaquete'] ?>

                <div style="border-style: dotted;padding: 5px;margin-top: 20px;font-size: 11px;">
                    Nota: Por favor tenga impreso el comprobante para que pueda completar la reservación 
                </div>
            </div>
        </div>


        

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <button onclick="window.print();" type="submit" style="width: 100%;" class="btn btn-primary">Imprimir</button>
            </div>
        </div>
        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4" style="text-align: center;">
                <a href="<?php echo base_url('index.php/welcome/index') ?>" title="Editar"><i class="fa fa-home fa-lg" aria-hidden="true"></i>Regresar al Inicio</a>
                
            </div>
        </div>


</div>