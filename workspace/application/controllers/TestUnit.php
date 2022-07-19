<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestUnit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("unit_test");
    }

    public function index(){
        
        echo "UNIT TEST";
        
        $test = $this->ObtenerTodosLosUsuarios();
        $expected_result = 'is_array';
        $test_name = "Todos los usuarios test function";
        echo $this->unit->run($test, $expected_result, $test_name);
        
        $test = $this->ObtenerUsuariosPorId(4);
        $expected_result = 'is_array';
        $test_name = "Usuario por id function";
        echo $this->unit->run($test, $expected_result, $test_name);
        
        $test = $this->ObtenerTodasLasCategorias();
        $expected_result = 'is_array';
        $test_name = "Todas las categorias function";
        echo $this->unit->run($test, $expected_result, $test_name);

        $test = $this->ObtenerCategoriasPorId(1);
        $expected_result = 'is_array';
        $test_name = "Categoria por id function";
        echo $this->unit->run($test, $expected_result, $test_name);

        $test = $this->ObtenerTodosLosEstablecimientos();
        $expected_result = 'is_array';
        $test_name = "Todos los establecimientos function";
        echo $this->unit->run($test, $expected_result, $test_name);

        echo "INTEGRATION TEST";

        $test = $this->ObtenerTodosLosUsuariosInt("admin", "1234");
        $expected_result = 'is_array';
        $test_name = "Todos los usuarios, con un usuario autorizado test function";
        echo $this->unit->run($test, $expected_result, $test_name);

        $test = $this->ObtenerUsuariosPorIdInt(4, "admin", "1234");
        $expected_result = 'is_array';
        $test_name = "Usuario por id, con usuario autorizado function";
        echo $this->unit->run($test, $expected_result, $test_name);
        
        $test = $this->ObtenerTodasLasCategoriasInt("admin", "1234");
        $expected_result = 'is_array';
        $test_name = "Todas las categorias, con usuario autorizado function";
        echo $this->unit->run($test, $expected_result, $test_name);

        $test = $this->ObtenerCategoriasPorIdInt(1, "admin", "1234");
        $expected_result = 'is_array';
        $test_name = "Categoria por id, con usuario autorizado function";
        echo $this->unit->run($test, $expected_result, $test_name);

        $test = $this->ObtenerTodosLosEstablecimientosInt("admin", "1234");
        $expected_result = 'is_array';
        $test_name = "Todos los establecimientos, con usuario autorizado function";
        echo $this->unit->run($test, $expected_result, $test_name);

    }

    //UNIT TEST
    public function ObtenerTodosLosUsuarios(){
        $this->load->model('UsuarioModel');
		$result = $this->UsuarioModel->todos();
        return array("datos"=>$result);      
    }

    public function ObtenerUsuariosPorId($id){
        $this->load->model('UsuarioModel');
        $result = $this->UsuarioModel->buscarPorId($id);
        return $result;      
    }

    public function ObtenerTodasLasCategorias(){
        $this->load->model('CategoriaModel');
		$result = $this->CategoriaModel->todos();
        return array("datos"=>$result);
    }

    public function ObtenerCategoriasPorId($id){
        $this->load->model('CategoriaModel');
        $result = $this->CategoriaModel->buscarPorId($id);
        return $result;      
    }

    public function ObtenerTodosLosEstablecimientos(){
        $this->load->model('EstablecimientoModel');
        $result = $this->EstablecimientoModel->todos();
        return array("datos"=>$result);
    }
    
    //INTEGRATION TEST
    public function ObtenerTodosLosUsuariosInt($usuario,$clave){
		$this->load->model('ValidacionModel');
		$validacionLogin = $this->ValidacionModel->validar($usuario,$clave);
		if ($validacionLogin)
        {
			$this->load->model('UsuarioModel');
		    $result = $this->UsuarioModel->todos();
            return array("datos"=>$result);								
		}
    }

    public function ObtenerUsuariosPorIdInt($id,$usuario,$clave){
        $this->load->model('ValidacionModel');
		$validacionLogin = $this->ValidacionModel->validar($usuario,$clave);
		if ($validacionLogin)
        {
            $this->load->model('UsuarioModel');
            $result = $this->UsuarioModel->buscarPorId($id);
            return $result;    
        }   
    }

    public function ObtenerTodasLasCategoriasInt($usuario,$clave){
        $this->load->model('ValidacionModel');
		$validacionLogin = $this->ValidacionModel->validar($usuario,$clave);
		if ($validacionLogin)
        {
            $this->load->model('CategoriaModel');
            $result = $this->CategoriaModel->todos();
            return array("datos"=>$result);    
        }
    }

    public function ObtenerCategoriasPorIdInt($id,$usuario,$clave){
        $this->load->model('ValidacionModel');
		$validacionLogin = $this->ValidacionModel->validar($usuario,$clave);
		if ($validacionLogin)
        {
            $this->load->model('CategoriaModel');
            $result = $this->CategoriaModel->buscarPorId($id);
            return $result;  
        }    
    }

    public function ObtenerTodosLosEstablecimientosInt($usuario, $clave){
        $this->load->model('ValidacionModel');
		$validacionLogin = $this->ValidacionModel->validar($usuario,$clave);
		if ($validacionLogin)
        {
            $this->load->model('EstablecimientoModel');
            $result = $this->EstablecimientoModel->todos();
            return array("datos"=>$result);    
        }        
    }

}
