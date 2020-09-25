<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Socialsettings_model extends CI_Model
{

    private $table = 'social_settings';

    function __construct()
    {
        parent::__construct();
    }

    function ListContent()
    {
        $query = $this->db->order_by('sort_sequence','asc')->get($this->table);
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
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $status = $this->input->post('status');
        $icon = $this->input->post('icon');
        $sort_sequence = $this->input->post('sort_sequence');
        foreach ($title as $key => $value) {
            $insert = array(
                'title' => $value,
                'url' => $url[$key],
                'icon' => $icon[$key],
                'status' => $status[$key],
                'sort_sequence' => $sort_sequence[$key],
                'created_at' => null
            );
            $this->db->insert($this->table, $insert);
        }
    }

    function UpdateContent($id)
    {
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $status = $this->input->post('status');
        $sort_sequence = $this->input->post('sort_sequence');
        $edit = array(
            'title' => $title,
            'url' => $url,
            'icon' => $icon,
            'status' => $status,
            'sort_sequence' => $sort_sequence,
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }

}
?>