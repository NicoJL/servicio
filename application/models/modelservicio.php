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
			"'.$data['estado'].'","'.$data['tecnico'].'","'.$data['falla'].'","'.$data['cables'].'",
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
	function getSalida($folio,$uri=0,$tope)
	{
		$query=$this->db->query('call getSalida('.$folio.','.$uri.','.$tope.')');
		return $query;
	}
}