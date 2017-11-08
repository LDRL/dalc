$(document).on('click','.btn-btnGuardarPri',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/principio/store";


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        nombre: $("#nombre").val(),
        familia: $("#idtipo").val(),
        valor: 1,
    };
        
        $.ajax({
            type: "POST",
            url: miurl,
            data: formData,
            dataType: 'json',
            
            success: function (data) {
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                alert('Se registro una nueva sustancia para un medicamento');
                console.log(data);
                document.getElementById("idprincipio").value = data.idprincipio;
                document.getElementById("sustancia").value=data.nombre+' '+data.familia;
                $('#formAgregarPrincipio').trigger("reset");
                $('#formModal').modal('hide');
            },
            error: function (data) {
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON.errors){
                        errHTML+="<li>"+data.responseJSON.errors[er]+"</li>";
                    }
                    }else{
                        errHTML+='<li>Error.</li>';
                    }
                $("#erroresContentPrincipio").html(errHTML); 
                $('#erroresModalPrincipio').modal('show');
            },
        });
});


$(document).on('click','.btn-btnGuardarPrincipio',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/principio/store";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        nombre: $("#nombre").val(),
        familia: $("#idtipo").val(),
        valor: 1,
    };
        
    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',
        
        success: function (data) {
            alert('Se registro una nueva sustancia para un medicamento');
            document.getElementById("idprincipio").value = data.idprincipio;
            document.getElementById("sustancia").value=data.nombre+' '+data.familia;
            $('#formAgregarPrincipio').trigger("reset");
            $('#formModal2').modal('hide');
        },

        error: function (data) {
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON.errors){
                    errHTML+="<li>"+data.responseJSON.errors[er]+"</li>";
                }
            }else{
                errHTML+='<li>Error.</li>';
            }

            $("#erroresContentPrincipio").html(errHTML); 
            $('#erroresModalPrincipio').modal('show');
        },
    });
});