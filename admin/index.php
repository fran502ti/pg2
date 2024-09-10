<?php
include('../app/config.php');
include('../admin/layout/parte1.php');
include('../app/controllers/roles/listado_de_roles.php');
include('../app/controllers/usuarios/listado_de_usuarios.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> <br>
    <div class="container">
      <div class="container">
        <div class="row">
          <h1><?=APP_NAME;?></h1>
        </div>
        <br>
        <div class="row">

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                      <?php
                      $contador_roles = 0;
                      foreach ($roles as $role){
                        $contador_roles = $contador_roles + 1;
                      }
                      ?>
                    <h3><?=$contador_roles;?></h3>
                    <p>Roles Registrados</p>
                    </div>
                    <div class="icon"> 
                      <i class="fas"><i class="bi bi-bookmarks"></i></i>
                    </div>
                    <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                      <?php
                      $contador_usuarios = 0;
                      foreach ($usuarios as $usuario){
                        $contador_usuarios = $contador_usuarios + 1;
                      }
                      ?>
                    <h3><?=$contador_usuarios;?></h3>
                    <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon"> 
                      <i class="fas"><i class="bi bi-people-fill"></i></i>
                    </div>
                    <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
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
  include('../admin/layout/parte2.php');
  include('../layout/mensajes.php');
?>
