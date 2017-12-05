<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

<div class="tabs-container">
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
                <div class="tab-pan active" id="contentsecundario">
                    @if(isset($tramitexvencer))

                    @if(count($tramitexvencer) > 0)

                    <h4 class="box-title" align="center">Listado antecedentes por vencer</h4>
                    <hr style="border-color:black;"/>

                    <div class="ibox-content" style="border-color:black;">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-index-compra" data-order='[[3, "asc"]]'>
                                <thead>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 40%">Empleado</th>
                                    <th>Tipo Tramite</th>
                                    <th style="width: 20%">Fecha Vencimiento</th>
                                    <th style="width: 5%">Opciones</th>
                                </thead>
                                <tbody id="antecedentes">
                                    @foreach ($tramitexvencer as $txv)
                                    <tr class="even gradeA" id="antecedente{{$txv->idtramite}}">
                                        <td>{{$txv->idtramite}}</td>
                                        <td>{{$txv->nombre.' - '.$txv->apellido}}</td>
                                        <td>{{$txv->antecedente}}</td>
                                        <td>{{$txv->fechavencimiento}}</td>
                                        <td><button class="btn btn-warning btn-md btn-editartra" value="{{$txv->idtramite}}" title="Editar"><i class="fa fa-pencil"></i></button></td>
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

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>

<script>
    $('#expiration_date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true    
    });

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
            { "iDataSort": 1 }, 
            null,
        ],
        aLengthMenu:[
            10,15,25],
        buttons: [
        ]
    });


    var urlraiz=$("#url_raiz_proyecto").val();


    $(document).on('click','.btn-editartra',function(){
        var urlraiz=$("#url_raiz_proyecto").val();
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
                var item = '<tr class="even gradeA" id="tramite'+data.idtramite+'">';
                    item += '<td>'+data.idtramite+'</td>';
                    item += '<td>'+data.nombre+' '+data.apellido+'</td>';
                    item += '<td>'+data.antecedente+'</td>';
                    item += '<td>'+data.fechavencimiento+'</td>';
                    item += '<td><button class="btn  btn-warning btn-md btn-editartra" title="Editar" value="'+data.idtramite+'"><i class="fa fa-pencil"></i></button></td></tr>';
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
</script>


