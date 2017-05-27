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
    const STATUS_DELETED = 0; //constante con el valor de eliminado
    const STATUS_ACTIVO = 1; //constante con el valor de Usuario activo

    public function mostrar_tipos_usuario() {
      //  $this->db->select("id_tipo_usuario,Nombre,descripcion");
       $this->db->where("activo", self::STATUS_ACTIVO);
        return $this->db->get("tipo_usuario")->result();
    }

    public function actualizar_tipousuario($id, $nombre, $descripcion) {
        $data = array(
            'Nombre' => $nombre,
            'descripcion' => $descripcion
        );
        $this->db->where('id_tipo_usuario', $id);

        return $this->db->update('tipo_usuario', $data);
    }

    public function eliminar_tipo_usuario($id) {
        return $this->db->set("activo", self::STATUS_DELETED)->where("id_tipo_usuario", $id)->update("tipo_usuario");
    }
    
     public function agregar_tipo_usuario($nombre,$descripcion){
           $data = array(
                            'id_tipo_usuario'=>'0',
                            'Nombre' => $nombre,
                            'descripcion'=> $descripcion,
                            'activo' => self::STATUS_ACTIVO
                            
                         );

           return $this->db->insert('tipo_usuario', $data); 
        }

}
