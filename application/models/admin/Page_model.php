<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Page_model extends CI_Model
{

    private $table = 'page_content';

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
        $slug        = $this->input->post('menu');
        $title       = $this->input->post('title');
        $content     = $this->input->post('content');
        
        
        $insert = array(
            'title' => $title,
            'content' =>$content,
            'slug' => $slug,
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id)
    {
        $title       = $this->input->post('title');
        $content     = $this->input->post('content');
        
        $edit = array(
            'title' => $title,
            'content' =>$content,
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
        
    }

    function getMenuName(){
        return $this->db->get('menu')->result();
    }
    
}
?>