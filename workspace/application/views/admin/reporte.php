<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<div class="container" data-aos="fade-up">

    <div class="section-title">
        <h3><span>Reporte </span>Cobros</h3>
    </div>

    <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">

        <div class="col-lg-6 ">
            <input type="button" onclick="ExportToExcel();" value="Exportar Excel" class="btn btn-success">
        </div>

        <div class="col-lg-12 ">
            <table class="table" id="tabla">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Paquete</th>
                        <th scope="col">Transporte</th>
                        <th scope="col">Hospedaje</th>
                        <th scope="col">Nombres y Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Pagado</th>

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
                            <td><?php echo $fila->placa ?></td>
                            <td><?php echo $fila->nombreHospedaje ?></td>
                            <td><?php echo $fila->nombre ?></td>
                            <td><?php echo $fila->telefono ?></td>
                            <td><?php echo $fila->email ?></td>
                            <td><?php echo ($fila->estado=="P")?"NO":"SI" ?></td>

                           
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