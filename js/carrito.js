$(document).on('ready',function()
{
	btnVender=$('tr .btn_vender');
	var nombre="";
	var precio=0;
	var cantidad=0;
	var ruta=$('#ruta').val();
	var pid=0;
	var pidServ=0;
	btnVender.on('click',function()
	{
		seleccion=$(this).parent().parent();
		nombre=seleccion.find('td:eq(0)').text();
		precio=seleccion.find('td:eq(2)').text()
		cantidad=seleccion.find('input[name=cant]').val();
		pidServ=seleccion.find('input[name=idServ]').val();
		pid=seleccion.find('input[name=idref]').val();
		$.ajax({
			url:ruta,
			data:{id:pid,qty:cantidad,price:precio,name:nombre,idServ:pidServ},
			dataType:"text",
			type:"post",
			success:function(resp)
			{
				alert(resp);
			},
			error:function(xhr,error,estado)
			{

			},
			complete:function(xhr)
			{

			}
		})
	})
})