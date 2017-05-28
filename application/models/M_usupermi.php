<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_usupermi
 *
 * @author pedrito
 */
class M_usupermi extends CI_Model {
    //put your code here
    
    public function listar_permisos_no($rum){
        $sql="select * from permiso WHERE permiso.id_permiso not in
 (SELECT usuario_permiso.id_permiso from usuario_permiso WHERE usuario_permiso.num_run_u=".$rum.")";
          if ($this->db->query($sql)->num_rows() > 0){
                return $this->db->query($sql)->result();
                }else{
                    return NULL;
                }
    }
    public function listar_permisos_si($rum){
        $sql="SELECT permiso.descripcion from permiso WHERE permiso.id_permiso"
              . " = (SELECT usuario_permiso.id_permiso from usuario_permiso WHERE usuario_permiso.num_run_u = ".$rum.")";
          if ($this->db->query($sql)->num_rows() == 1){
                return $this->db->query($sql)->result();
                }else{
                    return NULL;
                }
    }
   
}
