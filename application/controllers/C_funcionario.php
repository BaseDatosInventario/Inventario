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
        $this->load->model('M_funcionario');
    }

    function registrar_funcionario() {

        $run = $this->input->post('run');  $p_nombre = $this->input->post('p_nombre');  $p_apellido = $this->input->post('p_apellido');$s_apellido = $this->input->post('s_apellido');
        $telefono = $this->input->post('telefono');
        $direccion = $this->input->post('direccion');
        $email = $this->input->post('email');
        $buscar_run = $this->M_funcionario->comprobar_run($run);
        $buscar_email = $this->M_funcionario->comprobar_email($email);

        if ($buscar_email===null && $buscar_run===null) {
            if ($this->M_funcionario->registrar_funcionario($run, $p_nombre, $p_apellido, $s_apellido, $telefono, $direccion, $email)) {
                $mensaje="EL funcionario se registro";
            }
            
        } else {
            if ($buscar_email != null) {
                $mensaje = "El email " . $email . " ya se encuentra registrado";
            } else if ($buscar_run != null) {
                $mensaje = "El Run " . $run . " ya se encuentra registrado";
            }
        }
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view('GestionUsuario/Registro_usuario_view',  compact('mensaje'));
        $this->load->view("layout/footer");
    }

}
