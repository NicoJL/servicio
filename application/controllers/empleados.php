<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->form_validation->set_message('required', '%s es un campo requerido');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->load->model('Modelempleados');
		$this->load->library('pagination');
	}
	public function index()
	{

	}
	public function AddEmpleado()
	{
		
		$this->form_validation->set_rules('nombre','Nombre','required|trim');
		$this->form_validation->set_rules('domicilio','Domicilio','required|trim');
		$this->form_validation->set_rules('telefono','Telefono','required|trim');
		$this->form_validation->set_rules('celular','Celular','trim');
		$this->form_validation->set_rules('tipo','Tipo','required|trim');
		
		if($this->form_validation->run()===FALSE)
		{
			$this->VistaAdd('','');
		}
		else
		{
			$arr=array();
			$arr=$this->input->post();
			$query=$this->Modelempleados->AddEmpleado($arr);
			switch($query)
			{
				case 1:
					$this->VistaAdd('<div class="success">Empleado Agregado Exitosamente</di>','');
					break;
				case 2:
					$this->VistaAdd('','Ese empleado ya esta dado de alta');
					break;
				case 3:
					$this->VistaAdd('','No existe esa sucursal');
					break;
			}
			echo $query;
		}

	}
	function prueba()
	{
		$data['ruta']="prueba.js";
		$this->load->view('templates/header',$data);

		$this->load->view('empleados/prueba');
	}
	function VistaAdd($msn , $error){
		$arr['title']="Empleados";
		$arr['ruta']="default.js";
		$arr['message']=$msn;
		$arr['error']=$error;
		$this->load->view('templates/header',$arr);
		$this->load->view('empleados/agregarempleado');	
	}

	function MostrarE(){
		$data['query']=$this->Modelempleados->MostrarE();
		$data['title']="Empleados";
		$data['ruta']="empleados.js";
		$this->load->view('templates/header',$data);
		$this->load->view('empleados/mostrarempleados');	

	}

	function getEmpleadoAjax(){
		$id=$this->input->post('idemp');
		$query=$this->Modelempleados->Mostrarmodi($id);
		echo json_encode($query->result());
		

		
	}
	function modificarEmpleadoAjax(){
		$arr=array();
		$arr=$this->input->post();
		$query=$this->Modelempleados->ModificarE($arr);
		echo $query;
	}
	function eliminarEmpleados(){
		$idemp=$this->input->post('idemp');
		if(strlen($idemp)>0)
		{
			$this->Modelempleados->EliminarE($idemp);
			$this->MostrarE();
		}
		echo 'eliminado';
	}
}