<div class="container">
    <div class="right_col" role="main">
        <form action="<?php echo base_url('index.php/C_boleta/boleta') ?>">

            <button type="submit">boleta</button> 
        </form>

        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Venta</h2>

                            <div class="clearfix"></div>

                            <div class="row" onload="document.getElementById('codigo').focus();">
                                <div class="col-sm-5 col-md-4">
                                    <div class="form-group" id="cod">
                                        <label>CODIGO</label>

                                        <input type="text"  id="codigo" class="form-control"  onkeypress="mostar_funcionario(event), setTimeout('vaciar()', 500);"/> 


                                    </div> 
                                    <div class="form-group" id="man" style="display: none;">
                                        <label>Ingresar CODIGO Manual</label>

                                        <input type="text"  id="b_codigo"  class="form-control"> 
                                        <input type="button" value="ingresar" onclick="agregar_manual()" class="btn btn-success"/>

                                    </div>


                                    <fieldset id="buildyourform" >
                                        <legend>Venta Nº <?php echo sprintf("%06d", ($num_venta + 1)); ?></legend>
                                    </fieldset>
                                </div>
                                <div class="col-sm-5 col-md-4">
                                    <label>Cambiar tipo de ingreso</label>
                                    <select id="manual" class="form-control" onclick="mostrar()">
                                        <option value="auto">Automatico</option>
                                        <option value="manual">Manual</option>

                                    </select>
                                </div>

                                
                                    <table  class="display table-hover"   cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Detalle</th>                                            
                                                <th>Precio Unitario</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>                                            
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenido">
                                            <?php
                                            $total_venta = 0;
                                            foreach ($dato->result() as $row) {
                                                $total_venta = $total_venta + ($row->cantidad * $row->valor_venta);
                                                echo '<tr><td>' . sprintf("%06d", $row->codigo_barra) . '</td><td>' . $row->p_nombre . '</td><td>' . $row->detalle . '</td><td> $' . number_format($row->valor_venta, 0, ',', '.') . '</td><td> ' . $row->cantidad . '</td><td> $' . number_format(($row->cantidad * $row->valor_venta), 0, ',', '.') . '</td><td><form method="post" action="' . base_url('index.php/C_venta/eliminar_producto') . '"><input type="hidden" name="id_producto" value="' . $row->id_producto . '"> <input type="submit" class="btn btn-danger" value="Eliminar"/></form></td></tr>';
                                                                                       }
                                            echo '<form action="' . base_url('index.php/C_boleta/boleta') . '" method="post">';
                                            foreach ($dato->result() as $row) {


                                                echo '<input type="hidden" name="codigo[]" value="' . $row->codigo_barra . '">';
                                                echo '<input type="hidden" name="nombre[]" value="' . $row->p_nombre . '">';
                                                echo '<input type="hidden" name="precio[]"value="' . $row->valor_venta . '">';
                                                echo '<input type="hidden" name="cantidad[]"value="' . $row->cantidad . '" >';
                                                echo '<input type="hidden" name="id_producto[]"value="' . $row->id_producto . '" >';
                                                echo '<input type="hidden" name="total[]" value="'.($row->cantidad * $row->valor_venta).'">';
                                                echo '<input type="hidden" value="' . ($num_venta + 1) . '" name="num_venta">';
                                            }
                                            echo '<tr><td><button class="btn btn-success" type="submit">Hacer Venta</button></td>';
                                            echo '<td></td><td></td><td></td><td><h1 class="text-primary"> Total </h1></td><td><h1 class="text-primary">$' . number_format($total_venta, 0, ",", ".") . '</h1><input type="hidden" name="total_venta" value="' . $total_venta . '"></td><td><button class="btn btn-danger" onclick="cancelar_venta()">Cancelar Venta</button></td></tr>';
                                            echo '</form>';
                                            ?>


                                        </tbody>

                                    </table>
                             
<?php
if (isset($mensaje)) {
    echo '<h1 class="text-danger">' . $mensaje . '</h1>';
}
?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" value="1" id="b_id_producto" name="b_id_producto">



<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>

<script type="text/javascript">
                                        window.onload = function () {
                                            document.getElementById('codigo').focus();
                                        };


</script>

<script>

    function vaciar() {
        document.getElementById('codigo').value = "";

    }
    ;

    function mostrar() {
        var manual = document.getElementById('manual').value;
        if (manual === "auto") {
            document.getElementById('cod').style.display = 'block';
            document.getElementById('man').style.display = 'none';

        } else if (manual === "manual")
        {
            document.getElementById('man').style.display = 'block';
            document.getElementById('cod').style.display = 'none';
        }
    }
    function mostar_funcionario(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla == 13) {
            var codigo = document.getElementById('codigo').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    document.getElementById("contenido").innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("POST", "<?php echo base_url('index.php/C_venta/pre_venta'); ?>", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("&codigo=" + codigo + "");

        }
    }

    function cancelar_venta() {
        var id_producto = document.getElementById('b_id_producto').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                document.getElementById("contenido").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "<?php echo base_url('index.php/C_venta/cancelar_venta'); ?>", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("&id_producto=" + id_producto + "");
    }

    function agregar_manual()
    {
        var codigo = document.getElementById('b_codigo').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                document.getElementById("contenido").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "<?php echo base_url('index.php/C_venta/pre_venta'); ?>", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("&codigo=" + codigo + "");
    }
</script>
