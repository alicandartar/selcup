<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cupstatics_model extends CI_Model{

    private $table = 'cups_static';

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

    function ListCupsName(){
        return $this->db->get('cups_name')->result();
    }

    function SetContent(){

        $cup = $this->input->post('cupname');
        $statement = $this->input->post('content');
    
        $insert = array(
            'statement' => $statement,
            'cups_name_id' => $cup,
        );
        $this->db->insert($this->table, $insert);
    }

    function FindContent($id){

        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();

    }

    function UpdateContent($id){

        $cup = $this->input->post('cupname');
        $statement = $this->input->post('content');
        
            $edit = array(
                'statement' => $statement,
                'cups_name_id' => $cup,
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

}
?>