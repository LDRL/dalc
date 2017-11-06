<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<!--Contenido-->
<div class="tabs-container ibox-content" id="contpaciente">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 align="center">Listado general de pacientes inactivos</h2>
			<hr style="border-color:black;"/>
		</div>
	</div>
	<div class="row" id="divcontable">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tale-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover dataTables-index-paciente">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Ingreso</th>
						<th>Encargado</th>
						<th>Teléfono</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach ($paciente as $pas)
                            <tr class="even gradeA" id="paci{{$pas->idpaciente}}">
                                        <td>{{$pas->idpaciente}}</td>
                                        <td>{{$pas->nombrepa}}</td>
                                        <td>{{$pas->fechaingreso}}</td>
                                        <td>{{$pas->nombre}}</td>
                                        <td>{{$pas->telefono}}</td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="detalle(21,{{$pas->idpaciente}});"><button class="btn btn-primary btn-md btndetalles" title="Detalles"><i class="fa fa-address-card"></i></button></a>
                                            
                                            <a href="javascript:void(0);" onclick="detalle(9,{{$pas->idpaciente}});">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles Examen"><i class="fa fa-file-text-o"></i></button></a>
                                            <button class="btn btn-success btn-md btnrecupera" title="Recuperar" value="{{$pas->idpaciente}}"><i class="fa fa-star"></i></button>
                                        </td>
                                    </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>

<script src="{{asset('assets/js/pacientes/pacientelista.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-paciente').DataTable({
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
                { "bSortable": false }
                ],

                aLengthMenu:[
                10,15],

                buttons: [
                    
                ]
    });
</script>