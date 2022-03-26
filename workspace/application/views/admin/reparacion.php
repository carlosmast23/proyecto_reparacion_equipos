<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/admin/gestionarReparacionGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Reparaciones</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">

        <div class="form-group row">
            <div class="col-lg-4 offset-lg-4">Equipo a Reparar:
                <select name="id_producto_especifico" class="form-control buscar">
                    <?php
                    foreach ($productos->result() as $fila) {
                    ?>
                        <option 
                            <?php if($dato['id_producto_especifico'] == $fila->id) echo"selected"; ?>
                            value="<?php echo $fila->id ?>">
                            <?php echo $fila->codigo_especifico.' - '.$fila->descripcion.' - '.$fila->nombre ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="date" name="fecha_ingreso" value="<?php echo $dato['fecha_ingreso'] ?>" class="form-control" placeholder="Fecha Ingreso" required>
            </div>
        </div>
        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">                
                <input type="text" name="observaciones" value="<?php echo $dato['observaciones'] ?>" class="form-control" placeholder="Observaciones" required> 
            </div>
        </div>
        <<div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">Estado:
                <select name="estado" class="form-control">
                    <option <?php if($dato['estado'] == 'R') echo"selected"; ?> value="Reparando">Reparando</option>
                    <option <?php if($dato['estado'] == 'T') echo"selected"; ?> value="Terminado">Terminado</option>
                    <option <?php if($dato['estado'] == 'C') echo"selected"; ?> value="Cancelado">Cancelado</option>
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
                        <th scope="col">Producto</th>
                        <th scope="col">Establecimiento</th>
                        <th scope="col">Fecha Ingreso</th>
                        <th scope="col">Observaciones</th>
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
                            <td><?php echo $fila->codigo_especifico.' '.$fila->descripcion ?></td>
                            <td><?php echo $fila->nombre ?></td>
                            <td><?php echo $fila->fecha_ingreso ?></td>
                            <td><?php echo $fila->observaciones ?></td>
                            <td>
                                <?php 
                                    if($fila->estado == 'R'){
                                        echo "Reparando";
                                    }
                                    if($fila->estado == 'T'){
                                        echo "Terminado";
                                    }
                                    if($fila->estado == 'C'){
                                        echo "Cancelado";
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/reparacionVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/admin/reparacionEliminar') . "/" . $fila->id ?>" title="Eliminar">
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