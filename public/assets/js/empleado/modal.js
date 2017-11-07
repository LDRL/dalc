function cargarmodalempleado(arg){
  	var urlraiz=$("#url_raiz_proyecto").val();

  	if(arg==1){var miurl=urlraiz+"/seguridad/add"; var titulo="Nuevo ingreso de usuario" ;}
  	if(arg==2){var miurl=urlraiz+"/medicamento/add"; var titulo="Nuevo ingreso de medicamento" ; }
    if(arg==3){var miurl=urlraiz+"/medicamento/compra/add"; var titulo="Nueva compra de un medicamento" ; }
    if(arg==4){var miurl=urlraiz+"/medicamento/marca/add"; var titulo="Nuevo ingreso de una marca"; $('#nuevomarca').val('add');}
    if(arg==5){var miurl=urlraiz+"/medicamento/tipomedicamento/add"; var titulo="Nuevo ingreso de un tipo de medicamento";}
    if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/add"; var titulo="Nuevo ingreso de un proveedor"; $("#btnGuardarProveedor").val('add');}
    if(arg==7){var miurl=urlraiz+"/medicamento/requisicion/add"; var titulo="Nuevo ingreso de una requisicion";}

	var errHTML="";

	$.ajax({
		url: miurl
	}).done( function(resul) 
	{
		$("#modales").html(resul);
		$('#inputTitleUsuario').html(titulo);
    $('#formModalUsuario').modal('show');
	}).fail(function() 
	{
		$("#modales").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
	}) ;
}

function cargarmedi(arg){
  var urlraiz=$("#url_raiz_proyecto").val();
  if(arg==3){var miurl=urlraiz+"/medicamento/compra/add"; var titulo="Nueva compra de un medicamento" ; }


   $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#capa_modal").html(resul);
     $('#inputTitleUsuario').html(titulo);
    $('#formModalUsuario').modal('show');
   
    }).fail( function() 
   {
    $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   }) ;
}



function cargarmodal(arg){
	var urlraiz=$("#url_raiz_proyecto").val();

	if(arg==1){var miurl=urlraiz+"/seguridad/add"; var titulo="Nuevo ingreso de usuario" ;}
  if(arg==2){var miurl=urlraiz+"/medicamento/addm"; var titulo="Nuevo ingreso de medicamento" ; }
	if(arg==3){var miurl=urlraiz+"/medicamento/compra/addm"; var titulo="Nuevo ingreso de medicamento" ; }
  if(arg==4){var miurl=urlraiz+"/medicamento/marca/addm"; var titulo="Nuevo ingreso de una marca";}
  if(arg==5){var miurl=urlraiz+"/medicamento/tipomedicamento/addt"; var titulo="Nuevo ingreso de un tipo de medicamento";}
  if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/addp"; var titulo="Nuevo ingreso de un proveedor";}
  if(arg==7){var miurl=urlraiz+"/medicamento/ubicacion/addu"; var titulo="Nuevo ingreso de una ubicacion";}
  if(arg==8){var miurl=urlraiz+"/medicamento/principio/addp"; var titulo="Nuevo ingreso de una sustancia medica";}
  if(arg==11){var miurl=urlraiz+"/medicamento/presentacion/addp"; var titulo="Nuevo ingreso de una presentacion"; $("#btnGuardarProveedor").val('add');}


	var errHTML="";

	$.ajax({
		url: miurl
	}).done( function(resul) 
	{
		$("#modales1").html(resul);
		$('#inputTitle').html(titulo);
        $('#formModal').modal('show');
	}).fail(function() 
	{
		$("#modales1").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
	}) ;
}

