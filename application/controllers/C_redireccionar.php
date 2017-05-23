<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_redireccionar
 *
 * @author pedrito
 */
class C_redireccionar extends CI_controller{
    //put your code here
    
    public function vista_tipoUsuario(){
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/RegistroTipoUsuario_view");
        $this->load->view("layout/footer");
        
    }
}
