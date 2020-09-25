<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Certificate_model extends CI_Model
{

    private $table = 'certificate';

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

    function SetContent($images)
    {
        $images = 'uploads/'.$this->input->post('cover');
        $sequence = $this->input->post('sequence');
        
        $insert = array(
            'image' => $images,
            'image_state' =>$sequence,
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id, $images)
    {
        $images = $this->input->post('cover');
        $sequence = $this->input->post('sequence');
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
        $edit = array(
            'image' => $images,
            'image_state' =>$sequence,
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
        
    }
    
}
?>