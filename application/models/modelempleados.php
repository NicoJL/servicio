<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelempleados extends CI_Model {

	function __construct ()
	{
		parent::__construct();
	}

	function AddEmpleado($data)
	{
		$query=$this->db->query('call addEmpleado("'.$data['nombre'].'","'.$data['domicilio'].'","'.$data['telefono'].'","'.$data['celular'].'","'.$data['tipo'].'",2,@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
		{
			$ban=$row['@ban'];
		}
		return $ban;
	}

	function MostrarE(){
		$query=$this->db->query('call MostrarEmpleados(2);');
		return $query;
	}

	function Mostrarmodi($id){
		$this->db->where('idemp',$id);
		$this->db->select('*');
		$query=$this->db->get('empleados');
		return $query;
	}
	function ModificarE($arr){
		$query=$this->db->query('call modificarEmp('.$arr['idemp'].',"'.$arr['nombre'].'","'.$arr['domicilio'].'","'.$arr['telefono'].'","'.$arr['celular'].'","'.$arr['tipo'].'",@ban)');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
		{
			$ban=$row['@ban'];
		}
		return $ban;
	}

	function EliminarE($id){
		$this->db->where('idemp',$id);
		$this->db->delete('empleados');
	}

}