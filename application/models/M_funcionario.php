<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_funcionario
 *
 * @author rodrigo
 */
class M_funcionario extends CI_Model {

    function comprobar_run($run) {

        $dv = substr($run, -1); // digito verificador
        $rn = substr($run, 0, -2);
        $this->db->where('num_run', $rn);
        $this->db->where('dv_run', $dv);
        $dato = $this->db->get('funcionario');

        if ($dato->num_rows() > 0) {
            return $dato;
        } else {
            return null;
        }
    }

    function comprobar_email($email) {
        $this->db->where('correo_electronico', $email);
        $dato = $this->db->get('funcionario');

        if ($dato->num_rows() > 0) {
            return $dato;
        } else {
            return null;
        }
    }

    function registrar_funcionario($run, $p_nombre, $p_apellido, $s_apellido, $telefono, $direccion, $email) {
        $dv = substr($run, -1); // digito verificador
        $rn = substr($run, 0, -2);
        $funcionario = array(
            'num_run' => $rn, 'dv_run' => $dv, 'p_nombre' => $p_nombre, 'p_apellido' => $p_apellido, 's_apellido' => $s_apellido, 'telefono' => $telefono, 'direccion' => $direccion, 'correo_electronico' => $email
        );
        $dato = $this->db->insert('funcionario', $funcionario);

        return $dato;
    }

}
