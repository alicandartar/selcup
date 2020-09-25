<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mainproduct_model extends CI_Model
{

    private $table = 'cups_name';

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
            $this->deleteSubmenu($DeleteID);
        }
    }

    function SetContent()
    {
        $name = $this->input->post('name');
        $shortdetail = $this->input->post('content');
        $images = 'uploads/'.$this->input->post('cover');
        $slug = preg_replace('/\s+/', '-', mb_strtolower($name));

        $insert = array(
            'name' => $name,
            'image' =>$images,
            'shortdetail' => $shortdetail,
            'slug' => $slug,
        );
        $this->db->insert($this->table, $insert);

        $insertid = $this->db->insert_id();
        
        $insert_submenu = array(
            'sub_menu_name' => $name,
            'sub_menu_state' => $insertid, 
            'menu_submenu_id' => 2, 
            'slug' => $slug,
            'image' =>$images,
        );
        $this->db->insert('sub_menu', $insert_submenu);
    }

    function UpdateContent($id,$images)
    {
        $name = $this->input->post('name');
        $shortdetail = $this->input->post('content');
        $images = $this->input->post('cover');
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
        
        $edit = array(
            'name' => $name,
            'image' =>$images,
            'shortdetail' => $shortdetail
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);

        $edit_submenu = array(
            'sub_menu_name' =>$name,
            'image' =>$images,
        );
        $this->db->where('sub_menu_state', $id);
        $this->db->update('sub_menu', $edit_submenu);
    }

    function deleteSubmenu($id){
        $this->db->delete('sub_menu', array('sub_menu_state' => $id));
        
    }
    
}
?>