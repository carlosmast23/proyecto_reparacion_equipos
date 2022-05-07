<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('PaqueteModel');

		$this->cargarPlantilla('index.php', array("mensaje" => ""));
		//$this->load->view('welcome_message');
	}

	public function reserva($id = NULL)
	{
		$this->load->model('PaqueteModel');
		$paquete = null;
		if (!is_null($id)) {
			$paquete = $this->PaqueteModel->buscarPorId($id);
		}

		$dato = null;
		$this->cargarPlantilla('reserva.php', array("mensaje" => "", "dato" => $dato, "paquete" => $paquete));
		//$this->load->view('welcome_message');
	}

	public function reserva_imprimir($id = NULL)
	{
		$this->load->model('ReservaModel');
		$reserva = null;
		if (!is_null($id)) {
			$reserva = $this->ReservaModel->buscarPorId($id);
		}

		$dato = null;
		$this->cargarPlantilla('reserva_impresion.php', array("mensaje" => "", "dato" => $dato, "reserva" => $reserva));
		//$this->load->view('welcome_message');
	}


	public function reservaGrabar()
	{
		$this->load->model('ReservaModel');
		$this->ReservaModel->crear(
			$this->input->post("idPaqueteTurista"),
			$this->input->post("nombre"),
			$this->input->post("telefono"),
			$this->input->post("email"),
			'P'
		);
		$idGrabado=$this->ReservaModel->crearGetId();
		redirect('welcome/reserva_imprimir/'.$idGrabado);
	}

	public function loginVista()
	{
		$this->cargarPlantilla('login.php', array("mensaje" => ""));
	}

	public function loginVerificar()
	{
		$usuario = $this->input->post('usuario');
		$clave = $this->input->post('clave');

		$this->load->model('ValidacionModel');
		//Consultar todos los transportes de la vista
		$validacionLogin = $this->ValidacionModel->validar($usuario, $clave);

		var_dump($validacionLogin);

		//if($usuario=='admin' && $clave=='admin')
		if ($validacionLogin) {

			$this->load->model('UsuarioModel');
			$usuarioTmp=$this->UsuarioModel->buscarPorUsuario($usuario);
			
			$this->session->set_userdata('tipo_usuario', $usuarioTmp['tipo']);
			$this->session->set_userdata('nombres_completos', $usuarioTmp['nombres'].' '.$usuarioTmp['apellidos']);
			redirect('admin/index');
		} else {
			$this->cargarPlantilla('login.php', array("mensaje" => "Error al ingresar las credenciales"));
		}

		//$this->cargarPlantilla('index.php',null);
	}

	public function cargarPlantilla($pagina, $array)
	{
		$this->load->view('plantilla/cabecera.php');
		$this->load->view('plantilla/menu.php');
		$this->load->view($pagina, $array);
		$this->load->view('plantilla/pie_pagina.php');
	}
}
