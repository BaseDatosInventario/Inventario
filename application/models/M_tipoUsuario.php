<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_tipoUsuario
 *
 * @author pedrito
 */
class M_tipoUsuario extends CI_Model {
    //put your code here
    
    public function mostrar_tipos_usuario(){
        return $this->db->get("tipo_usuario")->result();
    }
}