function cargarmodal2(arg)
{
    
    if(arg==4){var miurl=urlraiz+"/medicamento/marca/addm"; var titulo="Nuevo ingreso de una marca";}
    if(arg==8){var miurl=urlraiz+"/medicamento/principio/addp"; var titulo="Nuevo ingreso de una sustancia medica";}
    if(arg==11){var miurl=urlraiz+"/medicamento/presentacion/addp"; var titulo="Nuevo ingreso de una presentacion"; $("#btnGuardarProveedor").val('add');}

    var errHTML="";
    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
        $("#modales2").html(resul);
        $('#inputTitle2').html(titulo);
        $('#formModal2').modal('show');
    }).fail(function() 
    {
        $("#modales2").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
    }) ;  
}
function cargarmodal4(arg){
    var urlraiz=$("#url_raiz_proyecto").val();
    if(arg==8){var miurl=urlraiz+"/medicamento/tipomedicamento/add"; var titulo="Nuevo ingreso de tipo medicamento";}
    var errHTML="";

    $.ajax({
      url: miurl
    }).done( function(resul) 
    {
      $("#modales3").html(resul);
      $('#inputTitle3').html(titulo);
      $('#formModales').modal('show');

    }).fail(function() 
    {
      $("#modales3").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
    }) ;
}
function cargarindex(arg){
	var urlraiz=$("#url_raiz_proyecto").val();
	$("#capa_modal").html($("#cargador_empresa").html());
	


	if(arg==1){var miurl=urlraiz+"/empleado/index";}
	if(arg==2){var miurl=urlraiz+"/empleado/add";}
	if(arg==3){var miurl=urlraiz+"/seguridad/index";}
	if(arg==4){var miurl=urlraiz+"/medicamento/index";}
	if(arg==5){var miurl=urlraiz+"/medicamento/compra/index";}
	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/index";}
  if(arg==7){var miurl=urlraiz+"/medicamento/requisicion/index";}
  if(arg==8){var miurl=urlraiz+"/medicamento/requisicion/add";}
  if(arg==9){var miurl=urlraiz+"/paciente/historial/add";}
  if(arg==10){var miurl=urlraiz+"/medicamento/add";}
  if(arg==11){var miurl=urlraiz+"/seguridad/add";}
  if(arg==12){var miurl=urlraiz+"/seguridad/rol/index";}
  if(arg==13){var miurl=urlraiz+"/empleado/inactivo";}
  if(arg==14){var miurl=urlraiz+"/medicamento/proveedor/inactivo";}
  if(arg==15){var miurl=urlraiz+"/seguridad/inactivo";}
  if(arg==16){var miurl=urlraiz+"/seguridad/form_nuevo_rol";}
  if(arg==17){var miurl=urlraiz+"/medicamento/vencimiento/index";}
  if(arg==18){var miurl=urlraiz+"/medicamento/vencimiento/add"}

  //17,18

	if(arg==20){var miurl=urlraiz+"/bienhechor/index";}
	if(arg==21){var miurl=urlraiz+"/paciente/index";}
	if(arg==22){var miurl=urlraiz+"/paciente/nuevo";}
  if(arg==23){var miurl=urlraiz+"/bienhechor/indexinc";}
  if(arg==24){var miurl=urlraiz+"/paciente/indexinc";}
 	
    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#capa_modal").html(resul);
   
    }).fail( function() 
   {
    $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   }) ;
}

