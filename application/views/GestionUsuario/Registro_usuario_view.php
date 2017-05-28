<div class="container">
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <form id="formresgfun" action="<?php echo base_url('index.php/C_funcionario/registrar_funcionario') ?>" method="post">
                            <div class="x_title">
                                <h2>Registro Funcionario</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 col-md-4">
                                    <div class="form-group">
                                        <label>RUN</label>
                                        <input type="text" id="txt_rut" class="form-control" name="run" maxlength="12" required="true" autocomplete=""/> 
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
                                        <input type="text"  class="form-control" name="telefono"  maxlength="8"required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <input type="text" class="form-control" name="direccion" required="true"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group"><span class="input-group-addon" id="basic-addon1">@</span> <input class="form-control" type="email" name="email" aria-describedby="basic-addon1"> </div>
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
                        </form>
                        <h1 class="text-danger"></h1>
                        <?php
                        if (isset($mensaje)) {
                            echo $mensaje;
                        }
                        ?>
                    </div>

                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Modificar Funcionario</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-md-4">
                                <div class="form-group">
                                    <label>RUN</label>

                                    <input type="text" id="run" class="form-control" name="run" maxlength="12" required="true" autocomplete=""/> <button type="submit" class="btn btn-success" onclick="mostar_funcionario()">Buscar</button>
                                </div> 
                            </div> 
                        </div>
                        <form id="contenido" action="<?php echo base_url('index.php/C_funcionario/modificar_funcionario') ?>" method="post">

                        </form>


                        <h1 class="text-danger"></h1>
                        <?php
                        if (isset($mensaje2)) {
                            echo $mensaje2;
                        }
                        ?>


                    </div>
                </div>
            </div>
            <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>

            <script>


                                        function mostar_funcionario() {
                                            var run = document.getElementById('run').value;
                                            var xhttp = new XMLHttpRequest();
                                            xhttp.onreadystatechange = function () {
                                                if (xhttp.readyState === 4 && xhttp.status === 200) {
                                                    document.getElementById("contenido").innerHTML = xhttp.responseText;
                                                }
                                            };
                                            xhttp.open("POST", "<?php echo base_url('index.php/C_funcionario/mostrar_funcionarios'); ?>", true);
                                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                            xhttp.send("&run=" + run + "");
                                        }
            </script>




        </div>
    </div>
</div>