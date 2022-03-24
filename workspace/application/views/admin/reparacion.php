<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/admin/gestionarUsuarioGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Reparaciones</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">

        <div class="form-group row">
            <div class="col-lg-4 offset-lg-4" <h4>Equipo a Reparar:</h4>
                <select name="idHospedaje" class="form-control">
                    <?php
                    foreach ($consulta->result() as $fila) {
                    ?>

                        <option value="<?php echo $fila->id ?>"><?php echo $fila->descripcion ?></option>
                    <?php
                    }
                    ?>

                </select>
            </div>
        </div>


        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="date"  value="<?php echo $dato['descripcion'] ?>" class="form-control" placeholder="Fecha Ingreso" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="nombres" value="<?php echo $dato['codigo'] ?>" class="form-control" placeholder="Observaciones" required>
            </div>
        </div>

        <<div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4" <h4>Estado:</h4>
                <select name="idHospedaje" class="form-control">
                    <option value="Reparando">Reparando</option>
                    <option value="Reparando">Terminado</option>
                    <option value="Reparando">Cancelado</option>
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
                        <th scope="col">Código</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    foreach ($consulta->result() as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $contador++ ?></td>
                            <td><?php echo $fila->codigo ?></td>
                            <td><?php echo $fila->descripcion ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/usuarioVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/admin/usuarioEliminar') . "/" . $fila->id ?>" title="Eliminar">
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