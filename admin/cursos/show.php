<?php
$id_curso = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/cursos/datos_cursos.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Curso: <?=$nombre_curso;?></h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos registrados</h3>

            </div>

                  <div class="card-body">
                    
                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Curso</label>
                                                    <p><?=$nombre_curso;?></p>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Fecha y hora de creacion</label>
                                                    <p><?=$fyh_creacion;?></p>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Estado</label>
                                                    <p>
                                                        <?php
                                                        if ($estado == "1") echo "ACTIVO";
                                                        else echo "INACTIVO";
                                                        ?>
                                                    </p>
                                                </div>
                                        </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?=APP_URL;?>/admin/cursos" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>
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
  include('../../../admin/layout/parte2.php');
  include('../../../layout/mensajes.php');
?>