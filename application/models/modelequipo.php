<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelEquipo extends CI_Model {

	function __construct ()
	{
		parent::__construct();
	}
	function addEquipo($data)
	{
		$query=$this->db->query('call addEquipo('.$data['idCli'].',"'.$data['nomEquipo'].'","'.$data['marca'].'","'.$data['modelo'].'","'.$data['numSerie'].'","'.$data['descripcion'].'","'.$data['color'].'",@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
		{
			$ban=$row['@ban'];
		}
		return $ban;
	}
	function getIdEq($data)
	{
		$query=$this->db->query('select max(idEq) as idEq from equipocliente where modelo="'.$data['modelo'].'" and numSerie="'.$data['numSerie'].'" and marca="'.$data['marca'].'";');
		return $query;
	}
}