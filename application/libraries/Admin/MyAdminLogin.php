<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyAdminLogin {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function check_session()
    {
        $this->CI->load->library('session');
        if(!$this->CI->session->userdata('logged_in')):
            redirect(base_url().'admin/login');
        else:
            $session_data = $this->CI->session->userdata('logged_in');
            return $session_data;
        endif;
    }

    public function logout(){
        $this->CI->load->library('session');
        $this->CI->session->unset_userdata('logged_in');
        $this->CI->session->sess_destroy();
        redirect(base_url().'admin/login');
        redirect($_SERVER['REQUEST_URI'], 'refresh');
    }
}
?>