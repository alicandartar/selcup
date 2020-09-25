<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Slider_model extends CI_Model{

    private $table = 'home_slider';

    function __construct(){
        parent::__construct();
    }

    function TotalContent(){

        return $this->db->get($this->table)->num_rows();

    }

    function ListContent(){

        $query = $this->db->order_by('sequence','ASC')->get($this->table);
        return $query->result();

    }

    function SetContent($images){

        $statement = $this->input->post('statement');
        $images = 'uploads/'.$this->input->post('cover');
        $sequence = $this->input->post('sequence');
    
        $insert = array(
            'image' => $images,
            'statement' => $statement,
            'sequence' => $sequence
        );
        $this->db->insert($this->table, $insert);
    }

    function FindContent($id){

        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();

    }

    function UpdateContent($id, $images){

        $statement = $this->input->post('statement');
        $images = $this->input->post('cover');
        $sequence = $this->input->post('sequence');
        
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }

			$edit = array(
                'image' => $images,
                'statement' => $statement,
                'sequence' => $sequence
			);
		
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);

    }

    function ListDelete($ID)
    {
        foreach($ID as $DeleteID){
            $this->db->delete($this->table, array('id' => $DeleteID));
        }
    }

}
?>