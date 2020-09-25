<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Settings_model extends CI_Model
{

    private $table = 'static_texts';
    private $sub_table = 'subscription';

    function __construct()
    {
        parent::__construct();
    }
	
    function generalInfo(){
    	$query = $this->db->where('slug','general')->get($this->table);
        return $query->row();
    }

	function general(){

		$content = json_encode($this->input->post());

		$edit = array(
            'content' => $content,
        );

        $this->db->where('slug', 'general');
        $this->db->update($this->table, $edit);

	}

    function formInfo(){
        $query = $this->db->where('slug','form')->get($this->table);
        return $query->row();
    }

    function subList(){
        $query = $this->db->get($this->sub_table);
        return $query->result();
    }

    function subCount(){
        $query = $this->db->get($this->sub_table);
        return $query->num_rows();
    }

    function getCSV() {
        $sql = "SELECT email FROM subscription";
        return $this->db->query($sql);
    }


    function contactInfo(){
    	$query = $this->db->where('slug','contact')->get($this->table);
        return $query->row();
    }

	function contact(){

		$content = json_encode($this->input->post());

		$edit = array(
            'content' => $content,
        );

        $this->db->where('slug', 'contact');
        $this->db->update($this->table, $edit);

	}

    function form(){

        $content = json_encode($this->input->post());

        $edit = array(
            'content' => $content,
        );

        $this->db->where('slug', 'form');
        $this->db->update($this->table, $edit);

    }

}
?>