<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyAdminMenu extends CI_Model
{

    protected $CI;
    protected $table = "admin_menu";

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function AdminMenu(){
        $this->li = '';
        $mainMenu = $this->db->where("parent_id",0)->get($this->table)->result();
        foreach ($mainMenu as $menu):
            $this->activeClass = $this->uri->segment(2) == $menu->slug ? 'active' : '';
            $this->li.= '<li class="treeview '.$this->activeClass.'">';
                if($menu->single_page == 1):
                    $this->li.= '<a href="'.base_url().'admin/'.$menu->slug.'">';
                        $this->li.= '<i class="fa fa-file-image-o"></i> <span>'.$menu->title.' Yönetimi</span>';
                    $this->li.= '</a>';
                else:
                    $this->li.= '<a href="#">';
                        $this->li.= '<i class="fa fa-file-image-o"></i> <span>'.$menu->title.' Yönetimi</span>';
                        $this->li.= '<i class="fa fa-angle-left pull-right"></i>';
                    $this->li.= '</a>';
                endif;
            $this->li.= '</li>';
        endforeach;
        return $this->li;
    }

}