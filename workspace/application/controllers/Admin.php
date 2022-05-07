<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	//////////////////////// INICIO //////////////////////////
    public function index()
    {
        $this->cargarPlantilla('admin/index.php',array("mensaje"=>""));
    }
	/////////////////////// FIN INICIO ////////////////////////
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
			$this->input->post("apellidos"),
			$this->input->post("nombres"),
			$this->input->post("correo"),
			$this->input->post("cargo"),
			$this->input->post("tipo")
		);

	}
	public function usuarioEditar()
	{
		$this->load->model('UsuarioModel');
		$this->UsuarioModel->editar(
			$this->input->post("id"),
			$this->input->post("usuario"),
			$this->input->post("clave"),
			$this->input->post("apellidos"),
			$this->input->post("nombres"),
			$this->input->post("correo"),
			$this->input->post("cargo"),
			$this->input->post("tipo")
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
	//////////////////////// CATEGORIA //////////////////////////
	public function categoriaVista($id = NULL)
	{
		$this->load->model('CategoriaModel');
		$result = $this->CategoriaModel->todos();

		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			$dato=$this->CategoriaModel->buscarPorId($id);
			$modo="[EDITAR]";
		}

		$this->cargarPlantilla('admin/categoria.php',array("consulta"=>$result,"dato"=>$dato,"mensaje"=>"","modo"=>$modo));		
	}
	public function gestionarCategoriaGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			print("grabar");
			//Si la variable id no existe entonces mando a GRABAR
			$this->categoriaGrabar();
		}
		else
		{
			//Si id existe entonces mando a EDITAR
			print("editar");
			$this->categoriaEditar();
		}
		
		redirect('admin/categoriaVista');
	}
	public function categoriaGrabar()
	{
		$this->load->model('CategoriaModel');
		$this->CategoriaModel->crear(
			$this->input->post("nombre"),
			$this->input->post("descripcion")
		);

	}
	public function categoriaEditar()
	{
		$this->load->model('CategoriaModel');
		$this->CategoriaModel->editar(
			$this->input->post("id"),
			$this->input->post("nombre"),
			$this->input->post("descripcion")
		);

	}
	public function categoriaEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("CategoriaModel");
            $this->CategoriaModel->eliminar($id);
            redirect('admin/categoriaVista');

        }
	}

	//////////////////////// ESTABLECIMIENTO //////////////////////
	public function establecimientoVista($id = NULL)
	{
		$this->load->model('EstablecimientoModel');
		$result = $this->EstablecimientoModel->todos();

		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			$dato=$this->EstablecimientoModel->buscarPorId($id);
			$modo="[EDITAR]";
		}

		$this->cargarPlantilla('admin/establecimiento.php',array("consulta"=>$result,"dato"=>$dato,"mensaje"=>"","modo"=>$modo));		
	}
	public function gestionarEstablecimientoGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			$this->establecimientoGrabar();
		}
		else
		{
			$this->establecimientoEditar();
		}
		
		redirect('admin/establecimientoVista');
	}
	public function establecimientoGrabar()
	{
		$this->load->model('EstablecimientoModel');
		$this->EstablecimientoModel->crear(
			$this->input->post("nombre")
		);
	}
	public function establecimientoEditar()
	{
		$this->load->model('EstablecimientoModel');
		$this->EstablecimientoModel->editar(
			$this->input->post("id"),
			$this->input->post("nombre")
		);
	}
	public function establecimientoEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("EstablecimientoModel");
            $this->EstablecimientoModel->eliminar($id);
            redirect('admin/establecimientoVista');
        }
	}
	//////////////////////// FIN ESTABLECIMIENTO /////////////////

	//////////////////////// CATALOGO VISTA //////////////////////
	public function catalogoVista($id = NULL)
	{
		$this->load->model('CatalogoModel');
		$result = $this->CatalogoModel->todos();

		$this->load->model('CategoriaModel');
		$categorias = $this->CategoriaModel->todos();

		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			$this->load->model('CatalogoModel');
			$dato=$this->CatalogoModel->buscarPorId($id);
			$modo="[EDITAR]";
		}

		$this->cargarPlantilla('admin/catalogo.php',array("consulta"=>$result,"categorias"=>$categorias,"dato"=>$dato,"mensaje"=>"","modo"=>$modo));
	}
	public function gestionarCatalogoGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			$this->catalogoGrabar();
		}
		else
		{
			$this->catalogoEditar();
		}
		
		redirect('admin/catalogoVista');
	}
	public function catalogoGrabar()
	{
		$this->load->model('CatalogoModel');
		$this->CatalogoModel->crear(
			$this->input->post("codigo"),
			$this->input->post("descripcion"),
			$this->input->post("id_categoria")
		);
	}
	public function catalogoEditar()
	{
		$this->load->model('CatalogoModel');
		$this->CatalogoModel->editar(
			$this->input->post("id"),
			$this->input->post("codigo"),
			$this->input->post("descripcion"),
			$this->input->post("id_categoria")
		);
	}
	public function catalogoEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("CatalogoModel");
            $this->CatalogoModel->eliminar($id);
            redirect('admin/catalogoVista');
        }
	}
	//////////////////////// FIN CATALOGO /////////////////
	//////////////////////// PRODUCTO VISTA //////////////////////
	public function productoVista($id = NULL)
	{
		$this->load->model('ProductoModel');
		$result = $this->ProductoModel->todos();

		$this->load->model('EstablecimientoModel');
		$establecimientos = $this->EstablecimientoModel->todos();

		$this->load->model('CatalogoModel');
		$catalogos = $this->CatalogoModel->todos();

		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			$this->load->model('ProductoModel');
			$dato=$this->ProductoModel->buscarPorId($id);
			$modo="[EDITAR]";
		}

		$this->cargarPlantilla('admin/producto.php',array("consulta"=>$result,"establecimientos"=>$establecimientos, "catalogos"=>$catalogos, "dato"=>$dato,"mensaje"=>"","modo"=>$modo));
	}
	public function gestionarProductoGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			$this->productoGrabar();
		}
		else
		{
			$this->productoEditar();
		}
		
		redirect('admin/productoVista');
	}
	public function productoGrabar()
	{
		$this->load->model('ProductoModel');
		$this->ProductoModel->crear(
			$this->input->post("codigo_especifico"),
			$this->input->post("id_producto_generico"),
			$this->input->post("id_establecimiento")
		);
	}
	public function productoEditar()
	{
		$this->load->model('ProductoModel');
		$this->ProductoModel->editar(
			$this->input->post("id"),
			$this->input->post("codigo_especifico"),
			$this->input->post("id_producto_generico"),
			$this->input->post("id_establecimiento")
		);
	}
	public function productoEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("ProductoModel");
            $this->ProductoModel->eliminar($id);
            redirect('admin/productoVista');
        }
	}
	//////////////////////// FIN PRODUCTO /////////////////
	/////////////////////// REPARACIÓN ////////////////////
	public function reparacionVista($id = NULL)
	{
		$this->load->model('ReparacionModel');
		$result = $this->ReparacionModel->todos();

		$this->load->model('ProductoModel');
		$productos = $this->ProductoModel->todos();

		$dato=null;
		$modo="[NUEVO]";
		if(!is_null($id))
		{
			$dato=$this->ReparacionModel->buscarPorId($id);
			$modo="[EDITAR]";
		}

		$this->cargarPlantilla('admin/reparacion.php',array("consulta"=>$result,"productos"=>$productos,"dato"=>$dato,"mensaje"=>"","modo"=>$modo));		
	}
	public function gestionarReparacionGrabar()
	{
		$id=$this->input->post("id");
		if(empty($id))
		{
			$this->reparacionGrabar();
		}
		else
		{
			$this->reparacionEditar();
		}
		
		redirect('admin/reparacionVista');
	}
	public function reparacionGrabar()
	{
		$nombre_tecnico=$this->session->userdata('nombres_completos');

		$this->load->model('ReparacionModel');
		$this->ReparacionModel->crear(
			$this->input->post("fecha_ingreso"),
			$this->input->post("estado"),
			$this->input->post("observaciones"),
			$this->input->post("id_producto_especifico"),
			$nombre_tecnico
		);
	}
	public function reparacionEditar()
	{
		$this->load->model('ReparacionModel');
		$this->ReparacionModel->editar(
			$this->input->post("id"),
			$this->input->post("fecha_ingreso"),
			$this->input->post("estado"),
			$this->input->post("observaciones"),
			$this->input->post("id_producto_especifico"),
			$this->input->post("nombre_tecnico")
		);
	}
	public function reparacionEliminar($id = NULL)
	{
		if($id != NULL)
        {
            $this->load->model("ReparacionModel");
            $this->ReparacionModel->eliminar($id);
            redirect('admin/reparacionVista');
        }
	}
	///////////////////// FIN REPARACIÓN ////////////////////
	///////////////////// REPORTE ///////////////////////////
	public function reporteVista($estado = NULL)
	{
		$this->load->model('ReparacionModel');

		if(!is_null($estado) && $estado != 'A')
		{
			$reparaciones = $this->ReparacionModel->buscarPorEstado($estado);
		}else{
			$reparaciones = $this->ReparacionModel->todos();
		}

		$this->cargarPlantilla('admin/reporte.php',array("reparaciones"=>$reparaciones, "estado"=>$estado, "mensaje"=>""));		
	}
	public function gestionarReporte()
	{
		$estado=$this->input->post("estado");		
		printf('Gestionar: '.$estado);
		$this->reporteVista($estado);
		//redirect('admin/reporteVista');
	}
	/////////////////////// FIN REPORTE //////////////////////////
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

	//////////////////////// VISTAS //////////////////////////
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
	//////////////////////// FIN VISTAS //////////////////////////
}
