<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/hospedajeAdminCtr/gestionarHospedajeGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Hospedaje</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input value="<?php echo $dato['nombre'] ?>" type="text" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-2 offset-lg-4">
                <input value="<?php echo $dato['capacidad'] ?>" type="text" name="capacidad" class="form-control" placeholder="Capacidad" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input value="<?php echo $dato['direccion'] ?>" type="text" name="direccion" class="form-control" placeholder="Dirección" required>
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
                        <th scope="col">Capacidad</th>
                        <th scope="col">Dirección</th>
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
                            <td><?php echo $fila->capacidad ?></td>
                            <td><?php echo $fila->direccion ?></td>
                            
                            <td>
                                <a href="<?php echo base_url('index.php/hospedajeAdminCtr/hospedajeVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/hospedajeAdminCtr/hospedajeEliminar') . "/" . $fila->id ?>" title="Eliminar">
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