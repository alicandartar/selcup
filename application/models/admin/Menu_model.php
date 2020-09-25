<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menu_model extends CI_Model
{

    private $table = 'menu';

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
        $squence = $this->input->post('squence');
        $slug = 'page/'.preg_replace('/\s+/', '-', mb_strtolower($name));
        
        $last_id = $this->getLastId();
    
            $insert = array(
                'menu_name' => $name,
                'menu_state' => $squence,
                'menu_submenu_id' => $last_id[0]->id + 1,
                'slug' => $slug,
            );
            $this->db->insert($this->table, $insert);
        
    }

    function UpdateContent($id)
    {
        $name = $this->input->post('name');
        $squence = $this->input->post('squence');

        $control = $this->getSlug($id);
        

        if(substr($control[0]->slug, 0, 5) == 'page/'){
            $slug = 'page/'.preg_replace('/\s+/', '-', mb_strtolower($name));
            $edit = array(
                'menu_name' => $name,
                'menu_state' => $squence,
                'slug' => $slug
            );
        }else{
            $edit = array(
                'menu_name' => $name,
                'menu_state' => $squence
            );
        }
        
        
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }

    function getSlug($id){
        $this->db->select('slug');
        return $this->db->get_where($this->table, array('id' => $id))->result();
    }

    function getLastId(){
        return $this->db->select('id')->order_by('id',"desc")->limit(1)->get('menu')->result();
    }

}
?>