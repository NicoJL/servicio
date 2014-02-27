<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->form_validation->set_message('required', '%s es un campo requerido');
		$this->load->model("ModelLogin");
		$this->load->library('pagination');
		$this->load->library('encrypt');
	}
	public function index()
	{
		$this->load->view("login/login");	
	}
	public function Login()
	{
		$arr=array();
		$arr=$this->input->post();
		$query=$this->ModelLogin->Ingreso($arr);
		if ($query == '1'){
			$sesion_data=array(
					'nombre'=>$arr['txtUser'],
					'sucursal'=>$arr['txtPass']					 
					);
			$this->session->set_userdata($sesion_data);
		}

		echo $query;
		
	}
	public function Redirect( )
	{
		

		
	}
}