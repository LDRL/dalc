
   

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
                                <h4 class="box-title" align="center">Listado Usuario inactivo</h4>
                                <hr style="border-color:black;"/>
				        	</div>
				            <div><br></div>
				   
				        </div>

				        @if(count($usuarios) > 0)
				        
				            <div class="ibox-content">
                    			<div class="table-responsive">
                        			<table class="table table-striped table-bordered table-condensed table-hover dataTables-index-Uinactivo">
				                        <thead>
				                            <th  style="width: 5%">Id</th>
				                            <th  style="width: 20%">Nombre</th>
				                            <th  style="width: 20%">Email</th>
				                            <th >Roles</th>
				                            <th  style="width: 5%">Opciones</th>
				                        </thead>
		                                @foreach ($usuarios as $usu)
		                                <tr id="udetalle{{$usu->id}}">
		                                    <td>{{$usu->id}}</td>
		                                    <td class="mailbox-messages mailbox-name">{{ $usu->name  }}</td>
		                                    <td>{{$usu->email}}</td>
		                                    <td><span class="label label-success">
		                                        @foreach($usu->getRoles() as $roles)
		                                            {{  $roles.","  }}
		                                        @endforeach
		                                    </span></td>
	                                        <td>
	                                        	<button class="btn btn-success btn-md btn-activaru" id="FWEF" value="{{$usu->id}}" title="Recuperar" ><i class="fa fa-star"></i></button>
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



<script type="text/javascript">
//Recuperar empleado
    $(document).on('click','.btn-activaru',function(){
        var idusu=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Esta seguro de cambiar de status a usuario Activo?',
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
                var miurl=urlraiz+"/seguridad/recuperar/" + idusu; 
                $.ajax({
                    type: "PUT",
                    url: miurl,
                    success: function (data) {
                        $("#udetalle" + idusu).remove();
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
<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $('.dataTables-index-Uinactivo').DataTable({
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