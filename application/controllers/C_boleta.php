<?php

class C_boleta extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function boleta() {
        $num_venta = $this->input->post('num_venta');
        $cantidad = $this->input->post('cantidad');
        $total_producto = $this->input->post('total');
        $nombre = $this->input->post('nombre');
        $id_producto = $this->input->post('id_producto');
        $valor=$this->input->post('precio');
        $total_venta=$this->input->post('total_venta');

//        $html=$this->load->view('GestionVenta/');
        $tamano=30*count($id_producto);
       
        $pdf = new FPDF('P', 'mm', array($tamano,80 ));
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->cell(10);
        $pdf->Cell(0, 0, utf8_decode('Boleta Nº ' . sprintf("%06d",$num_venta) . ''), 0, 'L');
        $pdf->Ln(1);
        $pdf->SetFont('Arial', '', 8);
        for ($index = 0; $index < count($id_producto) ; $index++) {


            $pdf->Cell(5,10, utf8_decode( ($index+1) . '-  '), 0, 'L');
            $pdf->Cell(5, 10, utf8_decode( $nombre[$index] . ''), 0, 'L');
            $pdf->Cell(10);
            $pdf->Cell(15, 10, utf8_decode( $cantidad[$index] . ' x $ '.number_format($valor[$index], 0, ',', '.')), 0, 'L');
            $pdf->Cell(2);
            $pdf->Cell(10, 10, utf8_decode(' $'.number_format($total_producto[$index], 0, ',', '.') ), 0, 'L');
            $pdf->Ln(5);
        }
        $pdf->Cell(27);
         $pdf->Cell(5, 10, utf8_decode('TOTAL $'.number_format($total_venta, 0, ',', '.') ), 0, 'L');
        $pdf->Output();
    }

}
