<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->load->model("ModelCli");
		$this->load->library('pagination');
	}
	public function index()
	{
			
	}
	public function addCliente()
	{
		$this->form_validation->set_rules('nombre','Nombre','required|trim');
		$this->form_validation->set_rules('correo','Correo','trim');
		$this->form_validation->set_rules('telefono','Telefono','required|trim');
		$this->form_validation->set_rules('celular','Celular','trim');
		$this->form_validation->set_rules('fecha','Fecha','required|trim');
		$this->form_validation->set_rules('direccion','direccion','required|trim');
		$this->form_validation->set_rules('estado','Estado','required|trim');
		if($this->form_validation->run()===FALSE)
		{
			$this->formAgregar('','');
		}
		else
		{
			$data['nombre']=$this->input->post('nombre');
			$data['correo']=$this->input->post('correo');
			$data['telefono']=$this->input->post('telefono');
			$data['celular']=$this->input->post('celular');
			$data['fecha']=$this->input->post('fecha');
			$data['direccion']=$this->input->post('direccion');
			$data['estado']=$this->input->post('estado');
			$ban=$this->ModelCli->addCli($data);
			if($ban==1 || $ban==2)
			{
				//$this->formAgregar('','Cliente Agregado');
				$query=$this->ModelCli->getIdCli($data);
				if($query->num_rows()>0)
				{
					foreach ($query->result() as $row) 
					{
						$arr['idcli']=$row->idCli;
						$arr['nombre']=$row->nombre;
						$arr['ruta']="servicio.js";
					}
					$this->load->view('templates/header',$arr);
					$this->load->view('servicios/addservicio');
				}
				else
				{
						$this->formAgregar('','');
				}

			}
			else
			{
				$this->formAgregar('Ese cliente ya Existe','');
			}
		}
	}
	function formAgregar($error,$mns)
	{
			$data['tittle']="Clientes";
			$data['ruta']="cli.js";
			$data['error']=$error;
			$data['message']=$mns;
			$this->load->view('templates/header',$data);
			$this->load->view('clientes/agregarcliente');
	}
	function mostrar($offset=0)
	{
	
		$uri_segment=3;
			$offset=$this->uri->segment($uri_segment);	
			if(empty($offset))
				$offset=0;
			else
				if($offset=="eliminarCli")
					$offset=0;
		$config['base_url']=base_url().'clientes/mostrar';
		$config['total_rows']=$this->ModelCli->numRows();
		$config['per_page']=3;
		$connfig['num_links']=5;
		$config['first_link']="Primero";
		$config['last_link']="Ultimo";
		$config['next_link']=">>";
		$config['prev_link']="<<";
		$config['cur_tag_open']="<span class='badge'>";
		$config['cur_tag_close']="</span>";
		$config['uri_segment']=$uri_segment;
		$this->pagination->initialize($config);
		$data['paginacion']=$this->pagination->create_links();
		$data['query']=$this->ModelCli->consultaGeneralCli($offset,$config['per_page']);
		$data['title']="Clientes";
		$data['cont']=$this->uri->segment($uri_segment);
		$data['ruta']="clientesgeneral.js";
		$this->load->view('templates/header',$data);
		$this->load->view('clientes/mostrarcliente');	
	
	}
	function rellenarAjaxCli()
	{
		$id=$this->input->post('idCli');
		$query=$this->ModelCli->getCli($id);
		echo json_encode($query->result());
	}
	function modiCliAjax()
	{
		$data['nombre']=$this->input->post('nombre');
		$data['correo']=$this->input->post('correo');
		$data['telefono']=$this->input->post('telefono');
		$data['celular']=$this->input->post('celular');
		$data['fecha']=$this->input->post('fecha');
		$data['direccion']=$this->input->post('direccion');
		$data['estado']=$this->input->post('estado');
		$data['idCli']=$this->input->post('idCli');
		$ban=false;
		/*foreach ($data as $key => $value) 
		{
				if(!empty($value))
					$ban=true;
				else
				{
					$ban=false;
					break;
				}
		}
		if($ban)*/
	//	{
			$query=$this->ModelCli->modiCli($data);
			echo $query;
	//	}
	//	else
	//	{
	//		echo 'error';
	//	}
	}
	function eliminarCli()
	{
		$id=$this->input->post('idCli');
		$this->ModelCli->eliminarCli($id);

		$this->mostrar();
	}
	function addF()
	{
		$arr['idcli']=$this->input->post('idCli');
		$arr['nombre']=$this->input->post('nombre');
		$arr['ruta']="servicio.js";
		$this->load->view('templates/header',$arr);
		$this->load->view('servicios/addservicio');
	}

}