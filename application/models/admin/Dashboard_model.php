<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function sliders(){

        return $this->db->select('id')->get('home_slider')->num_rows;

    }

    
}
?>