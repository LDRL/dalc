$(document).on('click','.btn-GuardarUsuario',function(e){
    console.log('res');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/seguridad/store";
    var itemsData=[];

    $('#rolUsuario tr').each(function(){
        var id = $(this).closest('tr').find('input[type="hidden"]').val();
        valor = new Array(id);
        itemsData.push(valor);
            
    });

    var formData = {
        name: $("#name").val(),
        password: $("#password").val(),
        email: $("#email").val(),
        idpersona: $("#idpersona").val(),
        items: itemsData,
    };

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {
            swal({
                title:"Se registro un usuario nuevo",
                text: "Gracias",
                type: "success"
            }).then(function () {
                cargarindex(3);
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

            $("#erroresContentEmpleado").html(errHTML); 
            $('#erroresModalEmpleado').modal('show');
        }
    });
});

//Eliminar un bienhechor
    $(document).on('click','.btn-eliminaru',function(){
        var idusuario=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Esta seguro de dar de baja al usuario?',
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
                var urlraiz=$("#url_raiz_proyecto").val();
                var miurl = urlraiz+"/seguridad/delete/" + idusuario; 
                $.ajax({
                    type: "PUT",
                    url: miurl,
                    success: function (data) {
                        console.log(data);
                        $("#udetalle" + idusuario).remove();
                    },
                    error: function (data) {
                        var errHTML="";
                        if((typeof data.responseJSON != 'undefined')){
                        for( var er in data.responseJSON.errors){
                            errHTML+="<li>"+data.responseJSON.errors[er]+"</li>";
                        }
                        }else{
                          errHTML+='<li>Error</li>';
                        }

                        $("#erroresContentEmpleado").html(errHTML); 
                        $('#erroresModalEmpleado').modal('show');
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


function  verinfo_usuario(arg){

  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl =urlraiz+"/seguridad/editar_usuario/"+arg+""; 
   

    $("#contentsecundario").show();
    var screenTop = $(document).scrollTop();
    $("#capa_formularios").css('top', screenTop);
  $("#contentsecundario").html($("#cargador_empresa").html());

  $.ajax({
    url: miurl
  }).done( function(resul) 
  {
    $("#contentsecundario").html(resul);
  }).fail( function() 
  {
    $("#contentsecundario").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
  }) ;
}

function borrar_rol(idrol){
  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl=urlraiz+"/borrar_rol/"+idrol+""; 
  $("#filaR_"+idrol+"").html($("#cargador_empresa").html());
  $.ajax({
    url: miurl
  }).done( function(resul) 
  {
    $("#filaR_"+idrol+"").hide();
  }).fail( function() 
  {
    alert("No se borro correctamente, intentalo nuevamente o revisa tu conexion");
  });
}

function buscarusuario(){
  var urlraiz=$("#url_raiz_proyecto").val();
  var rol=$("#select_filtro_rol").val();
  var dato=$("#dato_buscado").val();
  if(dato == "")
  {
    var url=urlraiz+"/seguridad/buscar_usuarios/"+rol+"";
  }
  else
  {
    var url=urlraiz+"/seguridad/buscar_usuarios/"+rol+"/"+dato+"";
  }

  $("#contentsecundario").html($("#cargador_empresa").html());
  $.get(url,function(resul){
    $("#contentsecundario").html(resul);
      $("#select_filtro_rol").addClass("clasecss");
        })
}
/*
$(document).on("click",".pagination li a",function(e){
  e.preventDefault();
  var url = $(this).attr("href");
  $("#contentsecundario").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#contentsecundario").html(resul);  
  })
})
*/

function cambiarclave(idusu){
  var password=$("#password").val();
  var urlraiz=$("#url_raiz_proyecto").val();
  $("#zona_etiquetas_roles").html($("#cargador_empresa").html());
  var miurl=urlraiz+"/seguridad/cambiarclave/"+idusu+"/"+password+""; 

  $.ajax({
    url: miurl
  }).done( function(resul) 
  { 
    var etiquetas="";
    var password=$.parseJSON(resul);
    $.each(password,function(index, value) {
      etiquetas+= '<span class="label label-warning" style="margin-left:10px;" >'+value+'</span> ';
    })

    $("#zona_etiquetas_roles").html(etiquetas);
  }).fail( function() 
  {
    $("#zona_etiquetas_roles").html('<span style="color:red;">...Error: Aun no ha agregado roles  o revise su conexion...</span>');
  });
}


function cambiarname(idusu){
  var name=$("#name").val();
  var urlraiz=$("#url_raiz_proyecto").val();
  $("#zona_etiquetas_roles").html($("#cargador_empresa").html());
  var miurl=urlraiz+"/seguridad/cambiarnombre/"+idusu+"/"+name+""; 

  $.ajax({
    url: miurl
  }).done( function(resul) 
  { 
    var etiquetas="";
    var name=$.parseJSON(resul);
    $.each(name,function(index, value) {
      etiquetas+= '<span class="label label-warning" style="margin-left:10px;" >'+value+'</span> ';
    })

    $("#zona_etiquetas_roles").html(etiquetas);
  }).fail( function() 
  {
    $("#zona_etiquetas_roles").html('<span style="color:red;">...Error revise su conexion...</span>');
  });
}

function asignar_rol(idusu){
  var idrol=$("#rol1").val();
  var urlraiz=$("#url_raiz_proyecto").val();
  $("#zona_etiquetas_roles").html($("#cargador_empresa").html());
  var miurl=urlraiz+"/seguridad/asignar_rol/"+idusu+"/"+idrol+""; 

  $.ajax({
    url: miurl
  }).done( function(resul) 
  { 
    var etiquetas="";
    var roles=$.parseJSON(resul);
    $.each(roles,function(index, value) {
      etiquetas+= '<span class="label label-warning">'+value+'</span> ';
    })

    $("#zona_etiquetas_roles").html(etiquetas);
  }).fail( function() 
  {
    $("#zona_etiquetas_roles").html('<span style="color:red;">...Error: Aun no ha agregado roles o revise su conexion...</span>');
  });
}

function quitar_rol(idusu){
  var idrol=$("#rol2").val();
  var urlraiz=$("#url_raiz_proyecto").val();
  $("#zona_etiquetas_roles").html($("#cargador_empresa").html());
  var miurl=urlraiz+"/seguridad/quitar_rol/"+idusu+"/"+idrol+""; 

  $.ajax({
    url: miurl
  }).done( function(resul) 
  { 
    var etiquetas="";
    var roles=$.parseJSON(resul);
    $.each(roles,function(index, value) {
      etiquetas+= '<span class="label label-warning" style="margin-left:10px;" >'+value+'</span> ';
    })

    $("#zona_etiquetas_roles").html(etiquetas);
  }).fail( function() 
  {
    $("#zona_etiquetas_roles").html('<span style="color:red;">...Error: Aun no ha agregado roles  o revise su conexion...</span>');
  });
}

function cargar_formulario(arg){
   var urlraiz=$("#url_raiz_proyecto").val();
   console.log(urlraiz);
   $("#contentsecundario").show();
   var screenTop = $(document).scrollTop();
   $("#contentsecundario").css('top', screenTop);
   $("#contentsecundario").html($("#cargador_empresa").html());
   //if(arg==1){ var miurl=urlraiz+"/form_nuevo_usuario"; }
   if(arg==2){ var miurl=urlraiz+"/seguridad/form_nuevo_rol"; }
   if(arg==3){ var miurl=urlraiz+"/form_nuevo_permiso"; }

   console.log(miurl);

    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#contentsecundario").html(resul);
   
    }).fail( function() 
   {
    $("#contentsecundario").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   }) ;

}

$(document).on('click','.btn-btnGuardarRol',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/seguridad/crear_rol";

    var formData = {
        rol: $('#rol_nombre').val(),
        slug: $('#rol_slug').val(),
        descripcion: $('#rol_descripcion').val(),
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
                title: '¿Desea agregar otro rol?',
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
                swal({ 
                    title:"Envio correcto",
                    text: "Se guardado correctamente un nuevo rol",
                    type: "success"
                }).then(function(){
                    var miurl=urlraiz+"/seguridad/form_nuevo_rol";
                    var errHTML="";
                    $.ajax({
                        url: miurl
                    }).done( function(resul) 
                    { 
                        $("#nrol").html(resul);
                    }).fail(function() 
                    {
                        $("#nrol").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                    });
                });  
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal({ 
                        title:"Envio correcto",
                        text: "Se guardado correctamente un nuevo rol",
                        type: "success"
                    }).then(function(){
                      var miurl=urlraiz+"/seguridad/rol/index";
                        $.ajax({
                            url: miurl
                        }).done( function(resul) 
                        {
                            $("#capa_modal").html(resul);
                        }).fail( function() 
                        {
                            $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                        });
                    });
                }
            });  
        },                         
        
        error: function (data) {
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON.errors){
                        errHTML+="<li>"+data.responseJSON.errors[er]+"</li>";
                    }
                    }else{
                        errHTML+='<li>Error</li>';
                    }
                $("#erroresContentRol").html(errHTML); 
                $('#erroresModalRol').modal('show');
        },
    });
});