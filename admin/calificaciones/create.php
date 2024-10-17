<?php

$id_grado = $_GET['id_grado'];
$id_docente_get = $_GET['id_docente'];
$id_materia_get = $_GET['id_materia'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/estudiantes/listado_de_estudiantes.php');
include ('../../app/controllers/calificaciones/listado_de_calificaciones.php');

foreach ($estudiantes as $estudiante){

    if ($id_grado == $estudiante['grado_id']){

       $curso = $estudiante['curso'];
       $seccion = $estudiante['seccion'];
} 
    
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de estudiantes del grado: <?=$curso;?> seccion <?=$seccion;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes registrados</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Apellidos y nombres del estudiante</center></th>
                                    <th><center>CUI</center></th>
                                    <th><center>Grado y seccion</center></th>
                                    <th><center>1er Bimestre</center></th>
                                    <th><center>2do Bimestre</center></th>
                                    <th><center>3er Bimestre</center></th>
                                    <th><center>4to Bimestre</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_estudiantes = 0;
                                
                                foreach ($estudiantes as $estudiante){

                                    if ($id_grado == $estudiante['grado_id']){

                                        $id_estudiante = $estudiante['id_estudiante'];
                                    $contador_estudiantes = $contador_estudiantes +1; ?>
                                    <tr>
                                        
                                    <td style="text-align: center">
                                        <input type="text" id="estudiante_<?=$contador_estudiantes;?>" 
                                            value="<?=$id_estudiante;?>" hidden>
                                        <?=$contador_estudiantes;?>
                                    </td>
                                        <td style="text-align: center"><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></td>
                                        <td style="text-align: center"><?=$estudiante['cui'];?></td>
                                        <td style="text-align: center"><?=$estudiante['curso']." - ".$estudiante['seccion'];?></td>

                                        <?php
                                        $nota1 = "";
                                        $nota2 = "";
                                        $nota3 = "";
                                        $nota4 = "";
                                        foreach($calificaciones as $calificacione){
                                            
                                            if(($calificacione['docente_id']==$id_docente_get) &&
                                            ($calificacione['estudiante_id']==$id_estudiante) &&
                                            ($calificacione['materia_id']==$id_materia_get))
                                            {
                                                $nota1 = $calificacione['nota1'];
                                                $nota2 = $calificacione['nota2'];
                                                $nota3 = $calificacione['nota3'];
                                                $nota4 = $calificacione['nota4'];
                                            }
                                        }
                                        ?>



                                        <td>
                                            <input style="text-align: center;" value="<?=$nota1;?>" id="nota1_<?=$contador_estudiantes;?>" type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input style="text-align: center;" value="<?=$nota2;?>" id="nota2_<?=$contador_estudiantes;?>" type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input style="text-align: center;" value="<?=$nota3;?>" id="nota3_<?=$contador_estudiantes;?>" type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input style="text-align: center;" value="<?=$nota4;?>" id="nota4_<?=$contador_estudiantes;?>" type="number" class="form-control">
                                        </td>
                                    </tr>
                                    <?php
                                } 
                                    
                                }
                                $contador_estudiantes = $contador_estudiantes;
                                ?>
                                </tbody>
                            </table>
                            <hr>
                            <button class="btn btn-primary btn-lg" id="btn_guardar">Guardar Notas</button>
                            <script>
                                $('#btn_guardar').click(function(){
                                    var n = '<?=$contador_estudiantes;?>';
                                    var i = 1;
                                    var id_docente = '<?=$id_docente_get;?>';
                                    var id_materia = '<?=$id_materia_get;?>';
                                    

                                    for (i = 1; i<=n; i++){
                                        var a = '#nota1_'+i;
                                        var nota1 = $(a).val();

                                        var b = '#nota2_'+i;
                                        var nota2 = $(b).val();

                                        var c = '#nota3_'+i;
                                        var nota3 = $(c).val();

                                        var d = '#nota4_'+i;
                                        var nota4 = $(d).val();

                                        var e = '#estudiante_'+i;
                                        var id_estudiante = $(e).val(); 
                                        
                                        //alert("id_docente:"+id_docente+"- id_estudiante:"+id_estudiante+"- id_materia:"+id_materia);

                                        //uso de ajax para mandar archivos a otro controlador sin refrescar datos
                                        var url = "../../app/controllers/calificaciones/create.php";
                                        $.get(url,{id_docente:id_docente,id_estudiante:id_estudiante,id_materia:id_materia,nota1:nota1,nota2:nota2,nota3:nota3,nota4:nota4},function (datos) {
                                            $('#respuesta').html(datos);
                                           // alert("mando los datos");
                                        });
                                    }
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: "Notas cargadas correctamente",
                                        showConfirmButton: false,
                                        timer: 5000
                                    });
                                });
                            </script>
                            <div id="respuesta" hidden></div>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
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
</script>s