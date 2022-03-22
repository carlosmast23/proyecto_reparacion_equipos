<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/paqueteCtr/gestionarPaqueteGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Paquete Turistico</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">
        
        <div class="form-group row">
            <div class="col-lg-4 offset-lg-4" <h4>Tranporte Placa:</h4>
                <select name="idTransporte" class="form-control">
                    <?php
                    foreach ($transportes->result() as $fila) {
                    ?>

                        <option value="<?php echo $fila->id ?>"><?php echo $fila->placa ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 offset-lg-4" <h4>Hospedaje:</h4>
                <select name="idHospedaje" class="form-control">
                    <?php
                    foreach ($hospedajes->result() as $fila) {
                    ?>

                        <option value="<?php echo $fila->id ?>"><?php echo $fila->nombre ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="nombre" value="<?php echo $dato['nombre'] ?>" class="form-control" placeholder="Nombre" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="descripcion" value="<?php echo $dato['descripcion'] ?>" class="form-control" placeholder="Descripcion" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="precio" value="<?php echo $dato['precio'] ?>" class="form-control" placeholder="Precio" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-2 offset-lg-4">
                <div>Estado:</div>
                <select name="estado">
                    <option value="A" <?php echo ($dato['estado']=='A'?'selected':'') ?> >Activo</option>
                    <option value="E" <?php echo ($dato['estado']=='I'?'selected':'') ?> >Inactivo</option>
                </select>                
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <button type="submit" style="width: 100%;" class="btn btn-primary">Grabar</button>
            </div>
        </div>
    </form>

    <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
        <div class="col-lg-12 ">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Transporte</th>
                        <th scope="col">Hospedaje</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    foreach ($consulta->result() as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $contador++ ?></td>
                            <td><?php echo $fila->nombre ?></td>
                            <td><?php echo $fila->placa ?></td>
                            <td><?php echo $fila->nombreHospedaje ?></td>
                            <td><?php echo $fila->precio ?></td>
                            <td><?php echo $fila->estado ?></td>

                            <td>
                                <a href="<?php echo base_url('index.php/paqueteCtr/paqueteVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/paqueteCtr/paqueteEliminar') . "/" . $fila->id ?>" title="Eliminar">
                                    <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>
    </div>

</div>