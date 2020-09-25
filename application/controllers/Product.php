<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
        $this->load->model("Productpage_model");
        $this->load->model("Productbio_model");
        $this->load->model("Productcustom_model");
        $this->load->model("Product_model");
        $this->load->model("Main_model");
        $this->load->model("Contact_model");
        $this->load->model("Social_model");

    }

    public function index($slug)
    {
        /*$data = array();
        $data['menus']          = $this->Menu_model->GetAllMenu();
        $data['submenus']       = $this->Menu_model->GetAllSubMenu();
        $data['cupsname']       = $this->Product_model->GetAllCupsName();
        $data['cupssize']       = $this->Product_model->GetAllCupsSize();
        $data['cupstatic']      = $this->Product_model->GetAllPaperCupsStatement(1);
        $data['contact']        = $this->Contact_model->GetAll();
        $data['socials']        = $this->Social_model->GetAllSocial("1");
        $data['terms']          = $this->Menu_model->getTerms();
        $data['catalogs']       = $this->Menu_model->getProductCatalog();
        $data['statics']        = $this->Menu_model->getAllStatics();
        $data['features']       = $this->Product_model->getAllFeatures();
        $data['pageslider']     = $this->Menu_model->getPageSlider("product");
        $seo = $this->Menu_model->seo();
        $seo = json_decode($seo->content);
        $data['seo'] = $seo->page; 
        $this->load->view("front/product_view", $data);*/
        
        
            if($slug == 'paper-cups'){

                $data = array();
                $data['menus']          = $this->Menu_model->GetAllMenu();
                $data['submenus']       = $this->Menu_model->GetAllSubMenu();
                $data['cupsname']       = $this->Product_model->GetAllCupsName();
                $data['cupssize']       = $this->Product_model->GetAllCupsSize();
                $data['cupstatic']      = $this->Product_model->GetAllPaperCupsStatement(1);
                $data['contact']        = $this->Contact_model->GetAll();
                $data['socials']        = $this->Social_model->GetAllSocial("1");
                $data['terms']          = $this->Menu_model->getTerms();
                $data['catalogs']       = $this->Menu_model->getProductCatalog();
                $data['statics']        = $this->Menu_model->getAllStatics();
                $data['features']       = $this->Product_model->getAllFeatures();
                $data['pageslider']     = $this->Menu_model->getPageSlider($slug);
                $data['cupslider']      = $this->Menu_model->getProductSlider($slug);
                $data['info']           = $this->Menu_model->getProductMenuName($slug);
                $seo = $this->Menu_model->seo();
                $seo = json_decode($seo->content);
                $data['seo'] = $seo->page; 
                $this->load->view("front/product_view", $data); 

            }elseif($slug == 'customized-paper-cups'){
                
                $data = array();
                $data['menus']          = $this->Menu_model->GetAllMenu();
                $data['submenus']       = $this->Menu_model->GetAllSubMenu();
                $data['cupsname']       = $this->Productcustom_model->GetAllCupsName();
                $data['cupssize']       = $this->Productcustom_model->GetAllCupsSize();
                $data['cupstatic']      = $this->Productcustom_model->GetAllPaperCupsStatement(2);
                $data['contact']        = $this->Contact_model->GetAll();
                $data['socials']        = $this->Social_model->GetAllSocial("1");
                $data['terms']          = $this->Menu_model->getTerms();
                $data['catalogs']       = $this->Menu_model->getProductCatalog();
                $data['processes']      = $this->Main_model->GetAllManufacturingProcess();
                $data['statics']        = $this->Menu_model->getAllStatics();
                $data['features']       = $this->Productcustom_model->getAllFeatures();
                $data['pageslider']     = $this->Menu_model->getPageSlider($slug);
                $data['cupslider']      = $this->Menu_model->getProductSlider($slug);
                $data['info']           = $this->Menu_model->getProductMenuName($slug);
                $seo = $this->Menu_model->seo();;
                $seo = json_decode($seo->content);
                $data['seo'] = $seo->page; 
                $this->load->view("front/product-custom_view", $data);

            }elseif($slug == 'bio-paper-cups'){

                $data = array();
                $data['menus']          = $this->Menu_model->GetAllMenu();
                $data['submenus']       = $this->Menu_model->GetAllSubMenu();
                $data['cupsname']       = $this->Productbio_model->GetAllCupsName();
                $data['cupssize']       = $this->Productbio_model->GetAllCupsSize();
                $data['cupstatic']      = $this->Productbio_model->GetAllPaperCupsStatement(3);
                $data['contact']        = $this->Contact_model->GetAll();
                $data['socials']        = $this->Social_model->GetAllSocial("1");
                $data['terms']          = $this->Menu_model->getTerms();
                $data['catalogs']       = $this->Menu_model->getProductCatalog();
                $data['statics']        = $this->Menu_model->getAllStatics();
                $data['features']       = $this->Productbio_model->getAllFeatures();
                $data['pageslider']     = $this->Menu_model->getPageSlider($slug);
                $data['cupslider']      = $this->Menu_model->getProductSlider($slug);
                $data['info']           = $this->Menu_model->getProductMenuName($slug);
                $seo = $this->Menu_model->seo();;
                $seo = json_decode($seo->content);
                $data['seo'] = $seo->page; 
                $this->load->view("front/product-bio_view", $data);

            }else{

                $data = array();
                $data['menus']          = $this->Menu_model->GetAllMenu();
                $data['submenus']       = $this->Menu_model->GetAllSubMenu();
                $data['cupsname']       = $this->Productpage_model->GetAllCupsName();
                $data['cupssize']       = $this->Productpage_model->GetAllCupsSize();
                $data['cupstatic']      = $this->Productpage_model->getProductCupsStatement($slug);
                $data['cupid']          = $this->Productpage_model->getProductID($slug);
                $data['contact']        = $this->Contact_model->GetAll();
                $data['socials']        = $this->Social_model->GetAllSocial("1");
                $data['terms']          = $this->Menu_model->getTerms();
                $data['catalogs']       = $this->Menu_model->getProductCatalog();
                $data['statics']        = $this->Menu_model->getAllStatics();
                $data['features']       = $this->Productpage_model->getAllFeatures();
                $data['pagesliders']    = $this->Menu_model->getProductPageSlider();
                $data['cupslider']      = $this->Menu_model->getProductSlider($slug);
                $data['info']           = $this->Menu_model->getProductMenuName($slug);
                $seo = $this->Menu_model->seo();;
                $seo = json_decode($seo->content);
                $data['seo'] = $seo->page; 
                $this->load->view("front/productpage_view", $data);

            }
        
    }
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */