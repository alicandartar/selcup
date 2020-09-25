<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Otherslider_model extends CI_Model{

    private $table = 'other_slider';

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

        $pagename = $this->input->post('pagename');
        $images = 'uploads/'.$this->input->post('cover');
        $pagename = preg_replace('/\s+/', '-', $pagename);
        $insert = array(
                'pagename' => $pagename,
                'image' => $images,
        );
        $this->db->insert($this->table, $insert);
    }

    function FindContent($id){

        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();

    }

    function UpdateContent($id, $images){

        $pagename = $this->input->post('pagename');
        $images = $this->input->post('cover');
        $pagename = preg_replace('/\s+/', '-', $pagename);
        
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }

			$edit = array(
                'pagename' => $pagename,
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