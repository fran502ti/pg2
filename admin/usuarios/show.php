<?php
$id_usuario = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/usuarios/datos_del_usuario.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Usuario: <?=$nombres;?></h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Datos Registrados</h3>

            </div>

                  <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre del Rol</label>
                                        <p><?=$nombre_rol;?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres del usuario</label>
                                        <p><?=$nombres;?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">DPI</label>
                                        <p><?=$dpi;?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo Electronico</label>
                                        <p><?=$email;?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <p><?=$telefono;?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha y hora de creacion</label>
                                        <p><?=$fyh_creacion;?></p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p>
                                            <?php if ($estado =='1') echo "ACTIVO"; else echo "INACTIVO"; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?=APP_URL;?>/admin/usuarios" class="btn btn-secondary">Volver</a>
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
