<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Productbio_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function GetAllCupsName(){
        return $this->db->get("cups_name")->result();
    }

    public function GetAllCupsSize(){
        return $this->db->get("cups_size")->result();
    }
    
    public function GetAllPaperCupsStatement($id){
        return  $this->db->get_where('cups_static', array('cups_name_id' => $id))->result();
    }
    public function getAllFeatures(){
        return $this->db->get("features")->result();
    }
}
?>