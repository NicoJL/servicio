<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelLogin extends CI_Model {

	function __construct ()
	{
		parent::__construct();
	}

	function Ingreso($data){
		$contraseña=$this->encrypt->sha1($data['txtPass']);
		$query=$this->db->query('call ingresoSistema("'.$data['txtUser'].'","'.$contraseña.'",'.$data['lstSuc'].',@ban);');
		$query->next_result();
		$res=$this->db->query('select @ban');
		foreach($res->result_array() as $row)
			$ban=$row['@ban'];
		return $ban;
	}

}