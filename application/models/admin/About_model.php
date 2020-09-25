<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class About_model extends CI_Model
{

    private $table = 'about';

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
        $title       = $this->input->post('title');
        $details     = $this->input->post('details');
        $shortdetail = $this->input->post('shortdetail');
        
        $insert = array(
            'title' => $title,
            'details' =>$details,
            'shortdetail' => '',
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id)
    {
        $title       = $this->input->post('title');
        $details     = $this->input->post('details');
        $shortdetail = $this->input->post('shortdetail');
        
        $edit = array(
            'title' => $title,
            'details' =>$details,
            'shortdetail' => $shortdetail,
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
        
    }
    
}
?>