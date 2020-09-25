<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sustainability_model extends CI_Model
{

    private $table = 'sustainability';

    function __construct()
    {
        parent::__construct();
    }
    
    function TotalContent()
    {
        return $this->db->get($this->table)->num_rows();
    }    
    
    function ListContent()
    {
        $query = $this->db->order_by('id','asc')->get($this->table);
        return $query->result();
    }

   

    
    function FindContent($id)
    {
        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();
    }

    function ListDelete($ID)
    {
        foreach($ID as $DeleteID){
            $this->db->delete($this->table, array('id' => $DeleteID));
        }
    }

    function SetContent()
    {
        $statement = $this->input->post('content');
        $images = 'uploads/'.$this->input->post('cover');
        
        
        $insert = array(
            'statement' => $statement,
            'image' =>$images
            
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id,$images)
    {
        $statement = $this->input->post('content');
        $images = $this->input->post('cover');
        
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }

        $edit = array(
            'statement' => $statement,
            'image' =>$images
        );

        
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
        
    }
    
}
?>