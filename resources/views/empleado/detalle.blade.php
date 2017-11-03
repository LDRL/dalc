        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
        <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

<div class="tabs-container" id="contentsecundario">
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title" align="center">Datos del empleado</h3>
            <hr style="border-color:black;"/>
	        <h4><strong>Nombre Empleado:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->nombre.' '.$detalle->apellido}}</h4>
	        <h4><strong>Teléfono:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->telefono}}</h4>
	        <h4><strong>Correo electronico:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->correo}}</h4>
            <h4><strong>Dirección:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->direccion}} 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>

	        <h4><strong>Nit:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->nit}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Identificacion:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->dpi}}</h4>
            <h4><strong>Estado Civil</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$detalle->estadocivil}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Fecha Nacimiento</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->fechanacimiento}}</h4>
	    </div>
	</div>
    <input type="hidden" name="" id="idempleado" value="{{$detalle->idempleado}}">

    <div>
        <a href="javascript:void(0);" onclick="cargarindex(1);">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>
        <button class="btn btn-primary btn-addtra" title="Nuevo antecedente">Nuevo antecedente</button>


    </div>
    
	<div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
                        <th style="width: 2%">Id</th>
                        <th style="width: 10%">Tipo de antecedente</th>
                        <th style="width: 10%">Fecha vencimiento</th>
                        <th style="width: 10%">Opciones</th>
                    </thead>
                    <tbody id="antecedentes">
                        @foreach ($tramite as $tra)
                            <tr class="even gradeA" id="antecedente{{$tra->idtramite}}">
                                <td>{{$tra->idtramite}}</td>
                                <td>{{$tra->nombreantecedente}}</td>
                                <td>{{$tra->fechavencimiento}}</td>
                                <td>
                                    <button class="btn  btn-warning btn-md btn-editartra" value="{{$tra->idtramite}}" title="Editar"><i class="fa fa-pencil"></i></button>

                                    <button class="btn btn-danger btn-md btn-eliminartra" id="FWEF" value="{{$tra->idtramite}}" title="Eliminar" ><i class="fa fa-remove"></i></button>  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>           
    </div>
</div>

<div class="col-lg-12">
    <div class="modal fade" id="formModalTra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="inputTitleTra"></h4>
                </div>

                <form role="form" id="formAgregarTra">
                    <div class="modal-header">
                        <input id="iddona" type="hidden" class="form-control" maxlength="9" aria-describedby="basic-addon1"> 
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Tipo Antecedente</label>
                                <select name="idtipoantecedente" id="idtipoantecedente" class="form-control select2" data-live-search="true">
                                @if (isset($tipoantecedente))
                                @foreach($tipoantecedente as $tip)
                                    <option value="{{$tip->idtipoantecedente}}">{{$tip->nombreantecedente}}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Fecha vencimiento de antecedentes</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="expiration_date" type="text" class="form-control">
                                </div>
                            </div>
                        </div>


                    </div> 
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarTra">Guardar</button>
                    <input type="hidden" id="idtra" name="idtra" value="0"/>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="erroresModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Errores</h4>
          </div>

          <div class="modal-body">
            <ul style="list-style-type:circle" id="erroresContent"></ul>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
</div>



<script>
    $(document).ready(function() {
        $('#expiration_date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true    
        });

        var urlraiz=$("#url_raiz_proyecto").val();

        $(document).on('click','.btn-addtra',function(){
                $('#inputTitleTra').html("Nuevo antecedente");
                $('#formAgregar').trigger("reset");
                $('#btnGuardarTra').val('addtra');
                $('#formModalTra').modal('show');
            });


        
        $(document).on('click','.btn-editartra',function(){
            var idt=$(this).val();
            var miurl = urlraiz+"/empleado/tramite/edit/"+idt;

            $.get(miurl,function(data){

                $('#idtra').val(data.idtramite);
                $('#expiration_date').val(data.fechavencimiento);
                $('#idtipoantecedente option:selected').val(data.idtipoantecedente);
                $('#idtipoantecedente option:selected').text(data.antecedente);

                $('#inputTitleTra').html("Modificar datos del empleado");
                $('#formModalTra').modal('show');
                $('#btnGuardarTra').val('update');
            });
        });

        $("#btnGuardarTra").click(function(e){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var miurl;
                var state=$("#btnGuardarTra").val();
                var idtra=$('#idtra').val();
                var type;
                var formData = {
                    idtipoantecedente:$("#idtipoantecedente").val(),
                    fecha_vencimiento:$("#expiration_date").val(),
                    empleado:$("#idempleado").val(),
                };

                if (state == "addtra") 
                    {
                        type="POST";
                        miurl = miurl=urlraiz+"/empleado/tramite/store";
                    }

                if (state == "update") 
                    {
                        type="PUT";
                        miurl=urlraiz+"/empleado/tramite/update/"+idtra;
                    }

                $.ajax({
                    type: type,
                    url: miurl,
                    data: formData,
                    dataType: 'json',

                    success: function (data) {
                        var item = '<tr class="even gradeA" id="antecedente'+data.idtramite+'">';
                            item += '<td>'+data.idtramite+'</td>';
                            item += '<td>'+data.antecedente+'</td>';
                            item += '<td>'+data.fechavencimiento+'</td>';
                            item += '<td><button class="btn  btn-warning btn-md btn-editartra" title="Editar" value="'+data.idtramite+'"><i class="fa fa-pencil"></i></button>';
                            item += '<button class="btn btn-danger btn-md btn-eliminartra" value="'+data.idtramite+'" title="Eliminar" ><i class="fa fa-remove"></i></button></td></tr>';
                        if (state == "addtra")
                        {
                            $('#antecedentes').append(item);
                            swal(
                                '¡Hecho!',
                                'Se ha guardado un nuevo registro :)',
                                'success'
                            )
                        }
                        if (state == "update")
                        {
                            swal("¡Hecho!",
                            "Se actualizaron correctamente los datos del empleado",
                            "success");
                            $("#antecedente"+idtra).replaceWith(item);
                        }

                        $('#formModalTra').modal('hide');
                        
                    },
                    error: function (data) {
                        $('#loading').modal('hide');
                        var errHTML="";
                        if((typeof data.responseJSON != 'undefined')){
                            for( var er in data.responseJSON){
                                errHTML+="<li>"+data.responseJSON[er]+"</li>";
                            }
                        }else{
                            errHTML+='<li>Error al intentar guardar un nuevo registro, intente mas tarde.</li>';
                        }
                        $("#erroresContent").html(errHTML); 
                        $('#erroresModal').modal('show');
                    }
                });
            });



        $(document).on('click','.btn-eliminartra',function(){

            var idtra=$(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            swal({
                title: '¿Esta seguro de eliminar este registro',
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
                    $.ajax({
                        type: "DELETE",
                        url: urlraiz+'/empleado/tramite/delete/' + idtra,
                        success: function (data) {
                            console.log(data);
                            $("#antecedente" + idtra).remove();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                            //$("#erroresContent").html(errHTML); 
                            //$('#erroresModal').modal('show');
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
    });
</script>

<meta name="_token" content="{!! csrf_token() !!}" />

<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>