<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Terms_model extends CI_Model
{

    private $table = 'terms';

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
        $name = $this->input->post('name');
        $content = $this->input->post('content');
        foreach ($title as $key => $value) {
            $insert = array(
                'name' => $name,
                'content' => $content,
            );
            $this->db->insert($this->table, $insert);
        }
    }

    function UpdateContent($id)
    {
        $name = $this->input->post('name');
        $content = $this->input->post('content');
        
        $edit = array(
            'name' => $name,
            'content' => $content,
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }

}
?>