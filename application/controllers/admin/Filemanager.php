<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filemanager extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->data["user_info"] = $this->my_login->check_session();
    }

    public function index()
    {
        $viewpage = array('filemanager/index_view');
        $this->my_view->default_view($this->data,$viewpage);
    }

    public function logout()
    {
        $this->my_login->logout();
    }

}