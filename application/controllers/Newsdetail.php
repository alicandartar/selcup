<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsdetail extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
       
        parent::__construct();
        $this->load->model("Menu_model");
        $this->load->model("Contact_model");
        $this->load->model("News_model");
        $this->load->model("Social_model");

    }

    public function index($id)
    {
        $data = array();
        $data['menus']          = $this->Menu_model->GetAllMenu();
        $data['submenus']       = $this->Menu_model->GetAllSubMenu();
        $data['contact']        = $this->Contact_model->GetAll();
        $data['newsdetail']     = $this->News_model->GetNewsDetail($id);
        $data['socials']        = $this->Social_model->GetAllSocial("1");
        $data['terms']          = $this->Menu_model->getTerms();
        $data['catalogs']       = $this->Menu_model->getProductCatalog();
        $data['menuname']       = $this->News_model->GetMenuName("news/index"); 
        $data['statics']        = $this->Menu_model->getAllStatics();
        $data['pageslider']      = $this->Menu_model->getPageSlider("newsdetail");
        $seo = $this->Menu_model->seo();
        $seo = json_decode($seo->content);
        $data['seo'] = $seo->page; 
        $this->load->view("front/news-detail_view", $data);
    }

  
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */