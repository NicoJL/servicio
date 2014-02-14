$(document).on('ready',function()
{
	var spinner=null;
	var spinEquipo=null;
	var spinServicio=null;
	var panelServicio=$("#panelServicio");
	var panelEquipo=$("#panelEquipo");
	var panelFolio=$("#panelFolio");
	var confirServicio=$("#confirServicio");
	var opts = {
  lines: 13, // The number of lines to draw
  length: 5, // The length of each line
  width: 3, // The line thickness
  radius: 7, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 0, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#666666', // #rgb or #rrggbb or array of colors
  speed: 1, // Rounds per second
  trail: 50, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: true, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: 'auto', // Top position relative to parent in px
  left: 'auto' // Left position relative to parent in px
	};
	var target = document.getElementById('spFolio');
	var target2 = document.getElementById('spEquipo');
	var target3 = document.getElementById('spServicio');
 

	btnFolio=$('#btn_folio'); //boton para agregar folio ajax
	frmFolio=$('#frmFolio') //formulario del Folio (primer formulario)
	folio=$('#folio'); // el folio creado del cliente
	btnEquipo=$('#btn_equipo'); //boton para agregar equipo ajax
	frm_equipo=$('#frmEquipo');
	btnServicio=$('#btn_servicio');
	frmServicio=$('#frmServicio');
	sidEq=$('#sidEq');
	sfolio=$('#sfolio');
	var idEq=$('#idEq');
	pidCli=$('#idCli').val();
	if(!pidCli)
		pidCli=0;
	/***************************Paneles*******************************************************/
	panelEquipo.hide();
	panelServicio.hide();
	confirServicio.hide();
	confirServicio.dialog({
		autoOpen:false,
		modal:true,
		width:300,
		height:200,
		buttons:{
			"Otro":function()
			{
				sidEq.val("");
				idEq.val("");
				panelServicio.slideUp("slow");
				panelEquipo.slideDown("slow");
				confirServicio.dialog("close");
			},
			"Terminar":function()
			{
				confirServicio.dialog("close");
			}
		}
	})
	/*************************Agregar Folio*********************************************************/
	btnFolio.on('click',function()
	{
		rutaFolio=frmFolio.attr('action');
		$.ajax({
			url:rutaFolio,
			beforeSend:function()
			{
			 spinner = new Spinner(opts).spin(target);
					
			},
			dataType:'json',
			data:frmFolio.serialize(),
			type:"POST",
			success:function(resp)
			{ 
				if(!jQuery.isEmptyObject(resp))
					if(resp.ban==1)
					{
						folio.val(resp.folio);
						panelFolio.slideUp("slow");
						panelEquipo.slideDown("slow");
						
					}
					else
					{
						alert(resp.ban+" la bandera");
						//ban=2 sucursal no existe
						//ban=3 cliente no existe
						//ban=4 error de mysql
						//ban=50 no se recibieron los datos
						//ban=100 no se encontro el folio
					}
				else 
					alert("vacia");
			},
			error:function(xhr,estado,error)
			{
				alert(error);
			},
			complete:function(xhr)
			{
				spinner.stop();
			}
		})
	})
	/*-------------------------------------------------------------------------------------------*/

	/********************************AGREGA EQUIPO DEL CLIENTE*********************************/
	btnEquipo.on('click',function()
	{
		pnomEquipo=document.frmEquipo.nomEquipo.value;
		pmarca=document.frmEquipo.marca.value;
		pmodelo=document.frmEquipo.modelo.value;
		pnumSerie=document.frmEquipo.numSerie.value;
		pdescripcion=document.frmEquipo.descripcion.value;
		pcolor=$('#color').val();
		rutaEquipo=frm_equipo.attr('action');
		$.ajax
		({
			url:rutaEquipo,
			beforeSend:function()
			{
				spinEquipo = new Spinner(opts).spin(target2);
			},
			dataType:"json",
			data:{idCli:pidCli,nomEquipo:pnomEquipo,modelo:pmodelo,numSerie:pnumSerie,marca:pmarca,descripcion:pdescripcion,color:pcolor},
			type:"POST",
			success:function(resp){
				if(!jQuery.isEmptyObject(resp))
					if(resp.ban==1)
					{
						idEq.val(resp.idEq);
						alert('este es el id del equipo:'+resp.idEq);
						sfolio.val(folio.val());//para el servicio
						sidEq.val(idEq.val());// para el servicio 
						document.frmEquipo.nomEquipo.value="";
						document.frmEquipo.marca.value="";
						document.frmEquipo.modelo.value="";
						document.frmEquipo.numSerie.value="";
						document.frmEquipo.descripcion.value="";
						document.frmEquipo.color.value="";
						panelEquipo.slideUp("slow");
						panelServicio.slideDown("slow");

					}
					else
					{
						alert(resp.ban+" la bandera");
						// ban=2 el equipo ya existe
						// ban=3 no existe el cliente
						// ban=4 error de mysql
						// ban=100 no se encontro el id
					}
				else 
					alert("vacia");
			},
			error:function(xhr,error,estado)
			{

			},
			complete:function(xhr)
			{
				spinEquipo.stop();
			}
		});

	});
/********************************Servicio*************************************************/
btnServicio.on('click',function ()
{
	rutaServicio=frmServicio.attr('action');
	$.ajax({
		url:rutaServicio,
		beforeSend:function()
		{
			spinServicio = new Spinner(opts).spin(target3);
		},
		data:frmServicio.serialize(),
		dataType:"text",
		type:"post",
		success:function(resp)
		{
			if(resp=="1" || resp=="2")
			{
				document.frmServicio.tecnico.value="";
				document.frmServicio.falla.value="";
				document.frmServicio.cables.value="";
				document.frmServicio.discos.value="";
				document.frmServicio.accesorios.value="";
				document.frmServicio.golpes.value="";
				document.frmServicio.calcas.value="";
				//document.frmServicio.tipo.value="";
				confirServicio.dialog("open");
			}
		},
		error:function(xhr,error,estado)
		{
			alert(error+"  "+estado);
		},
		complete:function(xhr)
		{
			spinServicio.stop();
		}

	})
})
});