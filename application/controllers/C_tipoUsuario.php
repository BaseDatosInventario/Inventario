<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_tipoUsuario
 *
 * @author pedrito
 */
class C_tipoUsuario extends CI_Controller {
    
    public function index(){
        
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/RegistroTipoUsuario_view");
        $this->load->view("layout/footer");
        
   
    }


    public function mostrar_tipoUsuario(){
        
        $this->load->model("M_tipoUsuario");
        echo json_encode($this->M_tipoUsuario->mostrar_tipos_usuario());
    }
}