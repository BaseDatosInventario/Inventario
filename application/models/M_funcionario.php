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

    function buscar_funcionario($run) {

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

    function buscar_usuario($run) {

        $dv = substr($run, -1); // digito verificador
        $rn = substr($run, 0, -2);

        $this->db->where('num_run_f', $run);
        $dato = $this->db->get('usuario');
        if ($dato->num_rows() > 0) {
            return $dato;
        } else {
            return null;
        }
    }

    function crear_cuenta_funcionario($run, $id_tipo_usuario, $clave, $estado) {

        $funcionario = $this->buscar_funcionario($run);
        $b_usuario = $this->buscar_usuario($run);

        if ($funcionario !== null && $b_usuario === null) {
            $rn = substr($run, 0, -2);

            $usuario = array(
                'num_run_f' => $rn, 'id_tipo_usuario' => $id_tipo_usuario, 'clave' => $clave, 'estado' => $estado
            );

            $dato = $this->db->insert('usuario', $usuario);
            return $dato;
        } else if ($b_usuario !== null) {

            return "cuenta existente";
        } else {

            return null;
        }
    }

    function modificar_funcionario($run, $p_nombre, $p_apellido, $s_apellido, $telefono, $direccion, $email) {

        $rn = substr($run, 0, -2);

        $this->db->where("num_run", $rn);
        $this->db->set("p_nombre", $p_nombre);
        $this->db->set("p_apellido", $p_apellido);
        $this->db->set("s_apellido", $s_apellido);
        $this->db->set("telefono", $telefono);
        $this->db->set("direccion", $direccion);
        $this->db->set("correo_electronico", $email);
        $dato = $this->db->update('funcionario');
        return $dato;
    }

    function modidficar_cuenta($run,$clave,$id_tipo_usuario,$estado) {
        $rn = substr($run, 0, -2);

        $this->db->where("num_run_f", $rn);
        $this->db->set("clave", $clave);
        $this->db->set("id_tipo_usuario", $id_tipo_usuario);
        $this->db->set("estado", $estado);
        $dato = $this->db->update('usuario');
        return $dato;
    }

    
    function buscar_cuenta($run) {

     
        $rn = substr($run, 0, -2);
        $this->db->where('num_run_f', $rn);       
        $dato = $this->db->get('buscar_cuenta');

        if ($dato->num_rows() > 0) {
            return $dato;
        } else {
            return null;
        }
    }

    
}
