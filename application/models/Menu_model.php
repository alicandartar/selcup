<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menu_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function GetAllMenu(){
        $this->db->order_by('menu_state', 'ASC');
        return $this->db->get("menu")->result();
    }
    public function GetAllSubMenu(){
        return $this->db->get("sub_menu")->result();
    }
    public function seo()
    {
        return $this->db->where("id",1)->get("seo")->row();
    }
    public function getTerms(){
        return $this->db->get("terms")->result();
    }
    public function getProductCatalog(){
        return $this->db->get("catalog")->result();
    }
    public function getAllStatics() {
        return $this->db->get("static")->result();
    }
    public function getPageSlider($slug){
        return $this->db->get_where('other_slider', array('pagename' => $slug))->result();
    }
    public function getProductSlider($slug){
        return $this->db->get_where('cups_slider', array('slug' => $slug))->result();
    }
    public function getProductPageSlider(){
        return $this->db->get("other_slider")->result();
    }
    public function getMenuName($slug){
        return $this->db->get_where('menu', array('slug' => $slug))->result();
    }
    public function getPageMenuName($slug){
        return $this->db->get_where('menu', array('slug' => 'page/'.$slug))->result();
    }
    public function getProductMenuName($slug){
        return $this->db->get_where('sub_menu', array('slug' => $slug))->result();
    }
    
}
?>