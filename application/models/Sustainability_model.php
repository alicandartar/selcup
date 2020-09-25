<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sustainability_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        return $this->db->get("sustainability")->result();
    }
    
}
?>