<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/cursos/listado_de_cursos.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Listado de Cursos</h1>
        </div>

        <br>
        <div class="row">

          <div class="col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Cursos Registrados</h3>
                  <div class="card-tools">
                    <!--<a href="create.php" class="btn btn-success"><i class="bi bi-plus-square"></i> Crear Nuevo Curso</a>-->
                  </div>
              </div>

              <div class="card-body">
              <table id="example1" class="table table-striped table-bordered table-hover table-sm">
             <thead>
                <tr>
                    <th><center>No.</center></th>
                    <th><center>Curso</center></th>
                    <th><center>Fecha y hora de creacion</center></th>
                    <th><center>Acciones</center></th>
                </tr>
              </thead>
                <tbody> 
                    <?php
                    $contador_cursos = 0;
                    foreach ($cursos as $curso){
                        $id_curso = $curso['id_curso'];
                        $contador_cursos = $contador_cursos +1;?>
                        <tr>
                            <td style="text-align: center"><?=$contador_cursos;?></td>
                            <td><?=$curso['nombre_curso'];?></td>
                            <td><?=$curso['fyh_creacion'];?></td>
                            <td style="text-align: center;">
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="show.php?id=<?=$id_curso;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                                    <a href="edit.php?id=<?=$id_gestion;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                    <!-- <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/delete.php" onclick="preguntar<?=$id_gestion;?>(event)" method="post" id="miFormulario<?=$id_gestion;?>">
                                      <input type="text" name="id_gestion" value="<?=$id_gestion;?>" hidden>                        
                                      <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3-fill"></i></button>
                                    </form>

                                    <script>
                                      function preguntar<?=$id_gestion;?>(event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            title: 'Eliminar registro',
                                            text: '¿Desea eliminar este registro?',
                                            icon: 'question',
                                            showDenyButton: true,
                                            confirmButtonText: 'Eliminar',
                                            confirmButtonColor: '#a5161d',
                                            denyButtonColor: '#270a0a',
                                            denyButtonText: 'Cancelar',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                var form = $('#miFormulario<?=$id_gestion;?>');
                                                form.submit();
                                            }
                                        });
                                      }
                                    </script> -->
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
              </table>
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
  include ('../../admin/layout/parte2.php');
  include ('../../layout/mensajes.php');
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ciclos Escolares",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ciclos Escolares",
                "infoFiltered": "(Filtrado de _MAX_ total Ciclos Escolares)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ciclos Escolares",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

