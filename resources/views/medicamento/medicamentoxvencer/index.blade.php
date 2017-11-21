<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($medicamentoxvencer))

                    @if(count($medicamentoxvencer) > 0)

                    <h4 class="box-title" align="center">Listado medicamento por vencer</h4>
                    <hr style="border-color:black;"/>

                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-index-compra" data-order='[[2, "asc"]]'>
                                <thead>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 40%">Medicamento</th>
                                        <th style="width: 20%">Fecha Vencimiento</th>
                                        <th style="width: 10%">Cantidad</th>
                                        <th style="width: 25%">Ubicacion</th>
                                        <!--<th style="width: 20%">Opciones</th>-->
                                </thead>
                                <tbody id="listempleado">
                                    @foreach ($medicamentoxvencer as $mxv)
                                    <tr class="even gradeA" id="medicamento{{$mxv->idmedicamento}}">
                                        <td>{{$mxv->idmedicamento}}</td>
                                        <td>{{$mxv->medicamento.' - '.$mxv->marca.' - '.$mxv->presentacion}}</td>
                                        <td>{{$mxv->fechavencimiento}}</td>
                                        <td>{{$mxv->cantidad}} Unidades</td>
                                        <td>{{$mxv->habitacion.' - '.$mxv->estanteria.' - '.$mxv->coordenada}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                        <br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ningun medicamento por vencer</label></div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-compra').DataTable({
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
                ],

                aLengthMenu:[
                10,15,25],

                buttons: [
                    
                ]
    });
</script>