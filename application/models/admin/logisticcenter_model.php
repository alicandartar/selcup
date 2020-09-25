<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class logisticcenter_model extends CI_Model
{

    private $table = 'logistic_centers';

    function __construct()
    {
        parent::__construct();
    }
    
    function TotalContent()
    {
        return $this->db->get($this->table)->num_rows();
    }    
    
    function ListContentArray()
    {
        $query = $this->db->order_by('id','desc')->get($this->table);
        return $query->result_array();
    }

    function ListContent()
    {
        $query = $this->db->order_by('title','asc')->get($this->table);
        return $query->result();
    }

    
    function FindContent($id)
    {
        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();
    }

    function FindCenter($code)
    {
        $query = $this->db->where('code',$code)->get($this->table);
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
        $image = $this->input->post('cover');
        $status = $this->input->post('status');
        $code = $this->input->post('code');
        $insert = array(
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'status' => $status,
            'code' => $code,
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id,$images)
    {
        //$title = $this->input->post('title');
        $content = $this->input->post('content');
        $image = $this->input->post('cover');
        $status = $this->input->post('status');
        //$code = $this->input->post('code');
        $edit = array(
            //'title' => $title,
            'content' => $content,
            'image' => $image,
            'status' => $status,
            //'code' => $code,
            'updated_at' => date('Y-m-d H:i:s', strtotime("NOW"))
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }
    
}
?>