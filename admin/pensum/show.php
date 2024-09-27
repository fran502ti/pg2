<?php
$id_pensum = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/pensum/datos_pensum.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Pensum: <?=$descripcion;?></h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos Registrados</h3>

            </div>

                  <div class="card-body">              

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Pensum</label>
                                                    <p><?=$descripcion;?></p>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Cursos</label>
                                        <ul>
                                            <!-- Verificar si el array de cursos no está vacío -->
                                            <?php if (!empty($cursos)): ?>
                                                <?php foreach ($cursos as $curso): ?>
                                                    <li><?= $curso; ?></li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li>No hay cursos asignados a este pensum.</li>
                                            <?php endif; ?>
                                        </ul>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?=APP_URL;?>/admin/pensum" class="btn btn-secondary">Volver</a>
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
  include('../../admin/layout/parte2.php');
  include('../../layout/mensajes.php');
?>