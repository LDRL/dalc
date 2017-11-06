

$(document).on('click','.btn-btnGuardarRequisicion',function(e){
    var itemsData=[];
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/medicamento/requisicion/store";
        
    $('#detallerequi tr').each(function(){
        var id = $(this).closest('tr').find('input[type="hidden"]').val();
        var cant = $(this).find('td').eq(2).html();
        valor = new Array(id,cant);
        itemsData.push(valor);
    });
        
    var formData = {
        paciente: $('#idpaciente').val(),
        items: itemsData,
    };
        
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',
            
        success: function (data) {
            swal({ 
                title:"Envio correcto",
                text: "Información guardada correctamente",
                type: "success"
            },
            }).then(function () {
                cargarindex(7);
            });     
        },
        error: function (data) {
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON.errors){
                        errHTML+="<li>"+data.responseJSON.errors[er]+"</li>";
                }
            }else{
                errHTML+='<li>Error al borrar el &aacute;rea de atenci&oacute;n.</li>';
            }
            $("#erroresContentEmpleado").html(errHTML); 
            $('#erroresModalEmpleado').modal('show');
        },
    });
});