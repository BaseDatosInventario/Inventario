<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_redireccionar
 *
 * @author rodrigo
 */
class C_redireccionar extends CI_Controller {

    function head() {
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
    }

    function registro_usuario_view() {
        $this->head();
        $this->load->view('GestionUsuario/Registro_usuario_view');
        $this->load->view("layout/footer");
    }

    function crear_cuenta_view() {
        $tipo_usuario = $this->M_usuario->tipo_usuario();
        $this->head();
        $this->load->view('GestionUsuario/crear_cuenta_view', compact('tipo_usuario'));
        $this->load->view("layout/footer");
    }

}
