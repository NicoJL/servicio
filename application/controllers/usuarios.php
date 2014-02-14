<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->form_validation->set_message('required', '%s es un campo requerido');
		//$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->load->model('Modelusuarios');
		$this->load->library('pagination');
		$this->load->library('encrypt');
	}
	public function index()
	{
		
	}
	function AddUser(){
		$this->form_validation->set_rules('txtnombre','Nombre','required|trim');
		$this->form_validation->set_rules('txtap','Apellido Paterno','required|trim');
		$this->form_validation->set_rules('txtam','Apellido Materno','required|trim');
		$this->form_validation->set_rules('txtname','Usuario','required|trim');
		$this->form_validation->set_rules('txtpass','Contraseña','required|trim');
		$this->form_validation->set_rules('txtemail','E-mail','required|trim');
		// validacion de campos vacios
		
		if($this->form_validation->run()===FALSE)
		{
			$this->VistaAdd('','');

		}
		else
		{
			$arr=array();
			$arr=$this->input->post();
			$query=$this->Modelusuarios->AddUsusario($arr);
			echo $query;

		}
		
	}
	function VistaAdd(){
		$data['title']="Usuarios";
		$data['ruta']="usuarios.js";
		$data['error']="";
		$data['message']="";
		$this->load->view('templates/header',$data);
		$this->load->view("usuarios/agregaruser");
	}

	function ValidaUser($val){
		$nombre=$_POST['nombre'];
		if($val==1) //valida nickname no existente
		{
			
			$query=$this->Modelusuarios->ValidaUser($nombre,$val);
			echo $query;
		}
		// valida emial no existente
		else if($val==2)
		{
			
			$query=$this->Modelusuarios->ValidaUser($nombre,$val);
			echo $query;
		}

	}
	// validamos cuando estamos modificando
	function ValidaUserModi($val){
		$nombre=$_POST['nombre'];
		if($val==1) //valida nickname no existente
		{
			
			$query=$this->Modelusuarios->ValidarUserModi($nombre,$val);
			echo $query;
		}
		// valida emial no existente
		else if($val==2)
		{
			
			$query=$this->Modelusuarios->ValidaUser($nombre,$val);
			echo $query;
		}

	}
	function mostrarUsers(){
		$data['query']=$this->Modelusuarios->mostrarU();
		$data['title']="Usuarios";
		$data['ruta']="usuarios.js";
		$this->load->view('templates/header',$data);
		$this->load->view('usuarios/mostrarUsers');	
	}

	function eliminarUsers(){
		$idU=$this->input->post('idU');
		$query=$this->Modelusuarios->eliminarUser($idU);
		echo $query;
	}
}