<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_login
 *
 * @author pedrito
 */
class C_login extends CI_Controller{
    //put your code here
    
     public function _construct() {
        parent::_construct();
    }
    
     public function login(){
      $this->load->view("login/v_cabecera_login");
      $this->load->view("login/v_login", $this->formulario_login());
  }
     public function index(){
         if($this->session->userdata('is_logued_in')== TRUE){
                $this->load->view("layout/cabecera");
                $this->load->view("layout/menu_lateral");
                $this->load->view("layout/side_bar");
                $this->load->view("layout/contenido");
                $this->load->view("layout/footer");
         }else{
             $this->login();
         }
  }
  
  
  
  public function formulario_login(){
  return   array( 'run'=>  array ( 
                        'name'           => 'run',
                        'maxlength'      => '11',
                        'size'           => '11',
                        'id'             =>'txt_rut',
                        'aria-describedby'=>'basic-addon1',
                        'value'          => set_value('run'),
                        'class'          => 'form-control',
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su run',
                        'type'           =>'text'),
        'clave'=>array( 'name'           =>'clave',
                        'maxlength'      =>'16' ,
                        'id'             =>'clave' ,
                        'class'          =>'form-control',
                        'value'          => set_value('clave'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su contraseña',
                        'type'           =>'password')
           );
}//
  
   public function cerrar_sesion()
	{
		$this->session->sess_destroy();
		$this->login();
	}
    
  
  
  public function iniciar_sesion(){
     
          $this->form_validation->set_rules("run","Run",'required');
          $this->form_validation->set_rules("clave","Clave",'required|xss_clean');
          
           $this->form_validation->set_message("required", "El campo %s es requerido");
           $this->form_validation->set_message("xss_clean", "El campo %s fue ingresado con un formato incorrecto");
        
           if($this->form_validation->run())
           {
          
                $this->validar_usuario($this->input->post("run"), $this->input->post("clave"));
            }else{
              if($this->session->userdata('is_logued_in')==TRUE){
                  $this->index();
              }else {
                  $this->login();
              }
       
         
            }
     
  }
  public function validar_usuario($run,$clave){
        $this->load->model("M_usuario");
        $check_user =$this->M_usuario->validacion_usuario($run,$clave);
       
        if(!is_null($check_user)){
           $data = array(
	                'is_logued_in' 	=> TRUE,
                        'nombre'=>$check_user->p_nombre,
                        'ap_paterno'=>$check_user->p_apellido,
	                'run_usuario' 	=> $check_user->num_run,
	                'id_tipo_usuario'=>$check_user->id_tipo_usuario,
	                'correo' =>$check_user->correo_electronico
            		);		
					$this->session->set_userdata($data);
					$this->index();
                                       
				}

        else{
            //si el usuario no existe
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
           $this->login();
        }
         
    }
}
