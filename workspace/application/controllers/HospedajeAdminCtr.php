<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HospedajeAdminCtr extends CI_Controller 
{

    private function cargarPlantilla($pagina,$array)
	{
		$this->load->view('plantilla/cabecera.php');
		$this->load->view('plantilla/menu_administracion.php');
		$this->load->view($pagina,$array);
		$this->load->view('plantilla/pie_pagina.php');
	}

    public function hospedajeVista($id = NULL)
	{
		$this->load->model('HospedajeModel');
		//Consultar todos los datos de la vista
		$result = $this->HospedajeModel->todos();

		//Consultar el dato cargado en la vista en caso de que quiera editar
		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			//print("buscando $id");
			$dato=$this->HospedajeModel->buscarPorId($id);
			$modo="[EDITAR]";
			//var_dump($dato);
		}

		$this->cargarPlantilla('admin/hospedaje.php',array("consulta"=>$result,"dato"=>$dato,"mensaje"=>"","modo"=>$modo));		
	}

    public function gestionarHospedajeGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			print("grabar");
			//Si la variable id no existe entonces mando a GRABAR
			$this->hospedajeGrabar();
		}
		else
		{
			//Si id existe entonces mando a EDITAR
			print("editar");
			$this->hospedajeEditar();
		}
		
		redirect('hospedajeAdminCtr/hospedajeVista');
	}

    public function hospedajeGrabar()
	{
		$this->load->model('HospedajeModel');
		$this->HospedajeModel->crear(
			$this->input->post("nombre"),
			$this->input->post("capacidad"),
			$this->input->post("direccion")
		);

	}

    public function hospedajeEditar()
	{
		$this->load->model('HospedajeModel');
		$this->HospedajeModel->editar(
			$this->input->post("id"),
			$this->input->post("nombre"),
			$this->input->post("capacidad"),
			$this->input->post("direccion")
		);

	}

    public function hospedajeEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("HospedajeModel");
            $this->HospedajeModel->eliminar($id);
            redirect('hospedajeAdminCtr/hospedajeVista');

        }
	}


}