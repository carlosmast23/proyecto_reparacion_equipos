<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaqueteCtr extends CI_Controller 
{

    private function cargarPlantilla($pagina,$array)
	{
		$this->load->view('plantilla/cabecera.php');
		$this->load->view('plantilla/menu_administracion.php');
		$this->load->view($pagina,$array);
		$this->load->view('plantilla/pie_pagina.php');
	}

    public function paqueteVista($id = NULL)
	{
		$this->load->model('PaqueteModel');
		//Consultar todos los datos de la vista
		$result = $this->PaqueteModel->todos();

        $this->load->model('TransporteModel');
        $resultTransporteList = $this->TransporteModel->todos();

        $this->load->model('HospedajeModel');
        $resultHospedajeList = $this->HospedajeModel->todos();

		//Consultar el dato cargado en la vista en caso de que quiera editar
		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			//print("buscando $id");
			$dato=$this->PaqueteModel->buscarPorId($id);
			$modo="[EDITAR]";
			//var_dump($dato);
		}

		$this->cargarPlantilla('admin/paquete.php',array("consulta"=>$result,"dato"=>$dato,"mensaje"=>"","modo"=>$modo,"transportes"=> $resultTransporteList,"hospedajes"=>$resultHospedajeList));		
	}

    public function gestionarPaqueteGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			print("grabar");
			//Si la variable id no existe entonces mando a GRABAR
			$this->paqueteGrabar();
		}
		else
		{
			//Si id existe entonces mando a EDITAR
			print("editar");
			$this->paqueteEditar();
		}
		
		redirect('paqueteCtr/paqueteVista');
	}

    public function paqueteGrabar()
	{
		$this->load->model('PaqueteModel');
		$this->PaqueteModel->crear(
			$this->input->post("idTransporte"),
			$this->input->post("idHospedaje"),
			$this->input->post("nombre"),
			$this->input->post("descripcion"),
            $this->input->post("precio"),
            $this->input->post("estado")
			
		);

	}

    public function paqueteEditar()
	{
		$this->load->model('PaqueteModel');
		$this->PaqueteModel->editar(
			$this->input->post("id"),
			$this->input->post("idTransporte"),
			$this->input->post("idHospedaje"),
			$this->input->post("nombre"),
			$this->input->post("descripcion"),
            $this->input->post("precio"),
            $this->input->post("estado")
		);

	}

    public function paqueteEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("PaqueteModel");
            $this->PaqueteModel->eliminar($id);
            redirect('paqueteCtr/paqueteVista');

        }
	}


}