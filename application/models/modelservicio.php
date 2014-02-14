<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelServicio extends CI_Model {

	function __construct ()
	{
		parent::__construct();
	}
	function addServicio($data)
	{
	$query=$this->db->query('call addFolio('.$data['idCli'].',2,"'.$data['estado'].'","'.$data['fecha'].'",@ban)');
		$query->next_result();
		$res=$this->db->query('select @ban');
			foreach ($res->result_array() as $row)
			{
				$ban=$row['@ban'];
			}
		return $ban;
	}
	function getFolio()
	{
		$query=$this->db->query('select max(folio) as folio from folios');
		return $query;
	}
	/************Servicio ****************************************************************/
	function addDetServicio($data)
	{
		$query=$this->db->query('call addServicio('.$data['folio'].','.$data['idEq'].',"'.$data['tipo'].'",
		"'.$data['falla'].'","'.$data['cables'].'",
			"'.$data['discos'].'","'.$data['accesorios'].'","'.$data['calcas'].'","'.$data['golpes'].'",@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
			foreach ($res->result_array() as $row)
			{
				$ban=$row['@ban'];
			}
		return $ban;
	}
	function numero($id)
	{
		$this->db->where('idsuc',$id);
		$this->db->select('*');
		$this->db->from('folios');
		$this->db->join('clientes','folios.idCli=clientes.idCli');
		$query=$this->db->get();
		return $query->num_rows();
	}
	function consultaGeneralServ($idsuc,$uri,$tope)
	{
		$query=$this->db->query('call getServicio('.$idsuc.','.$uri.','.$tope.');');
		return $query;
	}
	function numRows($folio)
	{
		$this->db->where('folios.folio',$folio);
		$this->db->from('folios');
		$this->db->join('detservicio','detservicio.folio=folios.folio');
		$query=$this->db->get();
		return $query->num_rows();
	}
	function getSalida($folio)
	{
		$query=$this->db->query('call getSalida('.$folio.')');
		return $query;
	}
	function salida($data)
	{
		$query=$this->db->query('call salida('.$data['folio'].','.$data['idServ'].',"'.$data['tecnico'].'","'.$data['estado'].'",'.$data['total'].',@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
			foreach ($res->result_array() as $row)
			{
				$ban=$row['@ban'];
			}
		return $ban;
	}
	function getServicio($id)
	{
		$this->db->where('idServ',$id);
		$this->db->select("*");
		$query=$this->db->get('detservicio');
		return $query;
	}
	function modiServicio($data)
	{
		$query=$this->db->query('call modiServicio('.$data['idSrv'].',"'.$data['tipo'].'",
		"'.$data['falla'].'","'.$data['cables'].'",	"'.$data['discos'].'","'.$data['accesorios'].'",
		"'.$data['calcas'].'","'.$data['golpes'].'",@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
			foreach ($res->result_array() as $row)
			{
				$ban=$row['@ban'];
			}
		return $ban;
	}
	function getSucursales()
	{
		$this->db->where('estado',1);
		$this->db->select('nombre,idsuc');
		$query=$this->db->get('sucursal');
		return $query;
	}
	function numFechas($inicio,$fin,$sucursal)
	{
		$query=$this->db->query('call numFechas ("'.$inicio.'","'.$fin.'",'.$sucursal.',@num);');
		
	}
	function corte($inicio,$fin,$sucursal,$uri,$tope)
	{
		$query=$this->db->query('call corte("'.$inicio.'","'.$fin.'",'.$sucursal.','.$uri.','.$tope.');');
		return $query;
	}
	function eliFolio($folio)
	{
		$query=$this->db->query('call eliFolio('.$folio.',@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
			foreach ($res->result_array() as $row)
			{
				$num=$row['@ban'];
			}
		return $num;
	}
}