<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/niveles/listado_de_niveles.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --> 
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Listado de Niveles</h1> <br>
        </div>

        <br>
        <div class="row">

          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Niveles Registrados</h3>
                  <div class="card-tools">
                    <a href="create.php" class="btn btn-success"><i class="bi bi-plus-square"></i> Crear Nuevo Nivel</a>
                  </div>
              </div>

              <div class="card-body">
              <table id="example1" class="table table-striped table-bordered table-hover table-sm">
             <thead>
                <tr>
                    <th><center>No.</center></th>
                    <th><center>Ciclo Escolar</center></th>
                    <th><center>Nivel</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                </tr>
              </thead>
                <tbody> 
                    <?php
                    $contador_niveles = 0;
                    foreach ($niveles as $nivele){
                        $id_niveles = $nivele['id_niveles'];
                        $contador_niveles = $contador_niveles +1;?>
                        <tr>
                            <td style="text-align: center"><?=$contador_niveles;?></td>
                            <td><?=$nivele['gestion'];?></td>
                            <td><?=$nivele['nivel'];?></td>
                            <td style="text-align: center">
                                <?php
                                if ($nivele['estado']==1){?>
                                    <button class="btn btn-success btn-sm" style="border-radius: 20px">ACTIVO</button>
                                <?php
                                } else {?>
                                    <button class="btn btn-danger btn-sm" style="border-radius: 20px">INACTIVO</button>
                                <?php
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="show.php?id=<?=$id_niveles;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                                    <!--<a href="edit.php?id=<?=$id_niveles;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>-->
                                    <form action="<?=APP_URL;?>/app/controllers/niveles/delete.php" onclick="preguntar<?=$id_niveles;?>(event)" method="post" id="miFormulario<?=$id_niveles;?>">
                                      <input type="text" name="id_niveles" value="<?=$id_niveles;?>" hidden>                        
                                      <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3-fill"></i></button>
                                    </form>

                                    <script>
                                      function preguntar<?=$id_niveles;?>(event) {
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
                                                var form = $('#miFormulario<?=$id_niveles;?>');
                                                form.submit();
                                            }
                                        });
                                      }
                                    </script>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td></td>
                    </tr>
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
  include('../../admin/layout/parte2.php');
  include('../../layout/mensajes.php');
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Niveles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Niveles",
                "infoFiltered": "(Filtrado de _MAX_ total NIveles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Niveles",
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

