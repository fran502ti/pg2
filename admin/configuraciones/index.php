<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> 
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Configuraciones del Sistema</h1> <br>
        </div>

        <br>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="bi bi-house-door"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text"><b>Datos de la Escuela</b></span>
                    <a href="institucion" class="btn btn-primary btn-sm">Configurar</a>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="bi bi-calendar-range-fill"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text"><b>Periodo  escolar</b></span>
                    <a href="gestion" class="btn btn-info btn-sm">Configurar</a>
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
