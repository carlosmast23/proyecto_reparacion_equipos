<div class="container" data-aos="fade-up">
    <form action="<?= base_url() ?>index.php/welcome/loginVerificar" method="post" role="form">
        <div class="section-title">
            <h3><span>Gestionar </span>Turista</h3>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="usuario" class="form-control" placeholder="Nombre y Apellido" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-2 offset-lg-4">
                <input type="text" name="usuario" class="form-control" placeholder="Teléfono" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="usuario" class="form-control" placeholder="Dirección" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="usuario" class="form-control" placeholder="Correo Electrónico" required>
            </div>
        </div>

        <div class="row" data-aos="fade-up" style="margin-top: 15px;" data-aos-delay="100">
            <div class="col-lg-4 offset-lg-4">
                <input type="text" name="usuario" class="form-control" placeholder="Observaciones" required>
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
                        <th scope="col">Nombres y Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pedro Carvajal</td>
                        <td>0994865925</td>
                        <td>Alangasí , Av Ilalo</td>
                        <td>
                            <button type="button" title="Editar" class="btn btn-success"><i class="bx bx-pencil"></i></button>
                            <button type="button" title="Eliminar" class="btn btn-danger"><i class="bx bx-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Leonardo Jimenez</td>
                        <td>0986663521</td>
                        <td>Quito , quitumbe</td>
                        <td>
                            <button type="button" title="Editar" class="btn btn-success"><i class="bx bx-pencil"></i></button>
                            <button type="button" title="Eliminar" class="btn btn-danger"><i class="bx bx-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            
        </div>
    </div>

</div>