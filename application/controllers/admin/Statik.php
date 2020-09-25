<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statik extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('admin/statik_model','model',TRUE);
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->load->library('Admin/MyAdminUrl', $params = NULL, 'my_url');
        $this->data["user_info"] = $this->my_login->check_session();

    }

    public function index()
    {

        $viewpage = array('statik/index_view');
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();
        $this->data['statik'] = $this->model->ListContent();
        $this->data['TotalPage'] = $this->model->TotalContent();
        $this->my_view->default_view($this->data,$viewpage);

    }

    public function add(){

        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        //$this->data['link'] = $this->page_model->get_link();
        $viewpage = array('statik/add_view');

        $this->form_validation->set_rules('title', 'Başlık', 'required');

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
        $viewpage = array('statik/edit_view');
        
        
        $this->form_validation->set_rules('discover', 'title', 'required');
        $this->form_validation->set_rules('contactforinquiry', 'contactforinquiry', 'required');
        $this->form_validation->set_rules('adres', 'adres', 'required');
        $this->form_validation->set_rules('contactnumber', 'contactnumber', 'required');
        $this->form_validation->set_rules('social', 'social', 'required');
        $this->form_validation->set_rules('getintouch', 'getintouch', 'required');
        $this->form_validation->set_rules('moreabout', 'moreabout', 'required');
        $this->form_validation->set_rules('compostable', 'compostable', 'required');
        $this->form_validation->set_rules('papercup', 'papercup', 'required');
        $this->form_validation->set_rules('findoutmore', 'findoutmore', 'required');
        $this->form_validation->set_rules('productsize', 'productsize', 'required');
        $this->form_validation->set_rules('details', 'details', 'required');
        $this->form_validation->set_rules('contactus', 'contactus', 'required');
        $this->form_validation->set_rules('allrightsreserved', 'allrightsreserved', 'required');
        $this->form_validation->set_rules('contactinfo', 'contactinfo', 'required');
        $this->form_validation->set_rules('contactform', 'contactform', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');
        $this->form_validation->set_rules('ihaveread', 'ihaveread', 'required');
        $this->form_validation->set_rules('selcup', 'selcup', 'required');
        $this->form_validation->set_rules('cupsize', 'cupsize', 'required');
        $this->form_validation->set_rules('capacity', 'capacity', 'required');
        $this->form_validation->set_rules('product_code', 'product_code', 'required');
        $this->form_validation->set_rules('height', 'height', 'required');
        $this->form_validation->set_rules('brim_diameter', 'brim_diameter', 'required');
        $this->form_validation->set_rules('pack_quantity', 'pack_quantity', 'required');
        $this->form_validation->set_rules('case_quantity', 'case_quantity', 'required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        $this->form_validation->set_rules('usage_place', 'usage_place', 'required');
        
        if($this->form_validation->run() == FALSE){
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
