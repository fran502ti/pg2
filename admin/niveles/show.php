<?php
$id_niveles = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/niveles/datos_nivel.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Nivel: <?=$nivel;?></h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos</h3>

            </div>

                  <div class="card-body">
                    <form action="<?=APP_URL;?>/app/controllers/niveles/create.php" method="post">
                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Ciclo Escolar</label>
                                                    <p><?=$gestion;?></p>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Nivel</label>
                                                    <p><?=$nivel;?></p>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Fecha y Hora de Creacion</label>
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
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?=APP_URL;?>/admin/niveles" class="btn btn-secondary">Volver</a>
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