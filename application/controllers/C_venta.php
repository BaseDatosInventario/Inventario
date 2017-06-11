<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_venta
 *
 * @author rodrigo
 */
class C_venta extends CI_Controller {

    function head() {
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
    }

    function pre_venta() {
        $codigo = $this->input->post('codigo');
        $run_usuario = $this->session->userdata('run_usuario');
        date_default_timezone_set('America/Santiago'); // zona horaria a la de Chile
        $fecha = date('Y-m-d');
        $stock = $this->M_venta->comprobar_stock($codigo);
        $producto = $this->M_venta->buscar_producto($codigo);
        $cantidad = 0;
        $cant = $this->M_venta->cantidad_pre_venta($codigo, $run_usuario, $fecha);
        foreach ($cant->result() as $row) {

            $cantidad = $row->cantidad;
        }

        $stock_actual = 0;

        foreach ($stock->result() as $row) {

            $stock_actual = $row->stock_actual;
        }

        if ($producto != null && $stock_actual > ($cantidad + 1)) {
            $this->M_venta->registrar_pre_venta($producto, $run_usuario, $fecha);
            $this->mostrar_preventa();
        } else if ($producto != null && $stock_actual == ($cantidad + 1)) {
            $this->M_venta->registrar_pre_venta($producto, $run_usuario, $fecha);
            $this->mostrar_preventa();
            echo "<h1 class='text-success'>Se vendera la totalidad del producto</h1>";
        } else if ($producto != null && $stock_actual < ($cantidad + 1)) {
            $this->mostrar_preventa();
            echo '<h2 class="text-danger">La cantidad ' . $cantidad . ' es igual al stock actual ' . $stock_actual . ' del producto</h2>';
        } else if ($producto == null) {
            $this->mostrar_preventa();
            echo "<h1>no encontrado</h1>";
        }
    }

    function mostrar_preventa() {
        $total_venta = 0;
        $run_usuario = $this->session->userdata('run_usuario');
        date_default_timezone_set('America/Santiago'); // zona horaria a la de Chile
        $fecha = date('Y-m-d');
        $dato = $this->M_venta->buscar_pre_venta($run_usuario, $fecha);
        foreach ($dato->result() as $row) {
            $total_venta = $total_venta + ($row->cantidad * $row->valor_venta);
            echo '<tr><td>' . sprintf("%06d", $row->codigo_barra) . '</td><td>' . $row->p_nombre . '</td><td>' . $row->detalle . '</td><td> $' . number_format($row->valor_venta, 0, ',', '.') . '</td><td>' . $row->cantidad . '</td><td> $' . number_format(($row->cantidad * $row->valor_venta), 0, ',', '.') . '</td><td><form method="post" action="' . base_url('index.php/C_venta/eliminar_producto') . '"><input type="hidden" name="id_producto" value="' . $row->id_producto . '"> <input type="submit" class="btn btn-danger" value="Eliminar"/></form></td></tr>';
        }
        echo '<tr><td><button class="btn btn-success" type="submit">Hacer Venta</button></td>';
        echo '<td></td><td></td><td></td><td><h1 class="text-primary"> Total </h1></td><td><h1 class="text-primary">$' . number_format($total_venta, 0, ",", ".") . '</h1><input type="hidden" name="total_venta" value="' . $total_venta . '"></td><td><button class="btn btn-danger" onclick="cancelar_venta()">Cancelar Venta</button></td></tr>';
    }

    function pre_venta_view() {
        $run_usuario = $this->session->userdata('run_usuario');
        date_default_timezone_set('America/Santiago'); // zona horaria a la de Chile
        $fecha = date('Y-m-d');
        $dato = $this->M_venta->buscar_pre_venta($run_usuario, $fecha);
        return $dato;
    }

    function eliminar_producto() {
        $run_usuario = $this->session->userdata('run_usuario');
        date_default_timezone_set('America/Santiago'); // zona horaria a la de Chile
        $fecha = date('Y-m-d');
        $id_producto = $this->input->post('id_producto');

        if ($this->M_venta->eliminar_producto($id_producto, $run_usuario, $fecha)) {
            redirect('c_redireccionar/venta');
        } else {

            redirect('c_redireccionar/venta');
        }
    }

    function cancelar_venta() {



        $run_usuario = $this->session->userdata('run_usuario');

        if ($this->M_venta->cancelar_venta($run_usuario)) {
            echo '<h1 class="text-danger"> La venta NO ha sido cancelada</h1>';
        } else {
            echo '<h1 class="text-success"> La venta ha sido cancelada</h1>';
        }
    }

}
