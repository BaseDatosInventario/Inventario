<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_cuenta_funcionario
 *
 * @author rodrigo
 */
class C_cuenta_funcionario extends CI_Controller {

    function head() {
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
    }

    function crear_cuenta_funcionario() {
        $run = $this->input->post('run');
        $id_tipo_usuario = $this->input->post('id_tipo_usuario');
        $clave = $this->input->post('clave');
        $estado = $this->input->post('estado');
        $dato = $this->M_funcionario->crear_cuenta_funcionario($run, $id_tipo_usuario, $clave, $estado);

        if ($dato != null && $dato !== "cuenta existente") {
            $mensaje = "El usuario Fue creado exitosamente";
        } elseif ($dato === null) {
            $mensaje = "El Funcionario no se encuentra en la base de datos";
        } elseif ($dato === "cuenta existente") {
            $mensaje = "La cuanta ya se creo";
        }

        $tipo_usuario = $this->M_usuario->tipo_usuario();
        $this->head();
        $this->load->view('GestionUsuario/crear_cuenta_view', compact('tipo_usuario', 'mensaje'));
        $this->load->view("layout/footer");
    }

    function s_div_usuario_select() {

        $tipo_usuario = $this->M_usuario->tipo_usuario();
        echo '                           <select class="form-control" required name="id_tipo_usuario">';
        echo '                               <option value="">Seleccion</option>';
        foreach ($tipo_usuario->result() as $row) {
            echo ' <option value="' . $row->id_tipo_usuario . '">' . $row->descripcion . '</option>';
        }
        echo '                           </select>';
    }

    function t_div_usuario($run, $dv_run) {
        echo'  <div class="col-sm-5 col-md-4">';
        echo '<div class="form-group">';
        echo '<label>RUN</label>';    
        echo '<input type="text" onfocus = "this.blur()" name="run"  value="' . $run . '-' . $dv_run . '" class="form-control"  maxlength="12"/> ';
        echo '</div>';
        echo '                       <div class="form-group">';
        echo '                           <label>Tipo Usuario</label>';
        $this->s_div_usuario_select();
        echo '                      </div>';
        echo '                       </div>';
    }

    function p_div_usuario($run, $dv_run, $estado) {

        $this->t_div_usuario($run, $dv_run, $estado);
        echo'  <div class="col-sm-5 col-md-4">';

        if ($estado == 1) {
            echo '<div class="form-group">';
            echo '<label>Estado </label><br>';
            echo 'Habilitar &nbsp;<input type="radio" checked="true" name="estado" value="1" >&nbsp;&nbsp;';
            echo 'Deshabilitar &nbsp;<input type="radio" name="estado" value="0" ><br><br></div>';
        } else {
            if ($estado == 0) {
                echo '<div class="form-group">';
                echo '<label>Estado </label><br>';
                echo 'Habilitar &nbsp;<input type="radio"  name="estado" value="1" >&nbsp;&nbsp;';
                echo 'Deshabilitar &nbsp;<input type="radio" checked="true" name="estado" value="0" ><br><br> </div>';
            }
        }

        echo '                       <div class="form-group">';
        echo '                           <label>Contraceña</label>';
        echo '                           <input type="password" class="form-control" name="clave"  max="16" min="17"required="true"/></div></div>';
    }

    function s_div_mostrar_usu() {
        echo ' <div class="row">';
        echo ' <div class="col-sm-5 col-md-4">';
        echo ' <div class="form-group">';
        echo ' <button type="submit" class="btn btn-primary" name="guardar">Guardar</button> </div></div></div>';
    }

    function mostrar_cuenta_funcionario() {
        $run = $this->input->post('run');



        $dato = $this->M_funcionario->buscar_cuenta($run);

        if ($dato != null) {
            echo '<div class="row">';
            foreach ($dato->result() as $row) {
                $this->p_div_usuario($row->num_run_f, $row->dv_run, $row->estado);
            }
            echo '</div>';
            $this->s_div_mostrar_usu();
        } else {
            echo '<h1>El wn no existe</h1>';
        }
    }

    function modificar_cuenta_funcionario() {
        $run = $this->input->post('run');
        
        $id_tipo_usuario = $this->input->post('id_tipo_usuario');
        $clave = $this->input->post('clave');
        $estado = $this->input->post('estado');
        $tipo_usuario = $this->M_usuario->tipo_usuario();

        if ($this->M_funcionario->modidficar_cuenta($run, $clave, $id_tipo_usuario, $estado)) {

            $mensaje2 = "Cuenta Actualizada";
        } else {
            $mensaje2 = "Cuenta No Actualizada";
        }

        $this->head();
        $this->load->view('GestionUsuario/crear_cuenta_view.php', compact('mensaje2', 'tipo_usuario'));
        $this->load->view('layout/footer.php');
    }

}
