<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Sistema de inventario </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("Maqueta/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("Maqueta/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("Maqueta/vendors/nprogress/nprogress.css");?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url("Maqueta/vendors/iCheck/skins/flat/green.css");?>" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url("Maqueta/vendors/google-code-prettify/bin/prettify.min.css"); ?>" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url("Maqueta/vendors/select2/dist/css/select2.min.css"); ?>" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url("Maqueta/vendors/switchery/dist/switchery.min.css"); ?>" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url("Maqueta/vendors/starrr/dist/starrr.css"); ?>" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url("Maqueta/vendors/bootstrap-daterangepicker/daterangepicker.css"); ?>" rel="stylesheet">

    
     <!-- Datatables -->
    <link href="<?php echo base_url("Maqueta/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("Maqueta/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("Maqueta/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("Maqueta/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("Maqueta/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("Maqueta/build/css/custom.min.css");?>" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
    <script>
    
    function mensaje_modal(mensaje){
   $('#modalmensaje .modal-body p').html('<span class="glyphicon glyphicon-arrow-right"></span>'+mensaje);
   $('#modalmensaje').modal('show');}
    
    var csrfname = "<?php echo $this->security->get_csrf_token_name(); ?>";
    var csrfvalue ="<?php echo $this->security->get_csrf_hash(); ?>";
     var base_url ;
        base_url= '<?php echo base_url()?>';
        
         $(document).ready(function(){    
             $("#form_updatetipousuario").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar tipo usuario
                console.log("llegue aqui");
               modificar_tipo_usuario_ajax();
                });
   
   
});
    </script>
    
  </head>