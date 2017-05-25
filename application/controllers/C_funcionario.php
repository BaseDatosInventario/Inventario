<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_funcionario
 *
 * @author rodrigo
 */
class C_funcionario extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function mostrar_funcionarios() {
        $run = $this->input->post('run');

        echo "lol" . $run;

        $dato = $this->M_funcionario->buscar_funcionario($run);

        if ($dato != null) {

            foreach ($dato->result() as $row) {
                echo $row->p_nombre;
            }
        }
    }

    function head() {
        $this->load->view("layout/cabecera");
        $this->load->view("layout/menu_lateral");
        $this->load->view("layout/side_bar");
    }

    function registrar_funcionario() {

        $run = $this->input->post('run');
        $p_nombre = $this->input->post('p_nombre');
        $p_apellido = $this->input->post('p_apellido');
        $s_apellido = $this->input->post('s_apellido');
        $telefono = $this->input->post('telefono');
        $direccion = $this->input->post('direccion');
        $email = $this->input->post('email');
        $buscar_run = $this->M_funcionario->comprobar_run($run);
        $buscar_email = $this->M_funcionario->comprobar_email($email);

        if ($buscar_email === null && $buscar_run === null) {
            if ($this->M_funcionario->registrar_funcionario($run, $p_nombre, $p_apellido, $s_apellido, $telefono, $direccion, $email)) {
                $mensaje = "EL funcionario se registro";
            }
        } else {
            if ($buscar_email != null) {
                $mensaje = "El email " . $email . " ya se encuentra registrado";
            } else if ($buscar_run != null) {
                $mensaje = "El Run " . $run . " ya se encuentra registrado";
            }
        }
        $this->head();
        $this->load->view('GestionUsuario/Registro_usuario_view', compact('mensaje'));
        $this->load->view("layout/footer");
    }

    function crear_cuenta_funcionario() {
        $run = $this->input->post('run');
        $id_tipo_usuario = $this->input->post('id_tipo_usuario');
        $clave = $this->input->post('clave');
        $estado = $this->input->post('estado');
        $dato = $this->M_funcionario->crear_cuenta_funcionario($run, $id_tipo_usuario, $clave, $estado);

        if ($dato != null && $dato!=="cuenta existente") {
            $mensaje = "El usuario Fue creado exitosamente";
        } elseif ($dato === null) {
            $mensaje = "El Funcionario no se encuentra en la base de datos";
        }elseif ($dato==="cuenta existente") {
            $mensaje = "La cuanta ya se creo";
        }

        $tipo_usuario = $this->M_usuario->tipo_usuario();
        $this->head();
        $this->load->view('GestionUsuario/crear_cuenta_view', compact('tipo_usuario','mensaje'));
        $this->load->view("layout/footer");
    }

}
