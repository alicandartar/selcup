<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Features_model extends CI_Model{

    private $table = 'features';

    function __construct(){
        parent::__construct();
    }

    function TotalContent(){

        return $this->db->get($this->table)->num_rows();

    }

    function ListContent(){

        $query = $this->db->order_by('id','ASC')->get($this->table);
        return $query->result();

    }

    function SetContent($images){

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $images = 'uploads/'.$this->input->post('cover');
    
        $insert = array(
                'title' => $title,
                'content' => $content,
                'image' => $images
        );
        $this->db->insert($this->table, $insert);
    }

    function FindContent($id){

        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();

    }

    function UpdateContent($id, $images){

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $images = $this->input->post('cover');
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
        
            $edit = array(
                'title' => $title,
                'content' => $content,
                'image' => $images
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