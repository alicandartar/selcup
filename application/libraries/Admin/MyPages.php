<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyPages extends CI_Model
{

    protected $CI;
    protected $table = "pages";

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function findMainPage($pageID)
    {
        $checkPage = $this->db->get($this->table)->num_rows();
        if($checkPage > 0){
            $query = $this->db->where("id",$pageID)->get($this->table)->row();
            if($query->parentID == 0){

            }
        }
    }

    public function checkParents($id)
    {
        return $this->db->where("parent",$id)->get($this->table)->num_rows();
    }

    public function breadcrumb($id, $parent = array())
    {
        $checkPage = $this->db->where("id",$id)->get($this->table)->num_rows();
        if($checkPage > 0)
        {
            $query = $this->db->where("id",$id)->get($this->table)->row();
            if($query->parentID == 0){
                $parent[$query->id]["title"] = $query->title;
                $parent[$query->id]["slug"] = $query->slug;
            }else{
                $parent[$query->id]["title"] = $query->title;
                $parent[$query->id]["slug"] = $query->slug;
                $parent = $this->breadcrumb($query->parentID,$parent);
            }
        }
        return $parent;
    }
}