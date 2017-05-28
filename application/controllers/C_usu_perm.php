<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_usu_perm
 *
 * @author pedrito
 */
class C_usu_perm extends CI_Controller{
    //put your code here
    
     public function index(){
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/Registrar_us_per_view");
        $this->load->view("layout/footer");
       }
}
