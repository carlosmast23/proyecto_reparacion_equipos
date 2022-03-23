<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	//Vista que se encarga de cargar los datos de la vista principal
    public function index()
    {
		//$this->load->model('PaqueteModel');
		//$resultPaquetes = $this->PaqueteModel->todosActivos();

        $this->cargarPlantilla('admin/index.php',array("mensaje"=>""));
    }


	//////////////////////// USUARIO //////////////////////////
	public function usuarioVista($id = NULL)
	{
		$this->load->model('UsuarioModel');
		//Consultar todos los transportes de la vista
		$result = $this->UsuarioModel->todos();

		//Consultar el dato cargado en la vista en caso de que quiera editar
		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			//print("buscando $id");
			$dato=$this->UsuarioModel->buscarPorId($id);
			$modo="[EDITAR]";
			//var_dump($dato);
		}

		$this->cargarPlantilla('admin/usuario.php',array("consulta"=>$result,"dato"=>$dato,"mensaje"=>"","modo"=>$modo));		
	}

	public function gestionarUsuarioGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			print("grabar");
			//Si la variable id no existe entonces mando a GRABAR
			$this->usuarioGrabar();
		}
		else
		{
			//Si id existe entonces mando a EDITAR
			print("editar");
			$this->usuarioEditar();
		}
		
		redirect('admin/usuarioVista');
	}

	public function usuarioGrabar()
	{
		$this->load->model('UsuarioModel');
		$this->UsuarioModel->crear(
			$this->input->post("usuario"),
			$this->input->post("clave"),
			$this->input->post("nombres"),
			$this->input->post("correo")
		);

	}

	public function usuarioEditar()
	{
		$this->load->model('UsuarioModel');
		$this->UsuarioModel->editar(
			$this->input->post("id"),
			$this->input->post("usuario"),
			$this->input->post("clave"),
			$this->input->post("nombres"),
			$this->input->post("correo")
		);

	}

	public function usuarioEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("UsuarioModel");
            $this->UsuarioModel->eliminar($id);
            redirect('admin/usuarioVista');

        }
	}

	//////////////////////// TRANSPORTE //////////////////////////

	public function transporteVista($id = NULL)
	{
		$this->load->model('TransporteModel');
		//Consultar todos los transportes de la vista
		$result = $this->TransporteModel->todos();

		//Consultar el dato cargado en la vista en caso de que quiera editar
		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			//print("buscando $id");
			$dato=$this->TransporteModel->buscarPorId($id);
			$modo="[EDITAR]";
			//var_dump($dato);
		}

		$this->cargarPlantilla('admin/transporte.php',array("consulta"=>$result,"dato"=>$dato,"mensaje"=>"","modo"=>$modo));		
	}

	public function gestionarTranporteGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			print("grabar");
			//Si la variable id no existe entonces mando a GRABAR
			$this->transporteGrabar();
		}
		else
		{
			//Si id existe entonces mando a EDITAR
			print("editar");
			$this->transporteEditar();
		}
		
		redirect('admin/transporteVista');
	}

	public function transporteGrabar()
	{
		$this->load->model('TransporteModel');
		$this->TransporteModel->crear(
			$this->input->post("placa"),
			$this->input->post("capacidad"),
			$this->input->post("nombreChofer"),
			$this->input->post("descripcion")
		);

		//redirect('admin/transporteVista');

	}

	public function transporteEditar()
	{
		$this->load->model('TransporteModel');
		$this->TransporteModel->editar(
			$this->input->post("id"),
			$this->input->post("placa"),
			$this->input->post("capacidad"),
			$this->input->post("nombreChofer"),
			$this->input->post("descripcion")
		);

		//redirect('admin/transporteVista');

	}

	public function transporteEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("TransporteModel");
            $this->TransporteModel->eliminar($id);
            redirect('admin/transporteVista');

        }
	}

	//////////////////////// FIN TRANSPORTE //////////////////////////

	public function hospedajeVista()
	{
		$this->cargarPlantilla('admin/hospedaje.php',array("mensaje"=>""));		
	}

	public function turistaVista()
	{
		$this->cargarPlantilla('admin/turista.php',array("mensaje"=>""));		
	}

	public function cobroVista()
	{
		$this->cargarPlantilla('admin/cobro.php',array("mensaje"=>""));		
	}
    
    private function cargarPlantilla($pagina,$array)
	{
		$this->load->view('plantilla/cabecera.php');
		$this->load->view('plantilla/menu_administracion.php');
		$this->load->view($pagina,$array);
		$this->load->view('plantilla/pie_pagina.php');
	}
}
