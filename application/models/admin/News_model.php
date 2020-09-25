<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class News_model extends CI_Model
{

    private $table = 'news';

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
        $query = $this->db->order_by('id','desc')->get($this->table);
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
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $status = $this->input->post('status');
        $images = 'uploads/'.$this->input->post('cover');
        $published = strtotime($this->input->post('published'));
        $slug = preg_replace('/\s+/', '-', mb_strtolower($title));

        $insert = array(
            'date' => $published,
            'image' => $images,
            'title' => $title,
            'detail' => $content,
            'status' => $status,
            'slug' => $slug,
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id,$images)
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $status = $this->input->post('status');
        $images = $this->input->post('cover');
        $published = strtotime($this->input->post('published'));
        $slug = preg_replace('/\s+/', '-', mb_strtolower($title));
        
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }

        $edit = array(
            'date' => $published,
            'image' => $images,
            'title' => $title,
            'detail' => $content,
            'status' => $status,
            'slug' => $slug,
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }
    
    
}
?>