var cont = 0;
    function agregarm(){
        sustancia = $("#sustancia").val();
        idsustancia = $("#idprincipio").val();
        concentracion = $('#concentracion').val();
        console.log(idsustancia);

        if(sustancia != '' && concentracion != '' && idsustancia != '')
        {   
            var item  = '<tr class="even gradeA" id="sustancia'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminarm('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idprincipio[]" value="'+idsustancia+'">'+sustancia+'</td>';
            item += '<td>'+concentracion+'</td><tr>';
            cont++;

        $('#detallecompo').append(item);
        limpiar();
        evaluarm();
        }
        else{
            alert("Error al ingresar el detalle, revise los datos del medicamento")
        }

        
        function limpiar(){
            $("#sustancia").val("");
            $("#idprincipio").val("");
            $("#concentracion").val("");
        }
    }
//btn-addcon

    $(document).on('click','.btn-addcon',function(e){
        agregarm();
    });

     function evaluarm(){
        if (cont>0){
            $("#btnGuardarMedicamento").show();
        }
        else{

            $("#btnGuardarMedicamento").hide();
        }
    }

    function eliminarm(index){
       $("#sustancia" + index).remove();
       cont--;
       evaluarm();
    }

$(document).on('click','.btn-btnGuardarMedicamento',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/store";

    var itemsData=[];

    $('#detallecompo tr').each(function(){
        var id = $(this).closest('tr').find('input[type="hidden"]').val();
        var expiration_date = $(this).find('td').eq(2).html();
        valor = new Array(id,expiration_date);
        itemsData.push(valor);
    });
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        idmarca: $("#idmarca").val(),
        idpresentacion: $("#idpresentacion").val(),
        medicamento: $("#medicamento").val(),
        items: itemsData,
    };

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {

            $('#formAgregarUsuario').trigger("reset");
            $('#formModalUsuario').modal('hide');

            swal({
                    title: '¿Desea agregar medicamento al inventario?',
                    text: "Precione si para realizar un nuevo registro, no para cerrar este mensaje.",
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
                        var miurl=urlraiz+"/medicamento/compra/addc/"+data.idmedicamento;
                        var errHTML="";
                        $.ajax({
                            url: miurl
                        }).done( function(resul) 
                        {
                            $("#capa_modal").html(resul);
                            $('#inputTitleUsuario').html("Nuevo ingreso medicamento al inventario");
                            $('#formModalUsuario').modal('show'); 
                        }).fail(function() 
                        {
                            $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                        });
                    }, function (dismiss) {
                        // dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                        if (dismiss === 'cancel') {
                            swal({ 
                                title:"Envio correcto",
                                text: "Se guardado correctamente un nuevo ingreso de medicamento al invetario",
                                type: "success"
                            }).then(function(){
                                cargarindex(4);
                            });
                        }
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

$(document).on('click','.btn-btnGuardarMed',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/store";
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/store";

    var formData = {
        idmarca: $("#idmarca").val(),
        idtipo: $("#idtipo").val(),
        medicamento: $("#medicamento").val(),

    };
        
        $.ajax({
            type: "POST",
            url: miurl,
            data: formData,
            dataType: 'json',
            
            success: function (data) {
                var cursos = $("#idmedicamento");
                    $(data).each(function(i, v){ // indice, valor
                        cursos.append('<option value="' + v.idmedicamento + '">' + v.medicamento +' '+ v.tipo +' '+ v.marca + '</option>');
                })
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                alert('Se registro una nuevo medicamento');

                $('#formAgregarMedicamento').trigger("reset");
                $('#formModal').modal('hide');

            },
            error: function (data) {
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON.errors){
                        errHTML+="<li>"+data.responseJSON[er].errors+"</li>";
                    }
                    }else{
                        errHTML+='<li>Error.</li>';
                    }
                $("#erroresContentMarca").html(errHTML); 
                $('#erroresModalMarca').modal('show');
            },
        });
    });