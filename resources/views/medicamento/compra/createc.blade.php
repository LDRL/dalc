<div class="col-lg-12" id="modalc">
    <div class="modal fade" id="formModalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="inputTitleUsuario" align="center"></h4>
                </div>

                <form role="form" id="formAgregarCompra">
                    <div class="modal-header">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="medi">
                            <label class="col-md-2">Medicamento</label>
                            <div class="col-md-6">
                                <input type="text" name="" value="{{$medicamento->medicamento.' '.$medicamento->marca.' '.$medicamento->presentacion}}" class="form-control" disabled="">

                                <input type="hidden" name="" value="{{$medicamento->idmedicamento}}" id="idmedicamento">
                                
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="prov">
                                    <div><br></div>
                            
                            <label class="col-md-2">Proveedor</label>
                            <div class="col-md-6">
                                <input type="text" name="" placeholder="Proveedor..." class="form-control" disabled="" id="provee">
                                <input type="hidden" id="idproveedor">                
                            </div>

                            <div class="col-md-4">
                                <a href="javascript:void(0);" onclick="cargarbusqueda(6);">
                                    <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar Proveedor" value=""><i class="fa fa-search"></i></button>
                                </a>
                                <a href="javascript:void(0);" onclick="cargarmodal(6);">
                                    <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Proveedor" value=""><i class="fa fa-plus-square"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ubic">
                            <label class="col-md-2">Ubicación</label>
                            <div class="col-md-6">
                                <input type="text" name="" id="ubicacion" placeholder="Habitacion-Estanteria-Coordenada" class="form-control" disabled="">
                                <input type="hidden" id="idubicacion">  
                           </div>

                            <div class="col-md-4">
                                <a href="javascript:void(0);" onclick="cargarbusqueda(7);">
                                    <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar ubicacion" value=""><i class="fa fa-search"></i></button>
                                </a>
                                <a href="javascript:void(0);" onclick="cargarmodal(7);">
                                    <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Tipo medicamento" value=""><i class="fa fa-plus-square"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Fecha compra</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="buy_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Fecha vencimiento</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="expiration_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio</label>
                            <input type="number" id="precio" class="form-control" placeholder="Q00.00">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cantidad</label>
                            <input type="number" id="cantidad" class="form-control" placeholder="0">
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <div class="col-md-12">
                        <div><br></div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-btnGuardarCom" id="btnGuardarCompra">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="erroresModalCM" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorCM"> Error</h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentCM"></ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Sweet alert -->
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>

<!-- DatePicker -->
    <script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/plugins/footable/footable.all.min.js')}}"></script>

<script type="text/javascript">

    $('#buy_date').datepicker({
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

    $(document).on('click','.btn-btnGuardarCom',function(e){
        var $f = $(this);
        if($f.data('locked') == undefined && !$f.data('locked'))
        {
            var urlraiz=$("#url_raiz_proyecto").val();
            var miurl=urlraiz+"/medicamento/compra/store";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            var formData = {
                proveedor: $("#idproveedor").val(),
                medicamento: $("#idmedicamento").val(),
                fecha_compra: $("#buy_date").val(),
                fecha_vencimiento: $("#expiration_date").val(),
                precio: $("#precio").val(),
                cantidad: $("#cantidad").val(),
                ubicacion: $("#idubicacion").val(),
            };
                
            $.ajax({
                type: "POST",
                url: miurl,
                data: formData,
                dataType: 'json',
                    
                success: function (data) {
                    $f.data('locked', true);

                    $('#formAgregarCompra').trigger("reset");
                    $('#formModalUsuario').modal('hide');

                    swal({
                        title:"Envio correcto",
                        text: "Gracias",
                        type: "success"
                    }).then(function () {
                        cargarindex(5);
                    });

                    $f.data('locked',false);                },
                error: function (data) {
                    var errHTML="";
                    if((typeof data.responseJSON != 'undefined')){
                        for( var er in data.responseJSON.errors){
                            errHTML+="<li>"+data.responseJSON[er].errors+"</li>";
                        }
                    }else{
                        errHTML+='<li>Error.</li>';
                    }
                    $("#erroresContentCM").html(errHTML); 
                    $('#erroresModalCM').modal('show');
                }
            });
        }else{
            swal({
                title:"Envio en espera",
                text: "Se esta enviando su solicitud :)",
                type: "warning",
            });
        }
    });
    
</script>




