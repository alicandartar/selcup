<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('admin/login_model','model',TRUE);
		$this->load->library('form_validation');
		
    } 
	
	public function index()
	{

		if($this->session->userdata('logged_in')){

			redirect(base_url().'admin/dashboard');

		}else {

			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {

				//Field validation failed.  User redirected to login page
				$this->load->view('admin/login_view');

			} else {
				//Go to private area
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$Control = $this->model->Control($username, $password);

				if ($Control) {

					$info = array();
					foreach ($Control as $result) {

						$info = array(

							'ID' => $result->id,
							'Username' => $result->username,
							

						);
						$this->session->set_userdata('logged_in', $info);

					}

					redirect(base_url() . 'admin/dashboard');

				} else {

					$this->session->set_flashdata('wrong_info', 'Invalid username or password');
					redirect(base_url() . 'admin/login');

				}


			}
		}
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
