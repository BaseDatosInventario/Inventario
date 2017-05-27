<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_permiso
 *
 * @author pedrito
 */
class M_permiso  extends CI_Model{
    //put your code here
    
      const STATUS_DELETED = 0; //constante con el valor de eliminado
    const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo

    public function mostrar_permisos() {
      //  $this->db->select("id_tipo_usuario,Nombre,descripcion");
      
        return $this->db->get("permiso")->result();
    }

    public function actualizar_permiso($id,  $descripcion) {
        $data = array(
           
            'descripcion' => $descripcion
        );
        $this->db->where('id_permiso', $id);

        return $this->db->update('tipo_usuario', $data);
    }

    public function eliminar_permiso($id) {
        $this->db->where("id_permiso",$id);
      return  $this->db->delete("permiso");
    }
    
     public function agregar_permiso($nombre){
           $data = array(
                            'id_permiso'=>'0',
                            'descripcion'=> $nombre
                           
                            
                         );

           return $this->db->insert('permiso', $data); 
        }
}
