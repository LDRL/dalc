<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                @if(count($empleado) > 0)
                <div class="row">
                    <h4 class="box-title" align="center">Listado Empleado Inactivos</h4>
                    <hr style="border-color:black;"/>
                </div>
                <div><br></div>            
      
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-index-empleado" >
                            <thead>
                                <th style="width: 5%">Id</th>
                                <th style="width: 20%">Nombre</th>
                                <th style="width: 25%">Direcci&oacute;n</th>
                                <th style="width: 10%">telefono</th>
                                <th style="width: 15%">Correo</th>
                                <th style="width: 10%">Opciones</th>
                            </thead>
                            <tbody id="listempleado">
                                @foreach ($empleado as $em)
                                <tr class="even gradeA" id="empleado{{$em->idpersona}}">
                                    <td>{{$em->idpersona}}</td>
                                    <td>{{$em->nombre.' '.$em->apellido}}</td>
                                    <td>{{$em->direccion}}</td>
                                    <td>{{$em->telefono}}</td>
                                    <td>{{$em->correo}}</td>
                                    <td>                                     
                                        <a href="javascript:void(0);" onclick="detalle(1,{{$em->idpersona}});">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles" value="{{$em->idpersona}}"><i class="fa fa-address-card"></i></button>
                                        </a>

                                        <button class="btn btn-success btn-md btn-activare" id="FWEF" value="{{$em->idpersona}}" title="Recuperar" ><i class="fa fa-star"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun empleado...</label>  </div> 
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="erroresModalEmpleado" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorEmpleado"></h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentEmpleado"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-empleado').DataTable({
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Mostrar _START_ a _END_ de _TOTAL_ registros por pagina",
                    "infoEmpty":      "Showing 0 to 0 of 0 entries",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Buscar:",
                    "total":          "total",          
                    "zeroRecords":    "No se han encontrado resultados",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                },
                columns: [
                null,
                null,
                null,
                null,
                null,
                null
                ],

                aLengthMenu:[
                5,10,15],

                buttons: [
                    
                ]
    });

</script>
<script type="text/javascript">
//Recuperar empleado
    $(document).on('click','.btn-activare',function(){
        var idemp=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Esta seguro de cambiar de status a empleado Activo?',
            text: "Precione si para continuar, no para cerrar este mensaje.",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
            }).then(function () {
                var urlraiz=$("#url_raiz_proyecto").val();
                var miurl=urlraiz+"/empleado/recuperar/" + idemp; 
                $.ajax({

                    type: "PUT",
                    url: miurl,
                    success: function (data) {
                        $("#empleado" + idemp).remove();
                    },
                    error: function (data) {
                        var errHTML="";
                        if((typeof data.responseJSON != 'undefined')){
                            for( var er in data.responseJSON){
                                errHTML+="<li>"+data.responseJSON[er]+"</li>";
                            }
                        }else{
                            errHTML+='<li>Error al borrar el &aacute;rea de atenci&oacute;n.</li>';
                        }
                        $("#erroresContentEmpleado").html(errHTML); 
                        $('#erroresModalEmpleado').modal('show');
                    }
                });
            }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                'Canceladoo!',
                'No se realizo ningun cambio :)',
                'error'
                )
            }
        });
        
        $("#erroresContent").html(errHTML); 
        $('#erroresModal').modal('show');
    });
</script>
