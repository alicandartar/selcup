<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Catalog_model extends CI_Model
{

    private $table = 'catalog';

    function __construct()
    {
        parent::__construct();
    }

    function ListContent()
    {
        $query = $this->db->order_by('id','asc')->get($this->table);
        return $query->result();
    }

    function TotalContent()
    {
        return $this->db->get($this->table)->num_rows();
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
        $images = $this->input->post('cover');
        $product = $this->input->post('product');
        $catalog = $this->input->post('catalog');
        foreach ($title as $key => $value) {
            $insert = array(
                'image' => $images,
                'product' => $product,
                'catalog' => $catalog
            );
            $this->db->insert($this->table, $insert);
        }
    }

    function UpdateContent($id,$images)
    {   
        
        $images  = $this->input->post('cover');
        $product = $this->input->post('product');
        $catalog = $this->input->post('catalog');
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
        
        $edit = array(
                'image' => $images,
                'product' => $product,
                'catalog' => $catalog
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }

}
?>