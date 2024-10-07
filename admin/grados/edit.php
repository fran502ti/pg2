<?php
$id_grado = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/grados/datos_grados.php');
include('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Modificacion del Grado: <?=$curso." - ".$seccion;?></h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos</h3>

            </div>

                  <div class="card-body">
                  <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
                  <input type="hidden" name="id_grado" value="<?=$id_grado;?>">

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Grado</label>
                                                    <select name="curso" id="" class="form-control">
                                                        <option value="PRIMERO"<?=$curso=='PRIMERO' ? 'selected' : ''?>>PRIMERO</option>
                                                        <option value="SEGUNDO"<?=$curso=='SEGUNDO' ? 'selected' : ''?>>SEGUNDO</option>
                                                        <option value="TERCERO"<?=$curso=='TERCERO' ? 'selected' : ''?>>TERCERO</option>
                                                        <option value="CUARTO"<?=$curso=='CUARTO' ? 'selected' : ''?>>CUARTO</option>
                                                        <option value="QUINTO"<?=$curso=='QUINTO' ? 'selected' : ''?>>QUINTO</option>
                                                        <option value="SEXTO"<?=$curso=='SEXTO' ? 'selected' : ''?>>SEXTO</option>
                                                        <option value="PARVULOS"<?=$curso=='PARVULOS' ? 'selected' : ''?>>PARVULOS</option>
                                                    </select>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Seccion</label>
                                                    <select name="seccion" id="" class="form-control">
                                                        <option value="A"<?=$seccion=='A' ? 'selected' : ''?>>A</option>
                                                        <option value="B"<?=$seccion=='B' ? 'selected' : ''?>>B</option>
                                                    </select>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Ciclo Escolar</label>
                                                    <select name="gestion_id" id="" class="form-control">
                                                        <?php
                                                        foreach ($gestiones as $gestione){
                                                          if ($gestione['estado']=="1"){?>
                                                          <option value="<?=$gestione['id_gestion'];?>" 
                                                          <?php
                                                          if($gestion_id == $gestione['id_gestion']) {?> selected="selected" <?php } ?>>
                                                            <?=$gestione['gestion'];?>
                                                          </option>                            
                                                          <?php
                                                          } ?>
                                                          <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                        </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                        <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Cancelar</a>
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