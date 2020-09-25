<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct()
    {

        parent::__construct();
        $this->load->model('admin/menu_model','model',TRUE);
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->load->library('Admin/MyAdminUrl', $params = NULL, 'my_url');
        $this->load->library('Admin/MyPages', $params = NULL, 'my_pages');
        $this->data["user_info"] = $this->my_login->check_session();

    }

    public function index()
    {

        $viewpage = array('menu/index_view');
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();
        $this->data['menus'] = $this->model->ListContent();
        $this->data['TotalPage'] = $this->model->TotalContent();
        $this->my_view->default_view($this->data,$viewpage);

    }

    public function add()
    {
        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        $viewpage = array('menu/add_view');
        
        if(!$_POST){

            $this->my_view->default_view($this->data,$viewpage);

        }else{

            $this->model->SetContent();
            redirect($this->my_url->thisMainPage());

        }

    }

    public function edit($id)
    {
        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        $this->data['info'] = $this->model->FindContent($id);
        $viewpage = array('menu/edit_view');

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('squence', 'squence', 'required');
        
        if($this->form_validation->run() == FALSE){

            $this->my_view->default_view($this->data,$viewpage);

        }else{

            $this->model->UpdateContent($id);
            redirect($this->my_url->thisMainPage());

        }

    }

    public function ListDelete()
    {

        $this->model->ListDelete($_REQUEST['ID']);

    }

    public function logout()
    {
        $this->my_login->logout();
    }


}

/* End of file welcome.php */
