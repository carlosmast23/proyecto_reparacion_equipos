<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/admin/gestionarUsuarioGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Usuario</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" value="<?php echo $dato['usuario'] ?>" name="usuario" class="form-control" placeholder="Usuario" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="password" value="<?php echo $dato['clave'] ?>" name="clave" class="form-control" placeholder="Clave" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="nombres" value="<?php echo $dato['nombres'] ?>" class="form-control" placeholder="Nombres y Apellidos" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="correo" value="<?php echo $dato['correo'] ?>" class="form-control" placeholder="Correo Electrónico" required>
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
                        <th scope="col">Usuario</th>
                        <th scope="col">clave</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Correo Electrónico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    foreach ($consulta->result() as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $contador++ ?></td>
                            <td><?php echo $fila->usuario ?></td>
                            <td><?php echo $fila->nombres ?></td>
                            <td><?php echo $fila->correo?></td>
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