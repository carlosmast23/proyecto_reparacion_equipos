<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/admin/gestionarTranporteGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Transporte</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>" >

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="descripcion" value="<?php echo $dato['descripcion'] ?>" class="form-control" placeholder="Descripción" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="placa" value="<?php echo $dato['placa'] ?>" class="form-control" placeholder="Placa" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-2 offset-lg-4">
                <input type="text" name="capacidad" value="<?php echo $dato['capacidad'] ?>" class="form-control" placeholder="Capacidad" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="nombreChofer" value="<?php echo $dato['nombre_chofer'] ?>"" class="form-control" placeholder="Nombre Chofer" required>
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
                        <th scope="col">Descripcion</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Capacidad</th>
                        <th scope="col">Nombres Chofer</th>
                        <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador=1;
                        foreach($consulta->result() as $fila)
                        {
                    ?>
                        <tr>
                            <td><?php echo $contador++ ?></td>        
                            <td><?php echo $fila->descripcion ?></td>
                            <td><?php echo $fila->placa ?></td>
                            <td><?php echo $fila->capacidad ?></td>
                            <td><?php echo $fila->nombre_chofer ?></td>

                            <td>
                                <a href="<?php echo base_url('index.php/admin/transporteVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/admin/transporteEliminar') . "/" . $fila->id ?>" title="Eliminar">
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