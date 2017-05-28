<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_permisos
 *
 * @author pedrito
 */
class C_permisos extends CI_Controller {
    
    
    //put your code here
    
      public function index(){
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/Registro_permiso_view");
        $this->load->view("layout/footer");
       }
        public function index_mensaje($mensaje){
          
         // if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/Registro_permiso_view", compact("mensaje"));
       $this->load->view("layout/footer");
      //  }else{
          //  redirect(base_url("index.php/C_login/login"));
        //}
    }
    
    public function mostrar_permisos(){
      
         $this->load->model("M_permiso");
        echo json_encode($this->M_permiso->mostrar_permisos());
            
       
    }
      
    
    
     public function insertar_permiso(){
         $mensaje="";
       if(isset($_POST["nombre"] ))
       {
         
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_letras_acentos_formato|xss_clean');
        
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
          $this->form_validation->set_message('xss_clean', 'El campo {field} no tiene un formato correcto');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras');
         
          if($this->form_validation->run()) /**/
          {
              $this->load->model("M_permiso");
                  
            if( $this->M_permiso->agregar_permiso($this->input->post("nombre"))){
                $mensaje=' <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>.  Agregado correctamente</div>';
              
               
           }else{
                    
                 $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>. Ocurrio un error al agregar </div>';
                
  }
               
          }
              
       }
       $this->index_mensaje($mensaje);
    }
    
       
    
    
    
     public function modificar_ajax(){
         if($this->input->is_ajax_request())
        {  $this->form_validation->set_rules('code_per', 'Codigo', 'required|numeric');
           $this->form_validation->set_rules('nombre_per', 'Nombre', 'required|callback_letras_acentos_formato|max_length[30]|xss_clean');
         
        
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
         if(  $this->form_validation->run())
          {   $id =$this->input->post("code_per");
              $nombre =$this->input->post("nombre_per");
             
              $this->load->model("M_permiso");
          if( $this->M_permiso->actualizar_permiso($id,$nombre)){
            echo json_encode(array("status" => "success"));
           }else{ echo json_encode(array("status" => "error")); }
           }else{ echo json_encode(array("error"=> validation_errors()));}
        }
    }
    
    public function eliminar_permiso(){
         
            if($this->input->is_ajax_request())
            {

                $this->load->model("M_permiso");
               if( $this->M_permiso->eliminar_permiso($this->input->post("id_permiso")))
               {
                    echo json_encode(array("status" => "success"));
               }else{
                    echo json_encode(array("status" => "error"));
               }
           
         }
         
        }
    function letras_acentos_formato($fullname){ //letras y acentos
        if(preg_match('/^[a-záéíóúñüÁÉÍÓÚÑÜ ]+$/i',$fullname)){
            return true;
        }else{
            return false;
        }
   }
}
