<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

    function __construct()
    {

        parent::__construct();
        $this->load->model('admin/about_model','model',TRUE);
        //$this->load->model('admin/page_model','page_model',TRUE);
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->load->library('Admin/MyAdminUrl', $params = NULL, 'my_url');
        $this->load->library('Admin/MyPages', $params = NULL, 'my_pages');
        $this->data["user_info"] = $this->my_login->check_session();

    }

    public function index()
    {

        $viewpage = array('about/index_view');
        $this->data['abouts'] = $this->model->ListContent();
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();
        $this->my_view->default_view($this->data,$viewpage);

    }

    public function add()
    {

        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        //$this->data['link'] = $this->page_model->get_link();
        $viewpage = array('about/add_view');

        $this->form_validation->set_rules('title', 'Başlık', 'required');

        if($this->form_validation->run() == FALSE){

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
        //$this->data['link'] = $this->page_model->get_link();
        $viewpage = array('about/edit_view');

        $this->form_validation->set_rules('title', 'Başlık', 'required');

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

    public function ListReorder()
    {
        $this->model->ListReorder($_REQUEST["Orders"]);
    }

    public function logout()
    {
        $this->my_login->logout();
    }


}

/* End of file welcome.php */
