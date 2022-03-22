<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservaCtr extends CI_Controller
{
    private function cargarPlantilla($pagina, $array)
    {
        $this->load->view('plantilla/cabecera.php');
        $this->load->view('plantilla/menu_administracion.php');
        $this->load->view($pagina, $array);
        $this->load->view('plantilla/pie_pagina.php');
    }

    public function cobrarVista($id)
    {
        
        if (!isset($id)) {
            $id = "";
        }

        if($id==="null")
        {
            $id="";
        }
        
        echo $id;
        $this->load->model('ReservaModel');
        $result = $this->ReservaModel->todosPedientesPago("%" . $id . "%");
        //$result = $this->ReservaModel->todosPedientesPago("%pepe%");
        $this->cargarPlantilla('admin/cobro.php', array("consulta" => $result, "mensaje" => ""));
    }

    public function registrarCobro($id)
    {
        $this->load->model('ReservaModel');

        $data = array(
            'estado' => 'C',
        );

        $this->ReservaModel->editarPersonalizado(
			$id,
            $data
		);

        redirect('reservaCtr/cobrarVista/null');

    }

    public function eliminarReserva($id = NULL)
    {
        if($id != NULL)
        {
            $this->load->model("ReservaModel");
            $this->ReservaModel->eliminar($id);
            redirect('reservaCtr/cobrarVista/null');

        }

    }

    public function reporteCobros()
    {
        $this->load->model('ReservaModel');
        $result = $this->ReservaModel->todos();
        $this->cargarPlantilla('admin/reporte.php', array("consulta" => $result, "mensaje" => ""));
    }
}
