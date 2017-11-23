
        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
        <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

<div class="tabs-container" id="contentsecundario">
	<div class="row">
	    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	    <h3 class="text-center">Historial donaciones de Bienhechor</h3>
	        <h4>Nombre Bienhechor:&nbsp;&nbsp;{{$bienhechor->nombre.' '.$bienhechor->apellido}}</h4>
	        <h4>Teléfono:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->telefono}}</h4>
	        <h4>Correo electronico:&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->correo}}</h4>
	        <h4>Dirección:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->direccion}}</h4>
	        <h4>Nit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->nit}}</h4>
	        <h4>Tipo de Bienhechor:&nbsp;&nbsp;&nbsp;{{$bienhechor->permanente}}</h4>
	    </div>
	</div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div><br></div>
                <div class="margin" id="botones_control">
                    <a href="javascript:void(0);" onclick="cargarindex(20);">
                        <button class="btn btn-primary btn-md" title="Listado de Bienechor"><i class="fa fa-arrow-circle-left"></i></button>
                    </a>
                    <button class="btn btn-primary btn-addDB1" value="{{$bienhechor->idpersona}}" title="Nuevo Bienechor">Nueva Donación</button>
                </div>
            <div><br></div>
        </div>
    </div>
	<div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover dataTables-index-detalles"> 
                    <thead>
                        <th style="width: 2%">Id</th>
                        <th style="width: 10%">Tipo de donación</th>
                        <th style="width: 10%">Monto</th>
                        <th style="width: 10%">Fecha donativo</th>
                        <th style="width: 35%">Descripción</th>
                        <th style="width: 15%">Opciones</th>
                    </thead>
                    <tbody id="donativos">
                        @foreach ($donaciones as $don)
                            <tr class="even gradeA" id="donativo{{$don->idbienhechor}}">
                                <td>{{$don->idbienhechor}}</td>
                                <td>{{$don->donaciontipo}}</td>
                                <td>{{$don->monto}}</td>
                                <td>{{$don->fechadonacion}}</td>
                                <td>{{$don->descripcion}}</td>
                                <td>
                                    <button class="btn  btn-warning btn-md btneditdb" value="{{$don->idbienhechor}}" title="Editar"><i class="fa fa-pencil"></i></button> 	
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
    <div class="modal fade" id="formModalD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitleD"></h4>
                            </div>

                        <form role="form" id="formAgregarD">
                            <div class="modal-header">
                            <input id="iddona" type="hidden" class="form-control" maxlength="9" aria-describedby="basic-addon1"> 
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Bienhechor</label>
                                    <input id="nombreD" type="text" class="form-control" aria-describedby="basic-addon1" disabled="disabled">   
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Fecha del donativo</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fechadona" type="text" class="form-control">
                                    </div>
                                     
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label>Tipo de donativo</label>
                                        <select id="tipodonativo" class="form-control" onchange="ocultar();">
                                            @foreach($donacion as $td)
                                                <option value="{{$td->idtipodonacion}}">{{$td->donaciontipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <br>    
                                        <button type="button" id="btntd" class="btn btn-success btn-md btntd" title="Agregar"><i class="fa fa-window-restore"></i></button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="divcant" style="display: none;">
                                    <label class="control-label">Monto</label>
                                    <input id="cantidad" type="text" class="form-control" maxlength="9" aria-describedby="basic-addon1">   
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label">Descripción</label>
                                    <textarea class="form-control" id="observaciones" rows="3" maxlength="300"></textarea>
                                </div>
                            </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary btnGuardarD1" id="btnGuardarD1">Guardar</button>
                            <input type="hidden" id="idbi" name="idbi" value="0"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-lg-8">
                <div class="modal fade" id="formModaltd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitletd"></h4>
                            </div>

                        <form role="form" id="formAgregartd">
                            <div class="modal-header">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Nombre del tipo de donación</label>
                                        <input id="tdonativo" type="text" maxlength="39" class="form-control" aria-describedby="basic-addon1">   
                                    </div>
                                </div>
                            </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardartd">Guardar</button>
                            <input type="hidden" id="idbt" name="idbt" value="0"/>
                        </div>
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

<meta name="_token" content="{!! csrf_token() !!}" />

<script src="{{asset('assets/js/bienhechor/donacion.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>
<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#fechadona').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
                
        });

        $("#formAgregar").validate({
                 rules: {
                    email: {
                        required: true,
                        email: true
                    }
                 }
             });
    });
    function ocultar()
    {
        var selec = $("#tipodonativo option:selected").text();
        if (selec == 'Dinero') {
            $("#divcant").show();
        }
        else
        {
            $("#divcant").hide();
        }
    }
</script>
<script>
    $('.dataTables-index-detalles').DataTable({
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

