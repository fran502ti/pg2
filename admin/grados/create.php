<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');

include ('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Registro de Nuevo Grado</h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-6">
            <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos</h3>

            </div>

                  <div class="card-body">
                    <form action="<?=APP_URL;?>/app/controllers/grados/create.php" method="post">
            
                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Grado</label>
                                                    <select name="curso" id="" class="form-control">
                                                        <option value="PRIMERO">PRIMERO</option>
                                                        <option value="SEGUNDO">SEGUNDO</option>
                                                        <option value="TERCERO">TERCERO</option>
                                                        <option value="CUARTO">CUARTO</option>
                                                        <option value="QUINTO">QUINTO</option>
                                                        <option value="SEXTO">SEXTO</option>
                                                        <option value="PARVULOS">PARVULOS</option>
                                                    </select>
                                                </div>
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-md-12">
                                                <div class="form group">
                                                    <label for="">Seccion</label>
                                                    <select name="seccion" id="" class="form-control">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
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
                                                          if($gestione['estado']=="1"){
                                                            ?>
                                                            <option value="<?=$gestione['id_gestion'];?>"><?=$gestione['gestion'];?></option>
                                                            <?php
                                                          }
                                                          ?>
                                            
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
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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