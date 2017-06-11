<div class="container">
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <form action="<?php echo base_url('index.php/C_cuenta_funcionario/crear_cuenta_funcionario') ?>" method="post">
                            <div class="x_title">
                                <h2>Crear Cuenta Funcionario</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 col-md-4">
                                    <div class="form-group">
                                        <label>RUN</label>
                                        <input type="text" id="txt_rut" value=""class="form-control" name="run" maxlength="12" required="true" autocomplete=""/> 
                                    </div> 
                                    <div class="form-group">
                                        <label>Tipo Usuario</label>
                                        <select class="form-control" name="id_tipo_usuario">
                                            <option value="">Seleccion</option>
                                            <?php foreach ($tipo_usuario->result() as $row) { ?>

                                                <option value="<?php echo $row->id_tipo_usuario; ?>"><?php echo $row->descripcion; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado </label><br>
                                        Habilitar &nbsp;<input type="radio"  name="estado" value="1" >&nbsp;
                                        Deshabilitar &nbsp;<input type="radio" name="estado" value="0" >
                                    </div>
                                    <div class="form-group">
                                        <label>Contraceña</label>
                                        <input type="password" class="form-control" name="clave"  max="16" min="17"required="true"/>
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
                            <h2>Modificar Cuenta Funcionario</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-md-4">
                                <div class="form-group">
                                    <label>RUN</label>

                                    <input type="text"  id="run" class="form-control" name="run" maxlength="12" required="true" autocomplete=""/> <button type="submit" class="btn btn-success" onclick="mostar_cuenta_funcionario()">Buscar</button>
                                </div> 
                            </div> 
                        </div>
                        <form id="contenido" action="<?php echo base_url('index.php/C_cuenta_funcionario/modificar_cuenta_funcionario') ?>" method="post">

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


        </div>

    </div>

    <script>


        function mostar_cuenta_funcionario() {
            var run = document.getElementById('run').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    document.getElementById("contenido").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("POST", "<?php echo base_url('index.php/C_cuenta_funcionario/mostrar_cuenta_funcionario'); ?>", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("&run=" + run + "");
        }
    </script>
</div>