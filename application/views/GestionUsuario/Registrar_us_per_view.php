<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Gestion Permiso</h3>
              </div>

              <div class="title_right">
               
              </div>
            </div>
            <div class="clearfix"></div>
           
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Seleccione el usuario <small>Para asignarle permisos</small></h2>
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
                      <div class="form-group">
                           <div class="col-md-9 col-sm-9 col-xs-12 ">
                          <button type="button" class="btn btn-success">Buscar permisos del usuario : </button>
                        <br>
                        </div>
                      </div>
  <div class="form-group">
                       
                         
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <form action="<?php echo base_url("index.php/C_usu_perm/index_lista");?>" method="post">
                                <select class="select2_single form-control" onchange="this.form.submit()" name="rum_usuario" required="true" tabindex="-1">
                                    <option value="">Seleccione run usuario</option>
                            <?php if(isset($lista)) {
                                    foreach ($lista as $value) {
                                echo "<option value='".$value->num_run_f."'>".$value->num_run_f."</option>";
                                    }
                            } ?>
                           
                                  
                          </select>
                             </form>
                        </div>
                       
                       
                     
                      </div>
                     
                  </div>
                </div>
              </div>
<div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Permisos actuales del usuario  <?php if(set_value("rum_usuario")){ echo  "<button class='btn btn-danger'>".set_value("rum_usuario")."</button>"; }?></h2>
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
                    <div class="form-horizontal form-label-left">

                    
                      <div class="form-group">
                       

                        <div class="col-md-9 col-sm-9 col-xs-12">
                        
                              <?php 
                              if(isset($per_si)){
                                  foreach ($per_si as $value) {
                                      echo " <div class='checkbox'>";
                                      echo "<label>";
                                      echo "<input type='checkbox' class='flat' > ".$value->descripcion;
                                      echo "</label>";
                                      echo "</div>";
                                  }
                              }
                              
                              ?>
                           
                         
                         
                        </div>
                      </div>
                      


                      <div class="ln_solid"></div>
                     <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
                          <button type="submit" class="btn btn-success"> Marcar para quitar permisos al usuario <?php echo set_value("rum_usuario")?></button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
        <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Permisos disponibles para el usuario <?php if(set_value("rum_usuario")){ echo  "<button class='btn btn-danger'>".set_value("rum_usuario")."</button>"; }?> </h2>
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
                    <div class="form-horizontal form-label-left">

                        <form action="<?php  echo base_url("index.php/C_usu_perm/agregar_permiso");?>" method="post">
                      <div class="form-group">
                       

                        <div class="col-md-9 col-sm-9 col-xs-12">
                        
                              <?php 
                              if(isset($per_no)){
                                  foreach ($per_no as $value) {
                                      echo "  <div class='checkbox'>";
                                      echo "<label>";
                                      echo "<input type='checkbox' value='".$value->id_permiso."' name='permisos[]' class='flat'> ".$value->descripcion;
                                      echo "</label>";
                                      echo "</div>";
                                  }
                              }
                              
                              ?>
                         
                        </div>
                      </div>
                      


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
                          <button type="submit" class="btn btn-success"> Marcar para agregar permisos al usuario <?php echo set_value("rum_usuario")?></button>
                        </div>
                      </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          


             
            </div>
        
          
           <!-- DataTable -->

            
           


           
          </div>
        </div>
        <!-- /page content -->
