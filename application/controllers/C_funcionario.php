<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_funcionario
 *
 * @author rodrigo
 */
class C_funcionario extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function head() {
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
    }

    function registrar_funcionario() {

        $run = $this->input->post('run');
        $p_nombre = $this->input->post('p_nombre');
        $p_apellido = $this->input->post('p_apellido');
        $s_apellido = $this->input->post('s_apellido');
        $telefono = $this->input->post('telefono');
        $direccion = $this->input->post('direccion');
        $email = $this->input->post('email');
        $buscar_run = $this->M_funcionario->comprobar_run($run);
        $buscar_email = $this->M_funcionario->comprobar_email($email);

        if ($buscar_email === null && $buscar_run === null) {
            if ($this->M_funcionario->registrar_funcionario($run, $p_nombre, $p_apellido, $s_apellido, $telefono, $direccion, $email)) {
                $mensaje = "EL funcionario se registro";
            }
        } else {
            if ($buscar_email != null) {
                $mensaje = "El email " . $email . " ya se encuentra registrado";
            } else if ($buscar_run != null) {
                $mensaje = "El Run " . $run . " ya se encuentra registrado";
            }
        }
        $this->head();
        $this->load->view('GestionUsuario/Registro_usuario_view', compact('mensaje'));
        $this->load->view("layout/footer");
    }

//modificar funcionario---------------------------------------------------------------------------------------
    function p_div_mostrar_fun($num_run, $dv_run, $p_nombre, $p_apellido, $s_apellido) {
        echo'     <div class="col-sm-5 col-md-4">';
        echo '<div class="form-group">';
        echo '<label>RUN</label>';
        echo '<input type="text" id="txt_rut" class="form-control" onfocus = "this.blur()" name="run" value="' . $num_run . '-' . $dv_run . '" maxlength="12" required="true" autocomplete=""/>';
        echo '</div> ';
        echo '<div class="form-group">';
        echo '<label>Primer Nombre</label>';
        echo '<input type="text" class="form-control" value="' . $p_nombre . '" name="p_nombre"  required="true"/>';
        echo '</div>';
        echo '<div class="form-group">';
        echo ' <label>Primer Apellido</label>';
        echo ' <input type="text" class="form-control"  value="' . $p_apellido . '" name="p_apellido" required="true"/>';
        echo '</div>';
        echo '         <div class="form-group">';
        echo '             <label>Segundo Apellido</label>';
        echo '            <input type="text" class="form-control"  value="' . $s_apellido . '" name="s_apellido"  max="64" min="17"required="true"/>';
        echo '        </div>';
        echo '     </div>';
    }

    function s_div_mostrar_fun($telefono, $direccion, $email) {
        echo '   <div class="col-sm-5 col-md-4">';
        echo '                       <div class="form-group">';
        echo '                     <label> Nº de Telefono</label>';
        echo '                     <input type="text"  class="form-control" value="' . $telefono . '" name="telefono"  maxlength="8"required="true">';
        echo '                 </div>';
        echo '                 <div class="form-group">';
        echo '                     <label>Direccion</label>';
        echo '                     <input type="text" class="form-control" value="' . $direccion . '" name="direccion" required="true"/>';
        echo '                 </div>';
        echo '                 <div class="form-group">';
        echo '      <label>Email</label>';
        echo '                     <div class="input-group"><span class="input-group-addon" id="basic-addon1">@</span> <input class="form-control" type="email" value="' . $email . '" name="email" aria-describedby="basic-addon1"> </div>';
        echo '                 </div>';
        echo '             </div>';
    }

    function t_div_mostrar_fun() {
        echo ' <div class="row">';
        echo ' <div class="col-sm-5 col-md-4">';
        echo ' <div class="form-group">';
        echo ' <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>';
        echo ' </div>';
        echo ' </div>';
        echo ' </div>';
    }

    function mostrar_funcionarios() {
        $run = $this->input->post('run');



        $dato = $this->M_funcionario->buscar_funcionario($run);

        if ($dato != null) {
            echo '<div class="row">';
            foreach ($dato->result() as $row) {
                $this->p_div_mostrar_fun($row->num_run, $row->dv_run, $row->p_nombre, $row->p_apellido, $row->s_apellido);
                $this->s_div_mostrar_fun($row->telefono, $row->direccion, $row->correo_electronico);
            } echo '</div>';
            $this->t_div_mostrar_fun();
        } else {

            echo '<h1>El wn no existe</h1>';
        }
    }

    function modificar_funcionario() {
        $run = $this->input->post('run');
        $p_nombre = $this->input->post('p_nombre');
        $p_apellido = $this->input->post('p_apellido');
        $s_apellido = $this->input->post('s_apellido');
        $telefono = $this->input->post('telefono');
        $direccion = $this->input->post('direccion');
        $email = $this->input->post('email');

        if ($this->M_funcionario->modificar_funcionario($run, $p_nombre, $p_apellido, $s_apellido, $telefono, $direccion, $email)) {
            $mensaje2 = "<script>alert('El funcionario se modifico')</script>";
        } else {
            $mensaje2 = "<script>alert('El funcionario NO se modifico')</script>";
        }
        $this->head();
        $this->load->view('GestionUsuario/Registro_usuario_view', compact('mensaje2'));
        $this->load->view("layout/footer");
    }

//modificar funcionario---------------------------------------------------------------------------------------
//
}
