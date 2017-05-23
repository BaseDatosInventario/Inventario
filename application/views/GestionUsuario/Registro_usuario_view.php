<div class="container">
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Registro Funcionario</h2>
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
                        <!--                        <div class="x_content">
                                                    <br />
                                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RUN <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="run" name="run" required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Primer Nombre <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="p_nombre" name="p_nombre" required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Primer Apellido <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="p_apellido" name="p_apellido" required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Segundo Apellido <span class="">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="s_apellido" name="s_apellido"  class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="telefono" name="telefono" required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Direcciòn</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="direccion" name="direccion" class="form-control col-md-7 col-xs-12" type="text" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                             <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" type="email">
                                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                                            <div>
                                                            </div>
                                                           
                                                          
                                                                <div class="ln_solid"></div>
                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                        <button class="btn btn-primary" type="button">Cancel</button>
                                                                        <button class="btn btn-primary" type="reset">Reset</button>
                                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                                    </div>
                                                                </div>
                        
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>-->

                        <div class="row">
                            <div class="col-sm-5 col-md-4">
                                <div class="form-group">
                                    <label>RUN</label>
                                    <input type="text" class="form-control" name="run" maxlength="12" required="true"/>
                                </div> 
                                <div class="form-group">
                                    <label>Primer Nombre</label>
                                    <input type="text" class="form-control" name="p_nombre"  required="true"/>
                                </div>
                                <div class="form-group">
                                    <label>Primer Apellido</label>
                                    <input type="text" class="form-control" name="p_apellido" required="true"/>
                                </div>
                                <div class="form-group">
                                    <label>Segundo Apellido</label>
                                    <input type="text" class="form-control" name="s_apellido"  max="64" min="17"required="true"/>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-4">
                                <div class="form-group">
                                    <label> Nº de Telefono</label>
                                    <input type="text" class="form-control" name="telefono"  maxlength="8"required="true">
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="direccion" required="true"/>
                                </div>
                                 
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">@</span> <input class="form-control" type="email" aria-describedby="basic-addon1"> </div>
                                </div>
                                <div class="form-group">
                                    <label>Clave</label>
                                    <input type="password" class="form-control" name="clave" required="true"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5 col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger" type="reset" name="limpiar">Limpiar</button>
                                  
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>