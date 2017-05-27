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
    public function _construct() {
      
    }
    public function index(){
       
        
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/RegistroTipoUsuario_view");
        $this->load->view("layout/footer");
        
   
    }
    public function formulario_nuevo_tipoUsuario(){
         $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/AgregarNuevoTipousuario_view");
        $this->load->view("layout/footer");
    }
    
     public function index_mensaje($mensaje){
          
         // if($this->session->userdata('id_tipo_usuario')!=null){ // si no inicio sesion lo manda al login
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
        $this->load->view("GestionUsuario/AgregarNuevoTipousuario_view", compact("mensaje"));
       $this->load->view("layout/footer");
      //  }else{
          //  redirect(base_url("index.php/C_login/login"));
        //}
    }
    
    public function mostrar_tipoUsuario(){
      
         $this->load->model("M_tipoUsuario");
        echo json_encode($this->M_tipoUsuario->mostrar_tipos_usuario());
            
       
    }
      
    
    
     public function insertar_tipousuario(){
         $mensaje="";
       if(isset($_POST["nombre"] ))
       {
         
         $this->form_validation->set_rules('nombre', 'Nombre', 'required|callback_letras_acentos_formato');
         $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|callback_letras_acentos_formato');
       
         
          
          $this->form_validation->set_message('required', 'El campo {field} es requerido');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras');
         
          if($this->form_validation->run()) /**/
          {
              $this->load->model("M_tipoUsuario");
                  
            if( $this->M_tipoUsuario->agregar_tipo_usuario($this->input->post("nombre"),$this->input->post("descripcion"))){
                $mensaje=' <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>.  Agregado correctamente</div>';
              
                 // $this->index_mensaje($mensaje);
           }else{
                    
                 $mensaje=' <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong>. Ocurrio un error al agregar </div>';
                 //$this->index_mensaje($mensaje);        
  }
               
          }
              
       }
       $this->index_mensaje($mensaje);
    }
    
       
    
    
    
     public function modificar_ajax(){
         if($this->input->is_ajax_request())
        {  $this->form_validation->set_rules('code_tu', 'Codigo', 'required|numeric');
           $this->form_validation->set_rules('nombre_tu', 'Nombre', 'required|callback_letras_acentos_formato|max_length[30]|xss_clean');
           $this->form_validation->set_rules('descri_tu', 'Descripción', 'required|callback_letras_acentos_formato|max_length[99]|xss_clean');
        
          $this->form_validation->set_message('required', 'El campo {field} es requerido.');
          $this->form_validation->set_message('letras_acentos_formato', 'El campo {field} debe contener solo letras.');
          $this->form_validation->set_message('max_length', 'El campo {field} debe tener un máximo de 10 caracteres.');
          $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico.');
         if(  $this->form_validation->run())
          {   $id =$this->input->post("code_tu");
              $nombre =$this->input->post("nombre_tu");
              $descripcion =$this->input->post("descri_tu");
              $this->load->model("M_tipoUsuario");
          if( $this->M_tipoUsuario->actualizar_tipousuario($id,$nombre,$descripcion)){
            echo json_encode(array("status" => "success"));
           }else{ echo json_encode(array("status" => "error")); }
           }else{ echo json_encode(array("error"=> validation_errors()));}
        }
    }
    
    public function eliminar_tipousuario(){
         
            if($this->input->is_ajax_request())
            {

                $this->load->model("M_tipoUsuario");
               if( $this->M_tipoUsuario->eliminar_tipo_usuario($this->input->post("id_tuser")))
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