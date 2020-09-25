<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function GetAllHomeSlider(){
        return $this->db->get("home_slider")->result();
    }

    public function GetAllProductSize(){
        $this->db->from("home_productsize");
        $this->db->order_by("sequence" , "asc");
        return $this->db->get()->result();
    }

    public function GetAllManufacturingProcess(){
        $this->db->from("manufacturing_process");
        $this->db->order_by("sequence" , "asc");
        return $this->db->get()->result();
    }
    public function GetMenuName($slug){
        return $this->db->get_where('menu', array('slug' => $slug))->result();
    }
    
}
?>