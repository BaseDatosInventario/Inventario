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

    function pre_venta() {
        $run_usuario = $this->session->userdata('run_usuario');
        date_default_timezone_set('America/Santiago'); // zona horaria a la de Chile
        $fecha = date('Y-m-d');
        $dato = $this->M_venta->buscar_pre_venta($run_usuario, $fecha);
        return $dato;
    }

    function venta() {
        $num_venta=$this->M_venta->ultima_venta();
        $dato = $this->pre_venta();
        $this->head();
        $this->load->view('GestionVenta/venta.php' , compact('dato','num_venta'));
        $this->load->view("layout/footer");
    }

}
