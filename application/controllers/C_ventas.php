<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_ventas
 *
 * @author pedrito
 */
class C_ventas extends CI_Controller {
    
    
    //put your code here
    
    public function index(){
      
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("Ventas/RegistrarVenta_view");
        $this->load->view("layout/footer");
     
    }
}
