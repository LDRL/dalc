<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($requisicion))

                    @if(count($requisicion) > 0)

                    <h4 class="box-title" align="center">Listado requisición Medicamento</h4>
                    <hr style="border-color:black;"/>

                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-index-MRequisicion" >
                                <thead>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 20%">Usuario</th>
                                    <th style="width: 10%">Paciente</th>
                                    <th style="width: 10%">Tipo requisición</th>
                                    <th style="width: 20%">Opciones</th>
                                </thead>
                                <tbody id="listrequisicion">
                                    @foreach ($requisicion as $req)
                                    <tr class="even gradeA" id="requisicion{{$req->idrequisicion}}">
                                        <td>{{$req->idrequisicion}}</td>
                                        <td>{{$req->name}}</td>
                                        <td>{{$req->nombrepa}}</td>
                                        <td>{{$req->tiporequisicion}}</td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="detalle(7,{{$req->idrequisicion}});">
                                            <button type="button" class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles"><i class="fa fa-address-card"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                        <br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ninguna descarga de un medicamento</label></div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-Uactivo').DataTable({
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
                null
                ],

                aLengthMenu:[
                10,15,25],

                buttons: [
                    
                ]
    });
</script>

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-MRequisicion').DataTable({
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No hay datos disponibles en la tabla",
                    "info":           "Mostrar _START_ a _END_ de _TOTAL_ registros por pagina",
                    "infoEmpty":      "Showing 0 to 0 of 0 entries",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "cargando...",
                    "processing":     "Processing...",
                    "search":         "Buscar:",
                    "total":          "total",          
                    "zeroRecords":    "No se encontraron registros coincidentes",
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
                null
                ],

                aLengthMenu:[
                10,15,20],

                buttons: [
                    
                ]
    });
</script>