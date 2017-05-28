<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_usuario
 *
 * @author pedrito
 */
class M_usuario extends CI_Model{
    //put your code here
    const STATUS_DELETED = 0; //constante con el valor de eliminado
    const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo
    public function validacion_usuario($run,$password)// datos se cargan en la sesion
	{ 
        $dv=  substr($run,-1); // digito verificador
        $rn = substr($run,0 ,-2);
        $clave= hash("sha256",$password);
		$sql ="SELECT funcionario.num_run ,funcionario.p_nombre,"
                        . " funcionario.p_apellido,usuario.id_tipo_usuario,"
                        . "funcionario.correo_electronico  from funcionario ,"
                        . " usuario where funcionario.num_run = usuario.num_run_f and "
                        . "  usuario.num_run_f =".$rn." and funcionario.dv_run ='".$dv."' "
                        . " and clave='".$clave."' and usuario.activo =".self::STATUS_ACTIVO.";";
                if ($this->db->query($sql)->num_rows() == 1){
                return $this->db->query($sql)->row();
                }else{
                    return NULL;
                }
		
	}
        
        public function listarUsuario() {
            $this->db->where("activo", self::STATUS_ACTIVO);
            return $this->db->get("usuario")->result();
        }
        
       }
