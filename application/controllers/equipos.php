<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipos extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->load->model("ModelEquipo");
		$this->load->library('pagination');
	}
	public function index()
	{
			
	}
	public function addEquipo()
	{
		$data['idCli']=$this->input->post('idCli');
		$data['nomEquipo']=$this->input->post('nomEquipo');
		$data['marca']=$this->input->post('marca');
		$data['modelo']=$this->input->post('modelo');
		$data['numSerie']=$this->input->post('numSerie');
		$data['descripcion']=$this->input->post('descripcion');
		$data['color']=$this->input->post('color');
		$ban=$this->ModelEquipo->addEquipo($data);
		$arr=array();
		$arr['ban']=$ban;
		if($ban==1)
		{
			$query=$this->ModelEquipo->getIdEq($data);
			if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) {
					$id=$row->idEq;
				}
				$arr['idEq']=$id;
				echo json_encode($arr);
			}
			else
			{
				$arr['ban']=100;
				echo json_encode($arr);
			}
		}
		else
			echo json_encode($arr);
	}
}