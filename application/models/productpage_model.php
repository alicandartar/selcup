<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Productpage_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function GetAllCupsName(){
        return $this->db->get("cups_name")->result();
        //return  $this->db->get_where('cups_name', array('id' => $id))->result();
    }

    public function GetAllCupsSize(){
        return $this->db->get("cups_size")->result();
    }

    public function GetAllPaperCupsStatement($id){
        return  $this->db->get_where('cups_static', array('cups_name_id' => $id))->result();
    }
    public function getProductCupsStatement($slug){
        
        $this->db->select('id');
        $cups = $this->db->get_where('cups_name', array('slug' => $slug))->result();
        return  $this->db->get_where('cups_static', array('cups_name_id' => $cups[0]->id))->result();
    }
    public function getProductID($slug){
        $this->db->select('id');
        return $this->db->get_where('cups_name', array('slug' => $slug))->result();
    }
    public function getAllFeatures(){
        return $this->db->get("features")->result();
    }
}
?>