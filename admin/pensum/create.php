<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Registro de Nuevo Pensum</h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos</h3>

            </div>

                  <div class="card-body">
                    <form action="<?=APP_URL;?>/app/controllers/pensum/create.php" method="post">
            
                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Pensum</label>
                                                    <select name="descripcion" id="" class="form-control">
                                                        <option value="Pensum PRIMERO">Pensum PRIMERO</option>
                                                        <option value="Pensum SEGUNDO">Pensum SEGUNDO</option>
                                                        <option value="Pensum TERCERO">Pensum TERCERO</option>
                                                        <option value="Pensum CUARTO">Pensum CUARTO</option>
                                                        <option value="Pensum QUINTO">Pensum QUINTO</option>
                                                        <option value="Pensum SEXTO">Pensum SEXTO</option>
                                                        <option value="Pensum PARVULOS">Pensum PARVULOS</option>
                                                    </select>
                                                </div>
                                        </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="<?=APP_URL;?>/admin/pensum" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                  </div>
          </div>
        </div>

        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
  include('../../admin/layout/parte2.php');
  include('../../layout/mensajes.php');
?>