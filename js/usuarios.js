var trDelete;
var trModi;
var idUser;
var frmDeleteUSer;
var ren=null;
$(document).on('ready',function(){
	var spinner=null;
	var tabla=$("#tlbUsuarios");
	var opts = {
	  lines: 13, // The number of lines to draw
	  length:13, // The length of each line
	  width: 5, // T:he line thickness
	  radius: 2, // The radius of the inner circle
	  corners: 1, // Corner roundness (0..1)
	  rotate: 0, // The rotation offset
	  direction: 1, // 1: clockwise, -1: counterclockwise
	  color: '#666666', // #rgb or #rrggbb or array of colors
	  speed: 1, // Rounds per second
	  trail: 60, // Afterglow percentage
	  shadow: false, // Whether to render a shadow
	  hwaccel: true, // Whether to use hardware acceleration
	  className: 'spinner', // The CSS class to assign to the spinner
	  zIndex: 2e9, // The z-index (defaults to 2000000000)
	  top: 'auto', // Top position relative to parent in px
	  left: 'auto' // Left position relative to parent in px
	};
	tabla.dataTable({
		"oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ resultados por página",
            "sSearch":"Busqueda",
            "sZeroRecords": "No no se encontraron resultados",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ resultados",
            "sInfoEmpty": "Rango de 0 a 0 de 0 resultados",
            "sInfoFiltered": "(Filtrado de _MAX_ registros totales)"
        },
        "bPaginate": true,
        "iDisplayLength": 10,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,
        "bJQueryUI":true
	});
	$("#myModal").modal({
		show:false,
		backdrop:false,
		keyboard:true

	  });
	$('#divModalEdit').modal({
		show:false,
		backdrop:false,
		keyboard:true
	});
	var target = $("#divuser")[0];
	var target2 = $("#divcomp")[0];
	var target3 = $("#divEmail")[0];
	var pet=$('#frmUsers').attr('action');
	var met=$('#frmUsers').attr('method');
	var nom;
	$('.btnModiUser').tooltip();
	$('.btnModalDelete').tooltip();
	// comprobar disponiblidad de nombre de usuario
	// validar con blur
	$('#nickname').on('blur',function(){
		nom=document.frmUsers.txtname.value;
		var ruta=$('#lnkValidaU').attr('href');
		$.ajax({
			beforeSend:function(){
				//spinner = new Spinner(opts).spin(target2);
			},
			url:ruta,
			type:met,
			data:{nombre:nom},
			success:function(resp){
				switch(resp){
					case '1':
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>intenta con otro nombre</span>");
						break;

					case '2':
						$("#divcomp").html("<img src='../images/pa.png' /><span style='color:green;'>disponible!</span>");
						break;
					case '3':
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>no existe la sucursal</span>");
						break;
					case '4':
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>valor vacio</span>");	
						break;
					default:
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>Error</span>");
						
				}
			},
			error:function(jqXHR,estado,error){
				console.log(estado);
				console.log(error);
			},
			complete:function(jqXHR){
				//spinner.stop();
			},
			timeout:10000

			
		});

	});

	// validar con click
	/*
	$('#lnkValidaU').on('click',function(e){
		e.preventDefault();
		nom=document.frmUsers.txtname.value;
		var ruta=$(this).attr('href');
		$.ajax({
			beforeSend:function(){
				spinner = new Spinner(opts).spin(target2);
			},
			url:ruta,
			type:met,
			data:{nombre:nom},
			success:function(resp){
				switch(resp){
					case '1':
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>intenta con otro nombre</span>");
						break;

					case '2':
						$("#divcomp").html("<img src='../images/pa.png' /><span style='color:green;'>disponible!</span>");
						break;
					case '3':
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>no existe la sucursal</span>");
						break;
					case '4':
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>valor vacio</span>");	
						break;
					default:
						$("#divcomp").html("<img src='../images/x.png' /><span style='color:red;'>Error</span>");
						
				}
			},
			error:function(jqXHR,estado,error){
				console.log(estado);
				console.log(error);
			},
			complete:function(jqXHR){
				spinner.stop();
			},
			timeout:10000

			
		});
		
	}); */
	// comprobar email no repetido
	// validar con blur
	$('#txtemail').on('blur',function(){
		nom=document.frmUsers.txtemail.value;
		var rutaC=$('#lnkValidaC').attr('href');
		$.ajax({
			beforeSend:function(){
				//spinner = new Spinner(opts).spin(target3);
			},
			url:rutaC,
			type:met,
			data:{nombre:nom},
			success:function(resp){
				switch(resp)
				{
					case '1':
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>intenta con otro e-mail</span>");
						break;

					case '2':
						$("#divEmail").html("<img src='../images/pa.png' /><span style='color:green;'>disponible!</span>");
						break;
					case '3':
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>no existe la sucursal</span>");
						break;
					case '4':
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>valor vacio</span>");	
						break;
					default:
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>Error</span>");
				}
				
			},
			error:function(jqXHR,estado,error){
				console.log(estado);
				console.log(error);
			},
			complete:function(jqXHR){
				//spinner.stop();
			},
			timeout:10000

		});

	});

	// validar con click

	/*
	$("#lnkValidaC").on('click',function(e){
		e.preventDefault();
		nom=document.frmUsers.txtemail.value;
		var rutaE=$(this).attr('href');
		$.ajax({
			beforeSend:function(){
				spinner = new Spinner(opts).spin(target3);
			},
			url:rutaE,
			type:met,
			data:{nombre:nom},
			success:function(resp){
				switch(resp)
				{
					case '1':
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>intenta con otro e-mail</span>");
						break;

					case '2':
						$("#divEmail").html("<img src='../images/pa.png' /><span style='color:green;'>disponible!</span>");
						break;
					case '3':
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>no existe la sucursal</span>");
						break;
					case '4':
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>valor vacio</span>");	
						break;
					default:
						$("#divEmail").html("<img src='../images/x.png' /><span style='color:red;'>Error</span>");
				}
				
			},
			error:function(jqXHR,estado,error){
				console.log(estado);
				console.log(error);
			},
			complete:function(jqXHR){
				spinner.stop();
			},
			timeout:10000

		});

	});*/


	//
	// registrar usuario
	$('#frmUsers').on('submit',function(e){
		e.preventDefault();
		$.ajax({
		beforeSend:function(){
			spinner = new Spinner(opts).spin(target);

		},

		url:pet,
		type:met,
		data:$('#frmUsers').serialize(),
		success:function(resp){
			if(resp==3)
				$("#divuser").html("<img src='../images/pa.png' /><span style='color:green;'>Registro Exitoso</span>");
			else
				$("#divuser").html("<img src='../images/x.png' /><span style='color:red;'>Ese ususario ya existe</span>");
		},
		error:function(jqXHR,estado,error){
				console.log(estado);
				console.log(error);
				},
		complete:function(XHR){
			spinner.stop();

		},
			timeout:10000

		});
	});

	
	trDelete=$('tr .btnModalDelete');
	trModi=$('tr .btnModiUser');
	trDelete.on('click',function(){
		idUser=$(this).parent().parent().find(':input').val();
		ren=$(this).parent().parent();
		$("#myModal").modal('show');	
	});
	$("#btnDeleteUser").on('click',function(){
		eliminar(ren);
	});

	trModi.on('click',function(){
		idUser=$(this).parent().parent().find(':input').val();
		ren=$(this).parent().parent();
		$('#divModalEdit').modal('show');
	});

});

function eliminar(ren) 
{	
		frmDeleteUSer=$("#frmMuestraU").attr('action');
		$.ajax({
			beforeSend:function(){
				
			},
			url:frmDeleteUSer,
			type:'post',
			dataType:'text',
			data:{idU:idUser},
			success:function(resp){
				switch(resp){
					case '1':
							ren.remove();
							$("#myModal").modal('hide');
							break;
					case '2':
							alert("no existe esa sucursal");
							break;
					case '3':
							alert("no existe ese ususario en la sucursal");
							break;
					default:

				}
			},
			error:function(jqXHR,estado,error){
				console.log(estado);
				console.log(error);
			},
			complete:function(){

			},
			timeout:10000
		});	
}



	
