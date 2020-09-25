<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cupslider_model extends CI_Model{

    private $table = 'cups_slider';

    function __construct(){
        parent::__construct();
    }

    function TotalContent(){

        return $this->db->get($this->table)->num_rows();

    }

    function ListContent(){

        $query = $this->db->order_by('id','ASC')->get($this->table);
        return $query->result();

    }

    function SetContent($images){

        $slug = $this->input->post('slug');
        $images = 'uploads/'.$this->input->post('cover');
        $slug = preg_replace('/\s+/', '-', $slug);
        $insert = array(
                'slug' => $slug,
                'image' => $images,
        );
        $this->db->insert($this->table, $insert);
    }

    function FindContent($id){

        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();

    }

    function UpdateContent($id, $images){

        $slug = $this->input->post('slug');
        $images = $this->input->post('cover');
        $slug = preg_replace('/\s+/', '-', $slug);
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
			$edit = array(
                'slug' => $slug,
                'image' => $images,
			);
		
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);

    }

    function ListDelete($ID)
    {
        foreach($ID as $DeleteID){
            $this->db->delete($this->table, array('id' => $DeleteID));
        }
    }

    function getMenus($id){
        return $this->db->where('id !=',$id)->get('menu')->result();
 
    }
    function getSubMenus(){
        return $this->db->get('sub_menu')->result();
 
    }

}
?>