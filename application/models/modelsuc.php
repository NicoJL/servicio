<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelSuc extends CI_Model {

	function __construct ()
	{
		parent::__construct();
	}
	function addsuc($data)
	{
		$ban=0;
		$query=$this->db->query('call `servicio`.`addSucursal`("'.$data['nombre'].'","'.$data['localidad'].'",
						  "'.$data['domicilio'].'","'.$data['telefono'].'","'.$data['edo'].'",@ban)');
		$query->next_result();
		$res=$this->db->query('select @ban');
			foreach ($res->result_array() as $row)
			{
				$ban=$row['@ban'];
			}
		return $ban;
	}
	function mostrarsuc()
	{
		$query=$this->db->query('call mostrarsuc();');
		$query->next_result();
		return $query;
	}
	function getSuc($id)
	{
		$query=$this->db->query('select *from sucursal where idsuc='.$id.';');
		return $query;
	}
	function modisuc($data)
	{
		$query=$this->db->query('call  `servicio`.`modisuc`("'.$data['nombre'].'","'.$data['localidad'].'",
			"'.$data['domicilio'].'","'.$data['telefono'].'","'.$data['edo'].'",'.$data['idsuc'].',@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach ($res->result_array() as $row) {
			$ban=$row['@ban'];
		}
		return $ban;
	}
	function eliminarsuc($id)
	{
		$query=$this->db->query('call `servicio`.`eliminarsuc`('.$id.');');
		$query->next_result();
	}
}