<?php
include('../app/config.php');
include('../admin/layout/parte1.php');
include('../app/controllers/roles/listado_de_roles.php');
include('../app/controllers/usuarios/listado_de_usuarios.php');
include('../app/controllers/grados/listado_de_grados.php');
include('../app/controllers/cursos/listado_de_cursos.php');
include('../app/controllers/docentes/listado_de_docentes.php');
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



            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                      <?php
                      $contador_grados = 0;
                      foreach ($grados as $grado){
                        $contador_grados = $contador_grados + 1;
                      }
                      ?>
                    <h3><?=$contador_grados;?></h3>
                    <p>Grados Registrados</p>
                    </div>
                    <div class="icon"> 
                      <i class="fas"><i class="bi bi-bar-chart-steps"></i></i>
                    </div>
                    <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                      <?php
                      $contador_cursos = 0;
                      foreach ($cursos as $curso){
                        $contador_cursos = $contador_cursos + 1;
                      }
                      ?>
                    <h3><?=$contador_cursos;?></h3>
                    <p>Cursos Registrados</p>
                    </div>
                    <div class="icon"> 
                      <i class="fas"><i class="bi bi-journal-bookmark-fill"></i></i>
                    </div>
                    <a href="<?=APP_URL;?>/admin/cursos" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-default">
                    <div class="inner">
                      <?php
                      $contador_docentes = 0;
                      foreach ($docentes as $docente){
                        $contador_docentes = $contador_docentes + 1;
                      }
                      ?>
                    <h3><?=$contador_docentes;?></h3>
                    <p>Docentes Registrados</p>
                    </div>
                    <div class="icon"> 
                      <i class="fas"><i class="bi bi-person-video3"></i></i></i>
                    </div>
                    <a href="<?=APP_URL;?>/admin/docentes" class="small-box-footer">
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
