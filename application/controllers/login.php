<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->load->model("ModelCli");
		$this->load->model("ModelEquipo");
		$this->load->library('pagination');
	}
	public function index()
	{
		
		$this->load->view("login/login");	
	}
	public function Login()
	{
		
	}
}