$(document).on('ready',function()
{
    var idCli;
    var ren;
    var tablaCli=$('#tabla-clientes');
    var btnEli=$("tr button.btnEliCli");
    var idCli1=$('#idCli');
    var modalCli=$('div#modalCli');
    var cargador=$(".cargador");
     divCli=$('#edi-cli');
     nombre=$('#nombre');
     correo=$('#correo');
     telefono=$('#telefono');
     celular=$('#celular');
     direccion=$('#direccion');
     fecha=$('#fecha');
     estado=$('#estado');
     frmCli=$('#frm-cli')
     fecha.datepicker({
        showAnim:"drop",
        showButtonPanel: true
     });

     var colNom=null;
     var colDir=null;
     var colCel=null;
     var id=null;
    divCli.hide();
    modalCli.dialog({
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
                    eliminarCliente(idCli,ren,modalCli) ;
            
                },
                Cancelar:function()
                {
                    modalCli.dialog('close');
                }
            }
        });
    cargador.hide();
    cargador.dialog({
        autoOpen:false,
            modal:false,
            height:100,
            width:150,
            show: {
        effect: "bounce",
        duration: 600
      },
      hide: {
        effect: "drop",
        duration: 400
      },
            title:"Cargando...."
        });
      divCli.dialog({
        autoOpen:false,
            modal:true,
            height:470,
            width:500,
            show: {
        effect: "fold",
        duration: 800
      },
      hide: {
        effect: "fold",
        duration: 800
      },
            title:"Cliente",
            buttons:{
                "Modificar":function()
                {
                    updateCli();
        
                },
                Cancelar:function()
                {
                    divCli.dialog("close");
                }
            }
    });
   // tr=$(' tr td:nth-child(5) button');
    tr=$('tr .btn-edi');
    ruta=$('#ruta');
	
   
   
	tablaCli.dataTable({
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
   /* tr.on('click',function() esta es otra forma de seleccion! 
    {
     alert($(this).parent().parent().find('td:eq(0)').text());
    })*/
    btnEli.on('click',function()
    {
        document.querySelector('#mnsCli').innerHTML="<B>¿Realmente deseas borrar al cliente?</B>";
        idCli=$(this).parent().find(':input').val();
        ren=$(this).parent().parent();
        
         modalCli.dialog('open');
    })
    tr.on("click",function()
    {
id=$(this).parent().parent().find(':input').val();
       divCli.dialog("open");
       
       colCel=$(this).parent().parent().find('td:eq(2)');
    colDim=$(this).parent().parent().find('td:eq(1)');
        colNom=$(this).parent().parent().find('td:eq(0)');
         nombre.val("");
               correo.val("");
               telefono.val("");
               estado.val("");
               celular.val("");
               fecha.val("");
               direccion.val("");
               getCliente(id);
            // frmCli.find(':input').val("");
    });

    function getCliente(id)
    {
        $.ajax({
            url:ruta.val(),
            beforeSend:function()
            {
                
                    
            },
            dataType:'json',
            data:{idCli:id},
            type:"POST",
            success:function(resp)
            {
           // if(!jQuery.isEmptyObject(resp)){
               nombre.val(resp[0].nombre);
               correo.val(resp[0].correo);
               telefono.val(resp[0].telefono);
               estado.val(resp[0].correo);
               celular.val(resp[0].celular);
               fecha.val(resp[0].fecha);
               direccion.val(resp[0].direccion);
             
            },
            error:function(xhr,estado,error)
            {
                alert(error);
            },
            complete:function(xhr)
            {
                
            }
        });
    }
    function updateCli()
    {
        rutaModi=frmCli.attr('action');
       idCli1.val(id);
        $.ajax({
            url:rutaModi,
            dataType:"text",
            beforeSend:function(){
                cargador.dialog("open");
            },
            data:frmCli.serialize(),
            type:"POST",
            success:function(resp)
            {
                if(resp==1)/*comparar con otros valores para validar, valores k devuelve procedure*/
                {
                    colDim.text(direccion.val());
                    colNom.text(nombre.val());
                    colCel.text(celular.val());
                }
               
            },
            error:function(xhr,error,estado)
            {
                alert(error+"  "+estado);
            },
            complete:function()
            {
                cargador.dialog("close");
                divCli.dialog("close");
            }
        })
    }
    frmCli.on('submit',function(e)
    {
        return false;
    })
})

function eliminarCliente(idEli,ren,modalCli)
{
    ruta=$('input#rutaEliCli').val();
    $.ajax({
        url:ruta,
        beforeSend:function()
        {

        },
        type:'post',
        dataType:'text',
        data:{idCli:idEli},
        success:function(resp)
        {
            
            switch(resp)
            {
                case "1":
                    ren.remove();
                    modalCli.dialog('close');
                    break;
                case "2":
                    document.querySelector('#mnsCli').innerHTML="<B>Ese cliente ya fue borrado</B>";
                    break;
                default:
                     document.querySelector('#mnsCli').innerHTML="<B><font color='red'>Ocurrio un error</font></B>";
                    
            }
        }
    })  
}