<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('admin/seo_model','model',TRUE);
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->load->library('Admin/MyAdminUrl', $params = NULL, 'my_url');
        $this->data["user_info"] = $this->my_login->check_session();

    }

    public function index(){

        redirect(base_url().'admin/seo/edit/1');

    }

    public function edit($id){


        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        $viewpage = array('seo/edit_view');
        $info = $this->model->FindContent($id);
        $this->data['info'] = $info;

        if(!$_POST){

            $this->my_view->default_view($this->data,$viewpage);

        }else{
            
            $this->model->UpdateContent($id);
            redirect($this->my_url->thisMainPage());

        }

    }

    public function ListDelete(){

        $this->model->ListDelete($_REQUEST['ID']);

    }

    public function logout()
    {
        $this->my_login->logout();
    }


}

/* End of file index.php */
