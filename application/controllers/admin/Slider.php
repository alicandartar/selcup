<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('admin/slider_model','model',TRUE);
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->load->library('Admin/MyAdminImages', $params = NULL, 'my_images');
        $this->load->library('Admin/MyAdminUrl', $params = NULL, 'my_url');
        $this->data["user_info"] = $this->my_login->check_session();

    }

    public function index()
    {

        $viewpage = array('slider/index_view');
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();
        $this->data['Contents'] = $this->model->ListContent();
        $this->data['TotalPage'] = $this->model->TotalContent();
        $this->my_view->default_view($this->data,$viewpage);

    }

    public function add(){

        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        //$this->data['link'] = $this->page_model->get_link();
        $viewpage = array('slider/add_view');

        $this->form_validation->set_rules('statement', 'Statement', 'required');

        if($this->form_validation->run() == FALSE){

            $this->my_view->default_view($this->data,$viewpage);

        }else{
            $images = $this->my_images->images_empty_filter($this->input->post("images"));

            $this->model->SetContent($images);
            redirect($this->my_url->thisMainPage());
        }


    }

    public function edit($id){

        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        $this->data['info'] = $this->model->FindContent($id);
        //$this->data['link'] = $this->page_model->get_link();
        $viewpage = array('slider/edit_view');

        $this->form_validation->set_rules('statement', 'Statement', 'required');

        if($this->form_validation->run() == FALSE){

            $this->my_view->default_view($this->data,$viewpage);

        }else{

            $images = $this->my_images->images_empty_filter($this->input->post("images"));
            
            $this->model->UpdateContent($id, $images);
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
