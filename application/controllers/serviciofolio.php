<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serviciofolio extends CI_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->form_validation->set_message('required', '%s es un campo requerido');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
		$this->load->model("ModelServicio");
		$this->load->library('pagination');
	}
	public function index()
	{
			
	}
	function folioPDF()
	{
		$fol=$this->uri->segment(3);
		$query=$this->ModelServicio->ticket($fol);
		foreach ($query->result() as $row) {
			$folio=$row->folio;
			$fecha=$row->fecha;
			$edo=$row->estadogeneral;
			$nombre=$row->nombre;
			$nomEquipo=$row->nomEquipo;
			$numSerie=$row->numSerie;
			$tipo=$row->tipo;
			$falla=$row->falla;
		}
		require('fpdf/fpdf.php');
		$pdf=new FPDF('P','mm',array(75,120));
		$pdf->AddPage();
		$pdf->Image('img/logoisco.PNG',50,5,20,10);
		$pdf->SetFont('Arial','BU',11);
		$pdf->Ln(10);
		$pdf->Cell(0,1,'Datos del Folio',0,0,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',9);
		//---------------Datos folio----------------------
		$pdf->Cell(12,5,'N.Folio:',0,0,'L');
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(43,5,$folio,0,1,'L');
		//----
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(12,5,'Fecha:',0,0,'L');
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(43,5,$fecha,0,0,'L');
		
		//--------Datos del equipo-----
		$pdf->Ln(10);
		$pdf->SetFont('Arial','BU',11);
		$pdf->Cell(0,1,'Equipo',0,0,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',9);
		$pdf->cell(13,5,'Nombre:',0,0);
		$pdf->SetFont('Arial','B',9);
		$pdf->cell(42,5,$nomEquipo,0,1);
		//
		$pdf->SetFont('Arial','',9);
		$pdf->cell(13,5,'N.Serie:',0,0);
		$pdf->SetFont('Arial','B',9);
		$pdf->cell(42,5,$numSerie,0,0);
		//---Datos del servicio-------
		$pdf->Ln(10);
		$pdf->SetFont('Arial','BU',11);
		$pdf->Cell(0,1,'Servicio',0,0,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',9);
		$pdf->cell(9,5,'Tipo:',0,0);
		$pdf->SetFont('Arial','B',9);
		$pdf->cell(46,5,$tipo,0,0);
		//----------datos Cliente
		$pdf->Ln(10);
		$pdf->SetFont('Arial','BU',11);
		$pdf->Cell(0,1,'Cliente',0,0,'L');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(0,5,$nombre,0,0);
		$pdf->output();
		return $pdf;
	}

	public function addFolio()
	{
		$vec=array();
		$vec['ban']="50";
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
					$vec['ban']="100";
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
		//$data['estado']=$this->input->post('estado');
		//$data['tecnico']=$this->input->post('tecnico');
		$data['falla']=$this->input->post('falla');
		$data['cables']=$this->input->post('cables');
		$data['discos']=$this->input->post('discos');
		$data['accesorios']=$this->input->post('accesorios');
		$data['calcas']=$this->input->post('calcas');
		$data['golpes']=$this->input->post('golpes');
		$ban=true;
		foreach ($data as $key => $value) 
		{
				if(empty($value))
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
			echo "6";
		}
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
		$this->session->set_userdata('pag',$this->input->post('pag'));
		$this->mostrarSalida();
	}
	function mostrarSalida($offset=0)
	{
		/*if($this->session->userdata('uri'))
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
		$data['paginacion']=$this->pagination->create_links();*/
		$data['query']=$this->ModelServicio->getSalida($this->session->userdata('folio'));
		$data['query']->next_result();
		$data['title']="Servicio";
		//$data['cont']=$this->uri->segment($uri_segment);
		$data['ruta']="salida.js";
		$this->load->view('templates/header',$data);
		$this->load->view('servicios/mostrarsalida');	
	}
	function salida()
	{
		$this->form_validation->set_rules('tecnico','Tecnico','required|trim');
		$this->form_validation->set_rules('estado','Estado','required|trim');
		$this->form_validation->set_rules('idServ','Id Servicio','required|trim');
		$this->form_validation->set_rules('total','Total','required|trim');
		if($this->form_validation->run()===FALSE)
		{
			$this->mostrarSalida();
		}
		else
		{
			$data['tecnico']=$this->input->post('tecnico');
			$data['estado']=$this->input->post('estado');
			$data['total']=$this->input->post('total');
			$data['folio']=$this->session->userdata('folio');
			$data['idServ']=$this->input->post('idServ');
			$pag=$this->session->userdata('pag');
			$ban=$this->ModelServicio->salida($data);
			switch($ban)
			{
				case 1:
					$this->session->unset_userdata('folio');
					$this->session->unset_userdata('pag');
					redirect("serviciofolio/mostrarServicios/".$pag);
					break;
				case 2:
					$this->mostrarSalida();
					break;
				case 3:
					$this->mostrarSalida();
					break;
				default:
					$this->mostrarSalida();
			}

		}
	}
	function getServicioAjax()
	{
		$id=$this->input->post('idServ');
		$query=$this->ModelServicio->getServicio($id);
		echo json_encode($query->result());
	}
	function modiServicioAjax()
	{
		$arr=array();
		$arr=$this->input->post();
		$ban=1;
		foreach ($arr as $val) {
			if(empty($val))
			{
				$ban=0;
				break;
			}	
		}
		if($ban==1)
		{
			$query=$this->ModelServicio->modiServicio($arr);
			echo $query;
		}
		else
			echo "0";
	}
	function fechasCorte()
	{
		if($this->session->userdata('sucursal'))
			$this->session->unset_userdata('sucursal');
		if($this->session->set_userdata('inicio'))
			$this->session->unset_userdata('inicio');
		if($this->session->userdata('fin'))
			$this->session->unset_userdata('fin');
		$this->form_validation->set_rules('idsuc','Sucursal','required');
		$this->form_validation->set_rules('inicio','La fecha De:','required');
		$this->form_validation->set_rules('fin','La fecha hasta:','required');
		if($this->form_validation->run()===FALSE)
		{
			$data['query']=$this->ModelServicio->getSucursales();
			$data['title']="Corte";
			$data['ruta']="fechas.js";
			$this->load->view('templates/header',$data);
			$this->load->view('servicios/fechas');	
		}
		else
		{
			$this->session->set_userdata('sucursal',$this->input->post('idsuc'));
			$this->session->set_userdata('inicio',$this->input->post('inicio'));
			$this->session->set_userdata('fin',$this->input->post('fin'));
			$this->corte();
		}
		
	}
	function corte($offset=0)
	{
		$uri_segment=3;
		$offset=$this->uri->segment($uri_segment);	
		if(empty($offset))
			$offset=0;
		$config['base_url']=base_url().'servicioFolio/corte';
/*liberar*/$config['total_rows']=$this->ModelServicio->numFechas($this->session->userdata('inicio'),$this->session->userdata('fin'),$this->session->userdata('sucursal'));
		$config['per_page']=100;
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
		$data['query']=$this->ModelServicio->corte($this->session->userdata('inicio'),$this->session->userdata('fin'),$this->session->userdata('sucursal'),$offset,$config['per_page']);
		$data['query']->next_result();
		$data['title']="Servicios";
		$data['cont']=$this->uri->segment($uri_segment);
		$data['ruta']="corte.js";
		$this->load->view('templates/header',$data);
		$this->load->view('servicios/corte');
	}
	function eliFolioAjax()
	{
		$folio=$this->input->post('folio');
		if(!empty($folio))
		{
			$query=$this->ModelServicio->eliFolio($folio);
			echo $query;
		}
		else
			echo '4';
	}

}