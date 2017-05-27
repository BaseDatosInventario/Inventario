/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var table_tu;

    $(document).ready(function (){
 $('#tbl_permiso').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/C_permisos/mostrar_permisos',
        'type':'POST',
         dataSrc:''
    },
    'columns':
    [
         {'orderable':true,
        render:function(data,type,row)
            {
                
             return "<div class='btn-group'><button data-toggle='dropdown' class='btn btn-primary dropdown-toggle btn-sm' type='button' aria-expanded='false'><span class='glyphicon glyphicon-cog'></span> Opción <span class='caret'></span> \n\
                </button><ul role='menu' class='dropdown-menu'> \n\
                     <li><a href='#' onclick='modificar_permiso("+row.id_permiso+",\x22"+row.descripcion+"\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_permiso("+row.id_permiso+",\x22"+row.descripcion+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                      </li>\n\
                    </ul>\n\
                 </div>";
                
                
               
            }
        },
        {data:'id_permiso'},
      
        {data:'descripcion'}
       
       
       
    ] ,
    'order':[[0,"asc"]]
});
table_tu = $('#tbl_permiso').DataTable();
 


});

function delete_permiso(code ,nombre){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#id_tu').val(code);
   $('#modaldelete_permiso .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar el permiso llamado [ '+nombre+' ] ?');
   $('#modaldelete_permiso').modal('show');
  
 
}
function modificar_permiso(id_permiso,descripcion){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#codetipuser').val(id_permiso);
  $('#nombre_tu').val(descripcion);
  
  $('#modal_formulario_permiso').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_tipo_usuario_ajax(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        code_tu:$('#codetipuser').val(),
                        nombre_tu:$('#nombre_tu').val(),
                        descri_tu:$('#desc_tu').val()
                       
                       
                        },
                    url: base_url+'index.php/C_tipoUsuario/modificar_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table_tu.ajax.reload();
                          mensaje_modal(' Tipo usuario actualizado correctamente <span class="glyphicon glyphicon-ok"></span>');
                        }
                        else if (data.status === "error")
                        { 
                           mensaje_modal('Problemas al actualizar intentelo mas tarde!');  
                        }else {
                        
                            $("#msj").html("<div class='alert alert-danger alert-dismissable'>\n\
  <button type='button' class='close' data-dismiss='alert'>&times;</button>\n\
  <strong>¡Error!</strong> "+data.error+".\n\
</div>");
                            //muestra los errores
                        }
                    }
                });

        
}


function eliminar_permiso_ajax()
            {
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        id_permiso: $('#id_tu').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/C_permisos/eliminar_permiso',
                    success: function(data)
                    {
//                        $(".grupo2").show();
//                        $(".grupo1").hide();
                        if(data.status === "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete_permiso .modal-body p').html("<span class='glyphicon glyphicon-ok'></span> Eliminado correctamente ");
                           table_tu.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete_permiso .modal-body p').text("Ha ocurrido un error al intentar eliminar el tipo usuario");
                              $(".grupo1").hide();
                            $(".grupo2").show();
                        }
                    }
                });
            }
            
            
            
            
