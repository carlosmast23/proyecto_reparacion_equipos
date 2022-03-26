<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/admin/gestionarProductoGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Productos</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">
        
        <div class="form-group row">
            <div class="col-lg-4 offset-lg-4">Establecimiento:
                <select name="id_establecimiento" class="form-control buscar">
                    <?php
                        foreach ($establecimientos->result() as $fila) 
                        {
                    ?>
                            <option 
                                <?php if($dato['id_establecimiento'] == $fila->id) echo"selected"; ?>                                 
                                value="<?php echo $fila->id ?>"><?php echo $fila->nombre ?>
                            </option>
                    <?php
                        }
                    ?>
                    
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4 offset-lg-4">Producto:
                <select name="id_producto_generico" class="form-control buscar">
                    <?php
                        foreach ($catalogos->result() as $fila) 
                        {
                    ?>
                            <option 
                                <?php if($dato['id_producto_generico'] == $fila->id) echo"selected"; ?>                                
                                value="<?php echo $fila->id ?>"><?php echo $fila->descripcion ?>
                            </option>
                    <?php
                        }
                    ?>
                    
                </select>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="codigo_especifico" value="<?php echo $dato['codigo_especifico'] ?>" class="form-control" placeholder="Código" required>
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
                        <th scope="col">Producto</th>
                        <th scope="col">Establecimiento</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    foreach ($consulta->result() as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $contador++ ?></td>
                            <td><?php echo $fila->codigo_especifico ?></td>
                            <td><?php echo $fila->descripcion ?></td>
                            <td><?php echo $fila->nombre ?></td>                            
                            <td>
                                <a href="<?php echo base_url('index.php/admin/productoVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/admin/productoEliminar') . "/" . $fila->id ?>" title="Eliminar">
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