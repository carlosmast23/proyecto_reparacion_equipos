<div class="container" data-aos="fade-up">

    <div class="section-title">
        <h3><span>Gestionar </span>Cobros</h3>
    </div>

    <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">

        <div class="col-lg-6 offset-lg-3 ">
            <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar" required>
        </div>
        <div class="col-lg-1 ">
            <a class="btn btn-primary" onclick="buscar();"  title="Buscar">Buscar</a>
        </div>

        <div class="col-lg-12 ">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Paquete</th>
                        <th scope="col">Nombres y Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    foreach ($consulta->result() as $fila) {
                    ?>
                        <tr>
                            <td><?php echo $contador++ ?></td>
                            <td><?php echo $fila->nombrePaquete ?></td>
                            <td><?php echo $fila->nombre ?></td>
                            <td><?php echo $fila->telefono ?></td>
                            <td><?php echo $fila->email ?></td>

                            <td>
                                <a class="btn btn-success" onclick="return confirm('Esta seguro que quiere registrar el pago?')" href="<?php echo base_url('index.php/reservaCtr/registrarCobro') . "/" . $fila->id ?>" title="Cobrar">Cobrar</a>
                                <a class="btn btn-danger" onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/reservaCtr/eliminarReserva') . "/" . $fila->id ?>" title="Eliminar">
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

<script>
    function mensaje()
    {
        alert('hola');
    }

    function buscar()
    {
        var urlBuscar="<?php echo base_url('index.php/reservaCtr/cobrarVista') ?>";
        var textoBuscar= $("#buscar").val();
        if(textoBuscar=="")
        {
            textoBuscar="null";
        }
        urlBuscar=urlBuscar+"/"+textoBuscar;
        window.location.href = urlBuscar;
        //alert(urlBuscar);
    }
</script>