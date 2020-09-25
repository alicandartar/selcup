<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

    function __construct(){

        parent::__construct();
        $this->load->model('admin/dashboard_model','model',TRUE);
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->data["user_info"] = $this->my_login->check_session();

    }

    public function index()
    {

        $this->data["totalSlider"] = $this->model->sliders();
        $viewpage = array('dashboard_view');
        $this->my_view->default_view($this->data,$viewpage);

    }
    
    public function logout()
    {
        $this->my_login->logout();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */