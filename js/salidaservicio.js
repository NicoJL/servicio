$(document).on("ready",function()
{
    var id=null;
    var ren=null;
    btnFolio=$(" .btnEliFolio");
    modalServ=$('#modalServ');
    modalServ.modal( {keyboard:true,show:false,backdrop:false});
	tablaServicio=$('#tablaServicio');
	tablaServicio.dataTable({
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
    btnFolio.on('click',function()
        {
             document.querySelector('#mnsConfir').innerHTML="<font color='#485573'><b>Realmente deseas borrar el servicio? </b></font>";
            modalServ.modal('show');
            id=$(this).parent().find('input').val();
            ren=$(this).parent().parent().parent();
        });
    btnAceptar=$("button#btnAceptar");
    btnAceptar.on('click',function()
    {
        eliminarFolio(id,ren,modalServ);
    })
});

function eliminarFolio(id,ren,modalServ)
{   
    
    var ruta = document.querySelector('#rutaEliFolio').value;
    $.ajax({
        url:ruta,
        type:'post',
        data:{folio:id},
        dataType:'text',
        success:function(resp)
        {
            switch(resp)
            {
                case "1":
                
                    ren.remove();
                    modalServ.modal('hide');
                    break;
                case "2":
                    document.querySelector('#mnsConfir').innerHTML="<font color='#f2574b'><b>No se puede borrar, ya que utilizo refacciones</b></font>";
                    break;
                default:
                     document.querySelector('#mnsConfir').innerHTML="<font color='#f2574b'><b>Ocurrio un Error</b></font>";
            }
        },
        error:function(xhr,error,estado)
        {
            alert(error+" "+xhr+" "+estado);
        },
        complete:function(xhr)
        {

        }
    })
}