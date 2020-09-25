<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Contact_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        return $this->db->get("contact")->result();
    }
    
}
?>