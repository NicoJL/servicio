<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelCli extends CI_Model {

	function __construct ()
	{
		parent::__construct();
	}
	function addCli($data)
	{
		$query=$this->db->query('call addCliente("'.$data['nombre'].'","'.$data['correo'].'","'.$data['telefono'].'","'.$data['celular'].'","'.$data['direccion'].'","'.$data['fecha'].'","'.$data['estado'].'",@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
		{
			$ban=$row['@ban'];
		}
		return $ban;
	}
	function numRows()
	{
		$this->db->where('activo',1);
		$this->db->select('idCli');
		$query=$this->db->get('clientes');
		return $query->num_rows();
	}
	function consultaGeneralCli($offset=0,$tope)
	{
		
		$query=$this->db->query('call mostrarCli ('.$offset.','.$tope.');');
		return $query;
	}
	function getCli($id)
	{
		$this->db->where('idCli',$id);
		$this->db->select("*");
		$query=$this->db->get('clientes');
		return $query;
	}
	function modiCli($data)
	{
		$query=$this->db->query('call modiCli('.$data['idCli'].',"'.$data['nombre'].'","'.$data['correo'].'",
			"'.$data['telefono'].'","'.$data['celular'].'","'.$data['direccion'].'","'.$data['fecha'].'","'.$data['estado'].'",
			@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
			foreach ($res->result_array() as $row)
			{
				$ban=$row['@ban'];
			}
		return $ban;
	}
	function eliminarCli($id)
	{
		$this->db->query('call eliminarCli ('.$id.',@ban);');
	}
	function getIdCli($data)
	{
		$query=$this->db->query('select max(idCli) as idCli,nombre from clientes where nombre="'.$data['nombre'].'" and direccion="'.$data['direccion'].'";');
		return $query;
	}

}