<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Social_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function GetAllSocial($status){
        return $this->db->get_where('social_settings', array('status' => $status))->result();
    }

  
    
}
?>