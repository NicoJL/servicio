$(document).on('ready',function(){
    var id=null;
    var ren=null;
    var suc;
	var ref=$("#ref");
    modalRef=$("div#confirRef");
    var confir=$('#confirRef');
    var btnRef=$('tr .btnEliRef');
    modalRef.dialog({
        autoOpen:false,
            modal:false,
            height:180,
            width:320,
            show: {
        effect: "bounce",
        duration: 600
      },
      hide: {
        effect: "drop",
        duration: 400
      },
            title:"Confirmación",
             buttons:{
                "Aceptar":function()
                {
                    eliminarRef(id,ren,modalRef,suc) ;
            
                },
                Cancelar:function()
                {
                    modalRef.dialog('close');
                }
            }
        });
	ref.dataTable({
		"oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ resultados por página",
            "sSearch":"Busqueda",
            "sZeroRecords": "No no se encontraron resultados",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ resultados",
            "sInfoEmpty": "Rango de 0 a 0 de 0 resultados",
            "sInfoFiltered": "(Filtrado de _MAX_ registros totales)"
        },
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,
        "bJQueryUI":true
	});
    btnRef.on('click',function()
    {
        id=$(this).parent().find('input[name=idref]').val();
        suc=$(this).parent().find('input[name=idsuc]').val();
        ren=$(this).parent().parent();
        document.querySelector('#mnsRef').innerHTML="<font color=red><center>¿Realmente deseas borrarla?</center></font>";
        modalRef.css('opacity','1');
        modalRef.dialog('open');
    })
});

function eliminarRef(idr,ren,modalRef,suc)
{
    ruta=$("#rutaEliRef").val();
    $.ajax({
        url:ruta,
        type:'post',
        data:{idref:idr,idsuc:suc},
        dataType:'text',
        success:function(resp)
        {
            switch(resp)
            {
                case "1":
                    ren.parent().find('td:eq(4)').text('0');
                    modalRef.dialog('close');
                    break;
                case "2":
                    document.querySelector('#mnsRef').innerHTML="<font color=red>Esta sucursal, a sido desahabilitada</font>";
                    break;
                default:
                    document.querySelector('#mnsRef').innerHTML="<font color=red>Ocurrio un error</font>";
            }
        },
        error:function(xhr,error,estado)
        {
            alert(error+" "+estado);
        },
        complete:function()
        {

        }
    });
}