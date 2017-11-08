<!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

<div class="tabs-container" id="contentsecundario">
	<div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title" align="center">Datos del encabezado de una descarga de medicamento</h3>
            <hr style="border-color:black;"/>
	        <h4><strong>Nombre Paciente:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->nombrepa}}</h4>
	        <h4><strong>Usuario:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detalle->name}}</h4>
	        <h4><strong>Tipo Requisición:</strong>&nbsp;&nbsp;&nbsp;{{$detalle->tiporequisicion}}</h4>
	    </div>
	</div>

    <div>
        <a href="javascript:void(0);" onclick="cargarindex(7);">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>
    </div>
    
	<div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
                        <th style="width: 2%">Id</th>
                        <th style="width: 10%">Cantidad requerida</th>
                        <th style="width: 10%">Medicamento requerido</th>
                    </thead>
                    <tbody id="donativos">
                        @foreach ($requisiciondetalle as $rde)
                            <tr class="even gradeA" id="detallerequisicion{{$rde->iddetalle}}">
                                <td>{{$rde->iddetalle}}</td>
                                <td>{{$rde->cantidad}}</td>
                                <td>{{$rde->medicamento.' '.$rde->marca.' '.$rde->presentacion}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
<script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

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
</script>

