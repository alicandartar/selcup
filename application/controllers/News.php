<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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
    public static $slug = "news";
    function __construct()
    {
        
        parent::__construct();
        $this->load->model("Menu_model");
        $this->load->model("Contact_model");
        $this->load->model("News_model");
        $this->load->model("Social_model");
        $this->load->library("pagination");
        $this->load->helper("url");

    }

    public function index()
    {
        $data = array();
        $data['menus']          = $this->Menu_model->GetAllMenu();
        $data['submenus']       = $this->Menu_model->GetAllSubMenu();
        $data['contact']        = $this->Contact_model->GetAll();
        $data['socials']        = $this->Social_model->GetAllSocial("1");
        $data['terms']          = $this->Menu_model->getTerms();
        $data['catalogs']       = $this->Menu_model->getProductCatalog();
        $data['statics']        = $this->Menu_model->getAllStatics();
        $data['pageslider']     = $this->Menu_model->getPageSlider("news");
        $data['info']           = $this->Menu_model->getMenuName("news");
        //$data['news']         = $this->News_model->GetAllNews();    
        $seo = $this->Menu_model->seo();;
        $seo = json_decode($seo->content);
        $data['seo'] = $seo->page; 

        $config = array();
        $config['base_url'] = base_url() . self::$slug;
        $config['total_rows'] = $this->News_model->RecordCount();
        $config['per_page'] = 6;
        $config['uri_segment'] = 2;
        
        $config['cur_tag_open'] = '<li><a href="#" class="active">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['first_link'] = '&lt; İLK';
        $config['first_tag_open'] = '<li><a href="#">';
        $config['first_tag_close'] = '</a></li>';
        
        $config['last_link'] = '&gt;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&rsaquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lsaquo;';
        $config['prev_tag_open'] = '<li class="template-pagination-button-prev">';
        $config['prev_tag_close'] = '</li>';
        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['news'] = $this->News_model->FetchNews($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
       
        

        $this->load->view("front/news_view", $data);
    }

    public function detail($slug)
    {
        $data = array();
        $data['menus']          = $this->Menu_model->GetAllMenu();
        $data['submenus']       = $this->Menu_model->GetAllSubMenu();
        $data['contact']        = $this->Contact_model->GetAll();
        $data['newsdetail']     = $this->News_model->GetNewsDetail($slug);
        $data['socials']        = $this->Social_model->GetAllSocial("1");
        $data['terms']          = $this->Menu_model->getTerms();
        $data['catalogs']       = $this->Menu_model->getProductCatalog();
        $data['menuname']       = $this->News_model->GetMenuName("news"); 
        $data['statics']        = $this->Menu_model->getAllStatics();
        $data['pageslider']      = $this->Menu_model->getPageSlider("newsdetail");
        $seo = $this->Menu_model->seo();
        $seo = json_decode($seo->content);
        $data['seo'] = $seo->page; 
        $this->load->view("front/news-detail_view", $data);
    }

    
    /*
    public function detail($id)
    {
        $data['newsdetail']     = $this->News_model->GetNewsDetail($id);
        $this->load->view("front/news-detail_view", $data);
    } */
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */