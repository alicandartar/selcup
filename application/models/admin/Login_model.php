<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

	function Control($username,$password){
		
		$this->db->select('*');
		$this -> db -> from('admin');
		$this -> db -> where('name', $username);
		$this -> db -> where('password', ($password));
		
		$query = $this -> db -> get();
		
		
		if($query -> num_rows() == 1)
		{
			
			return $query->result();
		}
		else
		{
			return false;
		}
		
	}
	
}
?>