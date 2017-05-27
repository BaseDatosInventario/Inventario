 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Gestion Tipo Usuario</h3>
              </div>

              <div class="title_right">
               
              </div>
            </div>
            <div class="clearfix"></div>
           

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registrar <small>Tipo usuario dentro del sistema</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?php echo base_url("index.php/C_tipoUsuario/insertar_tipousuario"); ?>" method="post" class="form-horizontal form-label-left input_mask">
                         <?php echo form_error('nombre','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" name="nombre" id="inputSuccess2" value="<?php echo set_value("nombre") ?>" required="true" placeholder="Ingrese el nombre del tipo usuario ejm:Admin,Vendedor,etc">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       
                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                          <textarea type="text" maxlength="99" name="descripcion" class="form-control has-feedback-left" required="true"  placeholder="Ingrese una descripcion" ><?php echo set_value("descripcion") ?></textarea>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      
                             
                     

                      

                     
                      
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-0">
                          <button type="submit" class="btn btn-primary">Agregar tipo usuario</button>
						  
                         
                        </div>
                      </div>
                        <?php if(isset($mensaje))
                        { echo $mensaje; }
                            ?>
                    </form>
                  </div>
                </div>

               

               


              </div>

            


             
            </div>
         

           <!-- DataTable -->

            
           


           
          </div>
        </div>
        <!-- /page content -->
