<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class News_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function GetAllNews(){
        return $this->db->get("news")->result();
    }

    public function RecordCount(){
        return $this->db->count_all('news');
    }

    public function FetchNews($limit, $start){
        $this->db->limit($limit, $start);
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('news');

        if ($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function GetNewsDetail($slug){
        return $this->db->get_where('news', array('slug' => $slug))->result();
    }

    public function GetMenuName($slug){
        return $this->db->get_where('menu', array('slug' => $slug))->result();
    }
    
}
?>