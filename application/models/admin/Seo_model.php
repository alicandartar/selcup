<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Seo_model extends CI_Model{

    private $table = 'seo';

    function __construct(){
        parent::__construct();
    }

    function FindContent($id = 1){

        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();

    }

    function UpdateContent($id = 1){

        $content = $this->input->post("content");
        $content = json_encode($content);

        $edit = array(
            'content' => $content,
            'updated_at' => strtotime("NOW")
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);

    }

}
?>