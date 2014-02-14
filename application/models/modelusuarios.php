<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelusuarios extends CI_Model {

	function __construct ()
	{
		parent::__construct();
	}

	function AddUsusario($data)
	{
		$contraseña=$this->encrypt->sha1($data['txtpass']);
		$query=$this->db->query('call addUsuario("'.$data['txtnombre'].'","'.$data['txtap'].'","'.$data['txtam'].'","'.$data['txtname'].'","'.$data['txtemail'].'","'.$contraseña.'",20,@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
			$ban=$row['@ban'];
		return $ban;		

	}

	function ValidaUser($nom,$val){
		if($val==1)
			$query=$this->db->query('call comprobarUser("'.$nom.'",2,@ban);');
		else if($val==2)
			$query=$this->db->query('call comprobarEmail("'.$nom.'",2,@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
			$ban=$row['@ban'];
		return $ban;
	}
	// validamos cuando modificamos
	function ValidarUserModi($nom,$val){
		if($val==1)
			$query=$this->db->query('call comprobarUserModi("'.$nom.'",2,@ban);');
		else if($val==2)
			$query=$this->db->query('call comprobarEmail("'.$nom.'",2,@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
			$ban=$row['@ban'];
		return $ban;
	}
	// 
	function mostrarU(){
		$query=$this->db->query('call MostrarUsuarios(2);');
		return $query;
	}
	public function eliminarUser($id)
	{
		$query=$this->db->query('call elminaUser(2,'.$id.',@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
			$ban=$row['@ban'];
		return $ban;
	}

}