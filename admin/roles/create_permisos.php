<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');

include('../../app/controllers/roles/listado_de_roles.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Registro de Nuevo Permiso</h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos</h3>

            </div>

                  <div class="card-body">
                    <form action="<?=APP_URL;?>/app/controllers/roles/create_permisos.php" method="post">
                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Nombre de la URL</label>
                                                    <input type="text" name="nombre_url" class="form-control">
                                                </div>
                                        </div>
                            </div>
                    
                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">URL</label>
                                                    <input type="text" name="url" class="form-control">
                                                </div>
                                        </div>
                            </div>

                            

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="<?=APP_URL;?>/admin/roles/permisos.php" class="btn btn-secondary">Cancelar</a>
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