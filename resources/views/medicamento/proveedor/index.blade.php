<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($proveedores))
                    @if(count($proveedores) > 0)

                    <h4 class="box-title" align="center">Listado Proveedores</h4>
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
                                            
                                            <button class="btn btn-danger btn-md btn-eliminarpro" id="FWEF" value="{{$pro->idproveedor}}" title="Eliminar proveedor" ><i class="fa fa-remove"></i></button>                                                

                                    
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

@include('medicamento.proveedor.create')

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