<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Cache-Control: no-store, no-cache, must-revalidate");
class MyAdminView {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function default_view($data,$viewpage)
    {

        $this->CI->load->view('admin/templates/head_view',$data);
        $this->CI->load->view('admin/templates/header_view',$data);
        $this->CI->load->view('admin/templates/sidebar_view',$data);
        $this->CI->load->view('admin/templates/scripts_view',$data);
        foreach($viewpage as $view){
            $this->CI->load->view('admin/'.$view,$data);
        }
        $this->CI->load->view('admin/templates/main_footer_view',$data);
        $this->CI->load->view('admin/templates/control_sidebar_view',$data);
        $this->CI->load->view('admin/templates/footer_view',$data);
    }
}