function editar(arg,id){

  var urlraiz=$("#url_raiz_proyecto").val();
	$("#capa_modal").html($("#cargador_empresa").html());
	
	if(arg==1){var miurl =urlraiz+"/empleado/edit/"+id+"";}
	if(arg==2){var miurl=urlraiz+"/empleado/add";}
	if(arg==3){var miurl=urlraiz+"/seguridad/index";}

	$.ajax({
		url: miurl
    }).done( function(resul) 
    {
    	$("#capa_modal").html(resul);
    }).fail( function() 
   	{
   		$("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   	});
}

function detalle(arg,id)
{
	var urlraiz=$("#url_raiz_proyecto").val();
	$("#capa_modal").html($("#cargador_empresa").html());

	if(arg==1){var miurl =urlraiz+"/empleado/show/"+id+"";}
  if(arg==8){var miurl =urlraiz+"/medicamento/show/"+id+"";}
	if(arg==2){var miurl =urlraiz+"/empleado/add";}
	if(arg==3){var miurl =urlraiz+"/seguridad/index";}
  if(arg==7){var miurl =urlraiz+"/medicamento/requisicion/show/"+id;}
  if(arg==9){var miurl =urlraiz+"/paciente/historial/show/"+id;}
  if(arg==10){var miurl =urlraiz+"/paciente/historial/examen/show/"+id;}
  if(arg==17){var miurl =urlraiz+"/medicamento/vencimiento/show/"+id;}



	if(arg==20){var miurl=urlraiz+"/bienhechor/listardetallesb/"+id+"";}
  if(arg==21){var miurl=urlraiz+"/paciente/detallespaciente/"+id+"";}
	$.ajax({
		url: miurl
    }).done( function(resul) 
    {
    	$("#capa_modal").html(resul);
    }).fail( function() 
   	{
   		$("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   	});

}

function cargarbusqueda(arg){
	var urlraiz=$("#url_raiz_proyecto").val();
	$("#modales2").html($("#cargador_empresa").html());
	
	if(arg==1){var miurl=urlraiz+"/seguridad/cargarbusqueda"; var titulo="Buscar usuario" ;}
	if(arg==2){var miurl=urlraiz+"/medicamento/cargarbusqueda"; var titulo="Buscar medicamento" ;}
	if(arg==3){var miurl=urlraiz+"/medicamento/ubicacion/cargarbusqueda"; var titulo="Buscar ubicacion" ; }
	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/cargarbusqueda"; var titulo="Buscar proveedor" ;}
	if(arg==7){var miurl=urlraiz+"/medicamento/ubicacion/cargarbusqueda"; var titulo="Buscar ubicacion" ; }
  if(arg==8){var miurl=urlraiz+"/medicamento/principio/cargarbusqueda"; var titulo="Buscar sustancia medica" ; }
  if(arg==9){var miurl=urlraiz+"/medicamento/requisicion/cargarbusqueda"; var titulo="Buscar medicamento" ; }

	if(arg==20){var miurl=urlraiz+"/bienhechor/index";}

	var errHTML="";

    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
    	$("#modales2").html(resul);
      $('#inputTitleBuscar').html(titulo);
      $('#formModalBuscar').modal('show');
      
    }).fail( function() 
    {
    	$("#modales2").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
    }) ;
}

function busqueda(arg,id){
	var urlraiz=$("#url_raiz_proyecto").val();
	
	if(arg==1){var miurl=urlraiz+"/seguridad/busqueda/"+id; }
	if(arg==2){var miurl=urlraiz+"/medicamento/busqueda/"+id; var form = $("#medi"); }
	if(arg==3){var miurl=urlraiz+"/medicamento/ubicacion/busqueda/"+id;  }
	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/busqueda/"+id;  var form = $("#prov"); }
	if(arg==7){var miurl=urlraiz+"/medicamento/ubicacion/busqueda/"+id;  var form = $("#ubic");}
  if(arg==8){var miurl=urlraiz+"/medicamento/principio/busqueda/"+id;  var form = $("#prin");}
  if(arg==9){var miurl=urlraiz+"/medicamento/requisicion/busqueda/"+id;  var form = $("#rmedi");}

	if(arg==20){var miurl=urlraiz+"/bienhechor/index";}

	var errHTML="";

    $.ajax({
    url: miurl
    }).done( function(resul) 
    {

      form.html(resul);
      $('#formModalBuscar').modal('hide');
      /*
        $($.parseHTML(resul)).each(function(i, v){ // indice, valor
          console.log(v.idproveedor);
          cursos.append('<option value="' + '10' + '">' + 'pruebanara' + '</option>');
        })

        console.log(cursos);
      */

    }).fail( function() 
    {
    	$("#modales2").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
    }) ;
}

function cargardetalle(arg,id) 
{ 
      var urlraiz=$("#url_raiz_proyecto").val(); 
        if(arg==10){var miurl =urlraiz+"/paciente/historial/examen/show/"+id;} 
        $.ajax({ 
          url: miurl 
        }).done( function(resul)  
        { 
            $("#cargardetalle").html(resul); 
        }).fail( function()  
        { 
            $("#cargardetalle").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>'); 
        }); 
      //$("#capa_modal").html($("#cargador_empresa").html()); 
 
} 
