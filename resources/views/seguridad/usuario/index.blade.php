
   

<div class="tabs-container">
    <!--<ul class="nav nav-tabs">
        <li class="active" data-toggle="tab" aria-expanded="false">
            <a data-toggle="tab" aria-expanded="false">
                <span class="visible-xs"><i class="md md-perm-contact-cal"></i></span>
                <span class="hidden-xs">Listado de usuarios</span>
            </a>
        </li>
    </ul> -->
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
				<div class="tab-pan active" id="contentsecundario">
				    @if(isset($usuarios))

				        <div class="row">
				        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                @include('seguridad.usuario.search')

				        	</div>
				            <div><br></div>
				   
				        </div>

				        @if(count($usuarios) > 0)
				        
				            <div class="ibox-content">
                    			<div class="table-responsive">
                        			<table class="table table-striped table-bordered table-condensed table-hover dataTables-index-Uactivo">
				                        <thead>
				                            <th  style="width: 5%">Id</th>
				                            <th  style="width: 20%">Nombre usuario</th>
				                            <th  style="width: 20%">Correo</th>
				                            <th >Roles</th>
				                            <th  style="width: 5%">Opciones</th>
				                        </thead>
		                                @foreach ($usuarios as $usu)
		                                <tr id="udetalle{{$usu->id}}">
		                                    <td>{{$usu->id}}</td>
		                                    <td class="mailbox-messages mailbox-name">{{ $usu->name  }}</td>
		                                    <td style="width: 20%s">{{$usu->email}}</td>
		                                    <td><span class="label label-success">
		                                        @foreach($usu->getRoles() as $roles)
		                                            {{  $roles.","  }}
		                                        @endforeach
		                                    </span></td>
	                                        <td style="width: 20%">
	                                        	<button class="btn  btn-warning btn-md btneditb" title="Editar" value="{{$usu->id}}" onclick="verinfo_usuario({{$usu->id}})" > <i class="fa fa-pencil"></i></button>
	                                        	<button class="btn btn-danger btn-md btn-eliminaru" id="FWEF" value="{{$usu->id}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
	                                        </td>                     
	                                    </tr>
	                                    @include('seguridad.usuario.modal')
		                                @endforeach
				                    </table>
				                </div>
				            </div>           
				        @else
				            <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 
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
<!--
<script type="text/javascript">
        document.getElementById('dato_buscado').focus();

    
        $(document).ready(function() {


            $('#dato_buscado').keypress(function(e){   
                if(e.which == 13){      
                    buscarusuario();
                    document.getElementById('dato_buscado').focus();

                }   
            });
        });

    </script>
-->
