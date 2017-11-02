

    <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/footable/footable.core.css')}}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->


<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
        <h4 class="box-title" align="center">Nuevo Empleado</h4> 
        <a href="javascript:void(0);" onclick="cargarindex(1);">
            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Listado Empleado"><i class="fa fa-arrow-circle-left"></i></button>
        </a>
        <hr style="border-color:black;"/>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control required" placeholder=".." required maxlength="50">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="..." maxlength="50">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="stock">Direccion</label>
                                <input type="text" name="direccion"  id="direccion" class="form-control" placeholder="..." maxlength="100">
                            </div>
                        </div>
                        

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label for="descripcion">Telefono</label>
                            <div class="input-group">
                                <span class="input-group-addon">502</span>
                                <input type="text" name="telefono"  id="telefono" class="form-control" placeholder="..." maxlength="8" onkeypress="return valida(event)">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">DPI</label>
                                <input type="text" name="dpi" id="dpi" class="form-control" placeholder="..." maxlength="13" onkeypress="return valida(event)">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="puesto">Estado Civil</label>
                                <select id="idcivil" class="form-control select2" data-live-search="true">
                                @if (isset($estadocivil))
                                @foreach($estadocivil as $est)
                                    <option value="{{$est->idcivil}}">{{$est->nombre}}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
                            <br>
                            <button id="btn-addec" class="btn btn-success btn-md btn-addec" title="Agregar estado civil"><i class="fa fa-window-restore"></i></button>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Correo electronico</label>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="...">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Fecha nacimiento</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="birth_date" type="text" class="form-control" value="03/04/2014" maxlength="10">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="puesto">Puesto</label>
                                <select name="idpuesto" id="idpuesto" class="form-control select2" data-live-search="true">
                                @if (isset($puesto))
                                @foreach($puesto as $pue)
                                    <option value="{{$pue->idpuesto}}">{{$pue->nombrepuesto}}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
                            <br>
                            <button id="btn-addp" class="btn btn-success btn-md btn-addp" title="Agregar puesto"><i class="fa fa-window-restore"></i></button>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Salario</label>
                                <input type="number" name="salario" id="salario" class="form-control" placeholder="..." value="0" maxlength="18" onkeypress="return valida(event)" min="0">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Fecha inicio labores</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_work_start" type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Nit</label>
                                <input type="text" name="nit"  id="nit" class="form-control" placeholder="..." maxlength="9">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
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

                        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
                            <br>
                            <button id="btn-addta" class="btn btn-success btn-md btn-addta" title="Agregar tipo antecedente"><i class="fa fa-window-restore"></i></button>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Fecha vencimiento de antecedentes</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="expiration_date" type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <br>
                                <button type="button" id="bt_add" class="btn btn-info btn-md" title="Añadir"><i class="fa fa-plus-circle"></i>&nbsp;Añadir</button>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-hover">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Tipo Antecedente</th>
                                        <th>Fecha Vencimiento</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                        <!--

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" class="form-control">
                            </div>
                        </div>
                        -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div><br></div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-btnGuardarEmpleado"  type="button" id="btnGuardarEmpleado" style="display:none;" >Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>       

<!-- Modal for displaying the messages -->
<div class="modal fade" id="erroresModalEmpleado" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Errores</h4>
            </div>

            <div class="modal-body">
                   <ul style="list-style-type:circle" id="erroresContentEmpleado"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-12">
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitle"></h4>
                            </div>

                        <form role="form" id="formAgregar">
                            <div class="modal-header">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Nombre</label>
                                        <input id="nombre_" name="nombre" type="text" class="form-control" aria-describedby="basic-addon1">   
                                    </div>
                                </div>
                            </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardarO">Guardar</button>
                            <input type="hidden" id="idb" name="idb" value="0"/>
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
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/footable/footable.all.min.js')}}"></script>
<script src="{{asset('assets/js/validacion.js')}}"></script>
  
<!-- Sweet alert -->
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#date_work_start').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#birth_date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        $('#expiration_date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true    
        });
    });
</script>


<script type="text/javascript">

    $("#btn-addec").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nuevo Estado Civil");
                $('#formAgregar').trigger("reset");
                $('#btnGuardarO').val('addec');
                $('#formModal').modal('show');
            //});
    });

    $("#btn-addp").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nuevo Puesto");
                $('#formAgregar').trigger("reset");
                $('#btnGuardarO').val('addp');
                $('#formModal').modal('show');
            //});
    });

    $("#btn-addta").click(function(){
        //$(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nuevo Tipo Antecedente");
                $('#formAgregar').trigger("reset");
                $('#btnGuardarO').val('addt');
                $('#formModal').modal('show');
            //});
    });

    var cont = 0;
    function agregar(){

        idtipoantecedente =$("#idtipoantecedente option:selected").val(); 
        tipoantecedente =$("#idtipoantecedente option:selected").text();
        fechavencimiento = $('#expiration_date').val();

        var item  = '<tr class="even gradeA" id="tipoantecedente'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idtipoantecedente[]" value="'+idtipoantecedente+'">'+tipoantecedente+'</td>';
            item += '<td>'+fechavencimiento+'</td><tr>';
            cont++;

        $('#detalles').append(item);
        evaluar();
    }

    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
        });
    });

    function evaluar(){
        if (cont>0){
            $("#btnGuardarEmpleado").show();
        }
        else{
            $("#btnGuardarEmpleado").hide();
        }
    }

    function eliminar(index){
       $("#tipoantecedente" + index).remove();
       cont--;
       evaluar();
    }



    $("#btnGuardarO").click(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var miurl;
    var urlraiz=$("#url_raiz_proyecto").val();  

    var status = $("#btnGuardarO").val();
    var formData = {
            nombre:$("#nombre_").val(),
        };



    if (status == "addec") {
        miurl = urlraiz+"/empleado/estadocivil/store";
        console.log(miurl);
    }
    if (status == "addp") {
        miurl = urlraiz+'/empleado/puesto/store';
    }
    if (status == "addt") {
        miurl = urlraiz+'/empleado/tipoantecedente/store';
    }

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {
            if (status == "addec") {
                $(data).each(function(i,v){
                    $("#idcivil").append('<option selected value='+v.idcivil+'">'+v.nombre+'</option>');
                    
                });
            }
            if (status == "addp") {
                $(data).each(function(i,v){
                    $("#idpuesto").append('<option selected value='+v.idpuesto+'">'+v.nombrepuesto+'</option>');
                    
                });
            }
            if (status == "addt") {
                $(data).each(function(i,v){
                    $("#idtipoantecedente").append('<option selected value='+v.idtipoantecedente+'">'+v.nombreantecedente+'</option>');
                    ;
                });
            }
            
            
            $('#formModal').modal('hide');            
        },
        error: function (data) {
            $('#loading').modal('hide');
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON.errors){
                                errHTML+="<li>"+data.responseJSON.errors[er]+"</li>";
                }
            }else{
                errHTML+='<li>Error al intentar guardar un nuevo registro, intente mas tarde.</li>';
            }
            $("#erroresContent").html(errHTML); 
            $('#erroresModal').modal('show');
        }
    });
});
</script>