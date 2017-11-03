<div class="col-lg-12" id="modales">
    <div class="modal fade" id="formModalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="inputTitleUsuario" align="center"></h4>
                </div>

                @include('medicamento.compra.modalcreate')

                <div class="modal-footer">
                    <div class="col-md-12">
                        <div><br></div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-btnGuardarCompra" id="btnGuardarCompra">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="erroresModalMedicamento" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="inputErrorMedicamento">Error</h4>
            </div>
            <div class="modal-body">
                <ul style="list-style-type:circle" id="erroresContentMedicamento"></ul>
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
        $('.chosen-select').chosen({width: "100%"});

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



    $(document).on('click','.btn-btnGuardarCompra',function(e){
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
                $('#formAgregarCompra').trigger("reset");
                $('#formModalUsuario').modal('hide');
                swal({
                    title:"Envio correcto",
                    text: "Gracias",
                    type: "success"
                }).then(function () {
                    cargarindex(5);
                });
            },
            error: function (data) {
                $('#loading').modal('hide');
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON.errors){
                        errHTML+="<li>"+data.responseJSON.errors[er]+"</li>";
                    }
                }else{
                    errHTML+='<li>Error</li>';
                }

                $("#erroresContentMedicamento").html(errHTML); 
                $('#erroresModalMedicamento').modal('show');
            }
        });
    });
</script>




