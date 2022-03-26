<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/admin/gestionarCatalogoGrabar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Catalogo Productos</h3><?php echo $modo ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">
        
        <div class="form-group row">
            <div class="col-lg-4 offset-lg-4">Categoria:
                <select name="id_categoria" class="form-control buscar">
                    <?php
                        foreach ($categorias->result() as $fila) 
                        {
                    ?>
                            <option 
                                <?php if($dato['id_categoria'] == $fila->id) echo"selected"; ?>                                 
                                value="<?php echo $fila->id ?>"><?php echo $fila->nombre ?>
                            </option>
                    <?php
                        }
                    ?>                    
                </select>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="codigo" value="<?php echo $dato['codigo'] ?>" class="form-control" placeholder="Código" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="descripcion" value="<?php echo $dato['descripcion'] ?>" class="form-control" placeholder="Descripción" required>
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
                        <th scope="col">Categoría</th>
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
                            <td><?php echo $fila->nombre ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/catalogoVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/admin/catalogoEliminar') . "/" . $fila->id ?>" title="Eliminar">
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