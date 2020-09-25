<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class About_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function GetAllAbout(){
        return $this->db->get("about")->result();
    }
    
    public function GetAllCertificate(){
        return $this->db->get("certificate")->result();
    }
}
?>