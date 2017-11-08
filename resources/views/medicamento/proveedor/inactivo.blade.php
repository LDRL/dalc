<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($proveedores))
                    @if(count($proveedores) > 0)

                    <h4 class="box-title" align="center">Listado Proveedores Inactivos</h4>
                    <hr style="border-color:black;"/>
                        
                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-index-proveedor" >
                                <thead>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 15%">Proveedor</th>
                                        <th style="width: 10%">Nit</th>
                                        <th style="width: 10%">Tel&eacute;fono</th>
                                        <th style="width: 30%">Direcci&oacute;n</th>
                                        <th style="width: 10%">Cuenta</th>
                                        <th style="width: 10%">Cheque</th>
                                        <th style="width: 10%">Opciones</th>
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($proveedores as $pro)
                                    <tr class="even gradeA" id="proveedor{{$pro->idproveedor}}">
                                        <td>{{$pro->idproveedor}}</td>
                                        <td>{{$pro->proveedor}}</td>
                                        <td>{{$pro->nit}}</td>
                                        <td>{{$pro->telefono}}</td>
                                        <td>{{$pro->direccion}}</td>
                                        <td>{{$pro->cuenta}}</td>
                                        <td>{{$pro->chequenombre}}</td>
                                        <td>
                                            <button class="btn  btn-warning btn-md btn-editar-proveedor" title="Editar" value="{{$pro->idproveedor}}"><i class="fa fa-pencil"></i></button>

                                           	<button class="btn btn-success btn-md btn-activarp" id="FWEF" value="{{$pro->idproveedor}}" title="Recuperar" ><i class="fa fa-star"></i></button>                          
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ningun proveedor</label></div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="erroresModalProveedor" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorProveedor"></h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentProveedor"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-proveedor').DataTable({
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No hay datos en la tabla",
                    "info":           "",
                    "infoEmpty":      "",
                    "infoFiltered":   "",
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
    $(document).on('click','.btn-activarp',function(){
        var idpro=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Esta seguro de cambiar de estado a proveedor Activo?',
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
                var miurl=urlraiz+"/medicamento/proveedor/recuperar/" + idpro; 
                $.ajax({

                    type: "PUT",
                    url: miurl,
                    success: function (data) {
                        $("#proveedor" + idpro).remove();
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
                        $("#erroresContentProveedor").html(errHTML); 
                        $('#erroresModalProveedor').modal('show');
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
    });
</script>