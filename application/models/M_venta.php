<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_venta
 *
 * @author rodrigo
 */
class M_venta extends CI_Model {

    function buscar_producto($codigo) {

        $this->db->where('codigo_barra', $codigo);
        $dato = $this->db->get('producto');
        if ($dato->num_rows() > 0) {
            foreach ($dato->result() as $row) {
                return $row->codigo_barra;
            }
        } else {
            return null;
        }
    }

    function comprobar_stock($codigo) {
        $this->db->where('codigo_barra', $codigo);
        $dato = $this->db->get('producto');
        return $dato;
    }

    function cantidad_pre_venta($codigo, $run_usuario, $fecha) {
        $this->db->where('run_fun_u', $run_usuario);
        $this->db->where('codigo_barra', $codigo);
        $this->db->where('fecha', $fecha);
        $this->db->where('estado', 'Procesando');
        $dato = $this->db->get('mostrar_pre_venta');
        return $dato;
    }

    function registrar_pre_venta($codigo, $run_usuario, $fecha) {

        $pre_venta = array('id_producto' => $codigo, 'run_fun_u' => $run_usuario, 'fecha' => $fecha, 'estado' => 'Procesando');
        $dato = $this->db->insert('pre_venta', $pre_venta);
        return $dato;
    }

    function buscar_pre_venta($run_usuario, $fecha) {
        $this->db->where('run_fun_u', $run_usuario);
        $this->db->where('fecha', $fecha);
        $this->db->where('estado', 'Procesando');
        $dato = $this->db->get('mostrar_pre_venta');

        return $dato;
    }

    function eliminar_producto($id_producto, $run_usuario, $fecha) {
        $this->db->where('id_producto', $id_producto);
        $this->db->where('run_fun_u', $run_usuario);
        $this->db->where('estado', 'Procesando');
        $this->db->where('fecha', $fecha);
        $this->db->delete('pre_venta');
        return;
    }

    function ultima_venta() {

        $dato = $this->db->get('ultima_venta');
        if ($dato->num_rows() > 0) {
            foreach ($dato->result() as $row) {
                return $row->id_venta;
            }
        } else {
            return 0;
        }
    }

    function cancelar_venta($run_usuario) {
        $this->db->where('run_fun_u', $run_usuario);
        $this->db->delete('pre_venta');
    }

}
