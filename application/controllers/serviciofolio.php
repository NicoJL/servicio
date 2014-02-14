<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serviciofolio extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->load->model("ModelServicio");
		$this->load->library('pagination');
	}
	public function index()
	{
			
	}
	public function addFolio()
	{
		$vec=array();
		$vec['ban']=50;
		$data['idCli']=$this->input->post('idCli');
		$data['estado']=$this->input->post('estado');
		$data['fecha']=$this->input->post('fecha');
		//$data['idsuc']=$this->session->userdata['idsuc'];
		$ban=false;
		foreach ($data as $key => $value) 
		{
				if(!empty($value))
					$ban=true;
				else
				{
					$ban=false;
					break;
				}
		}
		if($ban)
		{
			$res=$this->ModelServicio->addServicio($data);
			
			$vec['ban']=$res;

			if($res==1)
			{
				$query=$this->ModelServicio->getFolio();
				if($query->num_rows()>0)
				{
					foreach ($query->result() as $row) 
					{
						$id=$row->folio;
					}
					$vec['folio']=$id;
					echo json_encode($vec);
				}
				else
				{
					$vec['ban']=100;
					echo json_encode($vec);
				}
			}
			else 
				echo json_encode($vec);
		}
		else 
			echo json_encode($vec);
	}
	/*************************Servicio*****************************************************/
	function addServicio()
	{
		$data['folio']=$this->input->post('sfolio');
		$data['idEq']=$this->input->post('sidEq');
		$data['tipo']=$this->input->post('tipo');
		$data['estado']=$this->input->post('estado');
		$data['tecnico']=$this->input->post('tecnico');
		$data['falla']=$this->input->post('falla');
		$data['cables']=$this->input->post('cables');
		$data['discos']=$this->input->post('discos');
		$data['accesorios']=$this->input->post('accesorios');
		$data['calcas']=$this->input->post('calcas');
		$data['golpes']=$this->input->post('golpes');
		$ban=false;
		foreach ($data as $key => $value) 
		{
				if(!empty($value))
					$ban=true;
				else
				{
					$ban=false;
					break;
				}
		}
		if($ban)
		{
			$query=$this->ModelServicio->addDetServicio($data);
			echo $query;
		}
		else
		{
			echo "Faltan Datos por Llenar";
		}
	}
	function sucursalmostrar()
	{

	}
	function mostrarServicios($offset=0)
	{
		$uri_segment=3;
		$offset=$this->uri->segment($uri_segment);	
		if(empty($offset))
			$offset=0;
		$config['base_url']=base_url().'servicioFolio/mostrarServicios';
		$config['total_rows']=$this->ModelServicio->numero(2);
		$config['per_page']=50;
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
		$data['query']=$this->ModelServicio->consultaGeneralServ(2,$offset,$config['per_page']);
		$data['query']->next_result();
		$data['title']="Servicio";
		$data['cont']=$this->uri->segment($uri_segment);
		$data['ruta']="salidaservicio.js";
		$this->load->view('templates/header',$data);
		$this->load->view('servicios/mostrarservicio');	
	}
	function cargarVariable()
	{
		$this->session->set_userdata('folio',$this->input->post('folio'));
		$this->mostrarSalida();
	}
	function mostrarSalida($offset=0)
	{
		if($this->session->userdata('uri'))
			$this->session->unset_userdata('uri');
		$uri_segment=3;
		$offset=$this->uri->segment($uri_segment);	
		if(empty($offset))
			$offset=0;
		$config['base_url']=base_url().'servicioFolio/mostrarSalida';
		$config['total_rows']=$this->ModelServicio->numRows($this->session->userdata('folio'));
		$config['per_page']=1;
		$connfig['num_links']=3;
		$config['first_link']="Primero";
		$config['last_link']="Ultimo";
		$config['next_link']=">>";
		$config['prev_link']="<<";
		$config['cur_tag_open']="<span class='badge'>";
		$config['cur_tag_close']="</span>";
		$config['uri_segment']=$uri_segment;
		$this->pagination->initialize($config);
		$data['paginacion']=$this->pagination->create_links();
		$data['query']=$this->ModelServicio->getSalida($this->session->userdata('folio'),$offset,$config['per_page']);
		$data['query']->next_result();
		$data['title']="Servicio";
		$data['cont']=$this->uri->segment($uri_segment);
		$data['ruta']="clientesgeneral.js";
		$this->load->view('templates/header',$data);
		$this->load->view('servicios/mostrarsalida');	
	}
}