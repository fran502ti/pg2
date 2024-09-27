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
          <h1>Modificacion del Pensum: <?=$descripcion;?></h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos</h3>

            </div>

                  <div class="card-body">
                  <form action="<?=APP_URL;?>/app/controllers/pensum/update.php" method="post">
                  <input type="hidden" name="id_pensum" value="<?=$id_pensum;?>">

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Pensum</label>
                                                    <select name="descripcion" id="" class="form-control">
                                                        <option value="Pensum PRIMERO"<?=$descripcion=='Pensum PRIMERO' ? 'selected' : ''?>>Pensum PRIMERO</option>
                                                        <option value="Pensum SEGUNDO"<?=$descripcion=='Pensum SEGUNDO' ? 'selected' : ''?>>Pensum SEGUNDO</option>
                                                        <option value="Pensum TERCERO"<?=$descripcion=='Pensum TERCERO' ? 'selected' : ''?>>Pensum TERCERO</option>
                                                        <option value="Pensum CUARTO"<?=$descripcion=='Pensum CUARTO' ? 'selected' : ''?>>Pensum CUARTO</option>
                                                        <option value="Pensum QUINTO"<?=$descripcion=='Pensum QUINTO' ? 'selected' : ''?>>Pensum QUINTO</option>
                                                        <option value="Pensum SEXTO"<?=$descripcion=='Pensum SEXTO' ? 'selected' : ''?>>Pensum SEXTO</option>
                                                        <option value="Pensum PARVULOS"<?=$descripcion=='Pensum PARVULOS' ? 'selected' : ''?>>Pensum PARVULOS</option>
                                                    </select>
                                                </div>
                                        </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Actualizar</button>
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