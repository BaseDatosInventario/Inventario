
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url("Maqueta/vendors/jquery/dist/jquery.min.js"); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("Maqueta/vendors/bootstrap/dist/js/bootstrap.min.js");?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url("Maqueta/vendors/fastclick/lib/fastclick.js"); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url("Maqueta/vendors/nprogress/nprogress.js"); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url("Maqueta/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url("Maqueta/vendors/iCheck/icheck.min.js");?>"></script>
            
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url("Maqueta/vendors/moment/min/moment.min.js");?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/bootstrap-daterangepicker/daterangepicker.js");?>"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url("Maqueta/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/jquery.hotkeys/jquery.hotkeys.js");?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/google-code-prettify/src/prettify.js")?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url("Maqueta/vendors/jquery.tagsinput/src/jquery.tagsinput.js");?>"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url("Maqueta/vendors/switchery/dist/switchery.min.js"); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url("Maqueta/vendors/select2/dist/js/select2.full.min.js");?>"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url("Maqueta/vendors/parsleyjs/dist/parsley.min.js"); ?>"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url("Maqueta/vendors/autosize/dist/autosize.min.js");?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url("Maqueta/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"); ?>"></script>
    <!-- starrr -->
    <script src="<?php echo base_url("Maqueta/vendors/starrr/dist/starrr.js"); ?>"></script>
    
     <!-- Datatables -->
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-buttons/js/buttons.flash.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-buttons/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-buttons/js/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/jszip/dist/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/pdfmake/build/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("Maqueta/vendors/pdfmake/build/vfs_fonts.js"); ?>"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url("Maqueta/build/js/custom.min.js"); ?>"></script>
    <?php 
    // js por controlador 
switch ($this->uri->segment(1))
{
        case "C_tipoUsuario": 
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_tipoUsuario.js"); ?>"></script> <?php break;
        case "C_permisos":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_permiso.js"); ?>"></script> <?php break; 
        case "c_tipo_componente":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_tipo_componente.js"); ?>"></script> <?php break; 
        case "c_plataforma":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_plataforma.js"); ?>"></script> <?php break; 
        case "c_sistema":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_sistema.js"); ?>"></script> <?php break; 
        case "c_valor":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_valor.js"); ?>"></script> <?php break; 
        case "c_componente":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_componentes.js"); ?>"></script> <?php break; 
        case "c_tipo_muestra":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_tipo_muestra.js"); ?>"></script> <?php break;
    
        case "c_tipo_usuario":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_tipo_usuario.js"); ?>"></script> <?php break;
    
}

?>
    
	
  </body>
</html>
