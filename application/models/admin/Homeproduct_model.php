<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Homeproduct_model extends CI_Model
{

    private $table = 'home_productsize';

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
        $size  = $this->input->post('title');
        $width = $this->input->post('width');
        $height = $this->input->post('height');
        $images = 'uploads/'.$this->input->post('cover');
        $slug = "product/paper-cups";
        $sequence = $this->input->post('sequence');
        
        
        $insert = array(
            'size' => $size,
            'width' => $width,
            'height' => $height,
            'image' => $images,
            'slug' => $slug,
            'sequence' => $sequence,
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id,$images)
    {
        $size  = $this->input->post('title');
        $width = $this->input->post('width');
        $height = $this->input->post('height');
        $images = $this->input->post('cover');
        $slug = "product/paper-cups";
        $sequence = $this->input->post('sequence');
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
        $edit = array(
            'size' => $size,
            'width' => $width,
            'height' => $height,
            'image' => $images,
            'slug' => $slug,
            'sequence' => $sequence,
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }
}
?>