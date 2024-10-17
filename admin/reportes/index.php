<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/docentes/listado_de_asignaciones.php');
include ('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include ('../../app/controllers/reportes/listado_de_reportes.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Grados asignados para reportes</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Asignaciones registrados</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Grado</center></th>
                                    <th><center>Seccion</center></th>
                                    <th><center>Materia</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                foreach ($asignaciones as $asignacione){
                                    $id_grado = $asignacione['id_grado'];
                                    if($email_sesion == $asignacione['email']){
                                        $id_asignacion = $asignacione['id_asignacion'];
                                        $docente_id = $asignacione['docente_id'];
                                        $contador = $contador + 1; ?>
                                    <tr>
                                        <td><center><?=$contador;?></center></td>
                                        <td><center><?=$asignacione['curso'];?></center></td>
                                        <td><center><?=$asignacione['seccion'];?></center></td>
                                        <td><center><?=$asignacione['nombre_materia'];?></center></td>
                                        <td>
                                           <center> 
                                            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?=$id_asignacion;?>">
                                                <i class="bi bi-check2-square">
                                                </i> Reportar
                                            </a>
                                        </center>

                                            <div class="modal fade" id="exampleModal<?=$id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #eb2d14">
                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: white">
                                                            Reporte del curso: <?=$asignacione['curso'];?>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!--Contenido del modal-->
                                                    <div class="modal-body">
                                                    <form action="<?=APP_URL;?>/app/controllers/reportes/create.php" method="post">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Fecha</label>
                                                                    <input type="text" name="docente_id" value="<?=$docente_id;?>" hidden>
                                                                    <input type="date" name="fecha" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Estudiante</label>
                                                                    <select name="estudiante_id" id="" class="form-control">
                                                                        <?php
                                                                        foreach ($estudiantes as $estudiante){
                                                                            if ($estudiante['id_grado']==$asignacione['grado_id']){
                                                                                $id_estudiante = $estudiante['id_estudiante']; ?>
                                                                            <option value="<?=$id_estudiante;?>"><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></option>
                                                                            <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Materias</label>
                                                                    <input type="text" class="form-control" value="<?=$asignacione['nombre_materia'];?>" disabled>
                                                                    <input type="text" class="form-control" name="materia_id" value="<?=$asignacione['id_materia'];?>" hidden>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Observacion</label>
                                                                    <select name="observacion" id="" class="form-control">
                                                                        <option value="DISCIPLINA">DISCIPLINA</option>
                                                                        <option value="ASISTENCIA">ASISTENCIA</option>
                                                                        <option value="RENDIMIENTO ACADEMICO">RENDIMIENTO ACADEMICO</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Comentario</label>
                                                                    <textarea name="comentario" id="" cols="30" class="form-control" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Registrar</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                        

                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
             <br>


             <!-- listado de reportes -->


             <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Reportes registrados</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Grado</center></th>
                                    <th><center>Seccion</center></th>
                                    <th><center>Materia</center></th>
                                    <th><center>Estudiante</center></th>
                                    <th><center>Fecha de Reporte</center></th>
                                    <th><center>Observacion</center></th>
                                    <th><center>Comentario</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_reportes = 0;
                                foreach ($reportes as $reporte){
                                    $id_reportes = $reporte['id_reportes'];
                                    if($email_sesion == $reporte['email']){
                                        $id_reportes = $reporte['id_reportes'];
                                        $estudiante_id = $reporte['estudiante_id'];
                                        $grado_id = $reporte['grado_id'];
                                        $contador_reportes = $contador_reportes + 1; ?>
                                    <tr>
                                    <td><center><?=$contador_reportes;?></center></td>
                                    <?php
                                            foreach ($estudiantes as $estudiante){
                                                if($estudiante['id_estudiante']==$estudiante_id){ ?>
                                                    <td><center><?=$estudiante['curso'];?></center></td>
                                                    <td><center><?=$estudiante['seccion'];?></center></td>
                                                    <td><center><?=$reporte['nombre_materia'];?></center></td>
                                                    <td><center><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></center></td>
                                                    <td><center><?=$reporte['fecha'];?></center></td>
                                                    <td><center><?=$reporte['observacion'];?></center></td>
                                                    <td><center><?=$reporte['comentario'];?></center></td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        <td>
                                            <!-- botones de editar y elimiinar de reportes -->
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- modulo de editar se abre en un modal -->
                                                    <a class="btn btn-success btn-sm"  data-toggle="modal" data-target="#modal_editar<?=$id_reportes;?>">
                                                    <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                    <div class="modal fade" id="modal_editar<?=$id_reportes;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #0fbf0c">
                                                                    <h5 class="modal-title" id="exampleModalLabel" style="color: white">
                                                                        Editar reporte
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?=APP_URL;?>/app/controllers/reportes/update.php" method="post">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Fecha</label>
                                                                                    <input type="text" value="<?=$id_reportes?>" name="id_reportes" hidden>
                                                                                    <input type="text" name="docente_id" value="<?=$docente_id;?>" hidden>
                                                                                    <input type="date" value="<?=$reporte['fecha'];?>" name="fecha" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Estudiante</label>
                                                                                    <select name="estudiante_id" id="" class="form-control">
                                                                                        <?php
                                                                                        foreach ($estudiantes as $estudiante){
                                                                                            if($estudiante['id_grado']==$grado_id){
                                                                                                $id_estudiante = $estudiante['id_estudiante']; ?>
                                                                                                <option value="<?=$id_estudiante;?>" <?=$id_estudiante==$estudiante_id ? 'selected' : ''?>><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Materia</label>
                                                                                    <input type="text" class="form-control" value="<?=$reporte['nombre_materia'];?>" disabled>
                                                                                    <input type="text" class="form-control" name="materia_id" value="<?=$reporte['id_materia'];?>" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Observación</label>
                                                                                    <select name="observacion" id="" class="form-control">
                                                                                        <option value="DISCIPLINA" <?=$reporte['observacion']=="DISCIPLINA" ? 'selected' : ''?>>DISCIPLINA</option>
                                                                                        <option value="ASISTENCIA" <?=$reporte['observacion']=="ASISTENCIA" ? 'selected' : ''?>>ASISTENCIA</option>
                                                                                        <option value="RENDIMIENTO ACADÉMICO" <?=$reporte['observacion']=="RENDIMIENTO ACADÉMICO" ? 'selected' : ''?>>RENDIMIENTO ACADÉMICO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Comentario</label>
                                                                                    <textarea name="comentario" id="" cols="30" class="form-control"
                                                                                              rows="3"><?=$reporte['comentario'];?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- formulario de eliminar reporte -->

                                                    <form action="<?=APP_URL;?>/app/controllers/reportes/delete.php" onclick="preguntar<?=$id_reportes;?>(event)"
                                                          method="post" id="miFormulario<?=$id_reportes;?>">
                                                        <input type="text" name="id_reportes" value="<?=$id_reportes;?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash3-fill"></i></button>
                                                    </form>
                                                    <script>
                                                        function preguntar<?=$id_reportes;?>(event) {
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
                                                                    var form = $('#miFormulario<?=$id_reportes;?>');
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
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reportes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Reportes",
                "infoFiltered": "(Filtrado de _MAX_ total Reportes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Reportes",
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