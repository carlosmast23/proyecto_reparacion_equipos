<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<div class="container" data-aos="fade-up">

    <div class="section-title">
        <h3><span>Reporte </span>Reparación</h3>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12">
            <form action="<?= base_url() ?>index.php/admin/gestionarReporte" method="post" role="form">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-4 offset-lg-4"> Estado:
                        <select name="estado" class="form-control">
                            <option value="A">Todos</option>
                            <option <?php if ($estado == 'R') echo "selected"; ?> value="R">Reparando</option>
                            <option <?php if ($estado == 'T') echo "selected"; ?> value="T">Terminado</option>
                            <option <?php if ($estado == 'C') echo "selected"; ?> value="C">Cancelado</option>
                        </select>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" style="margin-top: 15px;margin-bot: 30px;" data-aos-delay="100">
                    <div class="col-lg-4 offset-lg-4">
                        <button type="submit" style="width: 100%;" class="btn btn-primary">Filtrar datos</button>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="button" onclick="ExportToExcel();" value="Exportar Excel" class="btn btn-success">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="row">
        <tr>
            <div class="col-lg-12 ">
                <table class="table" id="tabla">
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
                        foreach ($reparaciones->result() as $fila) {
                        ?>
                            <tr>
                                <td><?php echo $contador++ ?></td>
                                <td><?php echo $fila->codigo_especifico . ' ' . $fila->descripcion ?></td>
                                <td><?php echo $fila->nombre ?></td>
                                <td><?php echo $fila->fecha_ingreso ?></td>
                                <td><?php echo $fila->observaciones ?></td>
                                <td>
                                    <?php
                                    if ($fila->estado == 'R') {
                                        echo "Reparando";
                                    }
                                    if ($fila->estado == 'T') {
                                        echo "Terminado";
                                    }
                                    if ($fila->estado == 'C') {
                                        echo "Cancelado";
                                    }
                                    ?>
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
    function mensaje() {
        alert('hola');
    }

    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tabla');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || ('Reporte.' + (type || 'xlsx')));
    }
</script>