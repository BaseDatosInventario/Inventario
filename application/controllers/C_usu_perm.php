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
        $lista = $this->listar_usuario(); 
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/Registrar_us_per_view", compact("lista"));
        $this->load->view("layout/footer");
       }
     public function index_lista(){
         
         $this->form_validation->set_rules('rum_usuario', 'Run', 'required|numeric');
        
          if(  $this->form_validation->run()){
              
        $lista = $this->listar_usuario(); 
        $per_si =$this->lista_permiso_si();
        $per_no =$this->lista_permiso_no();
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/Registrar_us_per_view", compact("lista","per_si","per_no"));
        $this->load->view("layout/footer");
          }else{
              $this->index();
          }
         
       
       }
       public function listar_usuario(){
           $this->load->model("M_usuario");
           return $this->M_usuario->listarUsuario();
       }
       public function lista_permiso_si(){
           $num_run =$this->input->post("rum_usuario");
           $this->load->model("M_usupermi");
        return  $permisos_si =$this->M_usupermi->listar_permisos_si($num_run);
          
          
       }
       public function agregar_permiso(){
           $data = $this->input->post("permisos");
           var_dump($data);
       }
       public function lista_permiso_no(){
           $num_run =$this->input->post("rum_usuario");
           $this->load->model("M_usupermi");
       
       return   $permisos_no =$this->M_usupermi->listar_permisos_no($num_run);
          
       }
}
