<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_request extends CI_Controller {

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
        $this->load->library('email');
    }

    public function contact_form(){

        $name = $this->input->post("name");
        $subject = $this->input->post("subject");
        $message = $this->input->post("message");
        
        if(trim($name) == ''  OR trim($message) == ''){
            
            $emptyError = array();
            $emptyError['name'] = trim($name) == '' ? 1 : 0;
            $emptyError['subject'] = trim($subject) == '' ? 1 : 0;
            $emptyError['message'] = trim($message) == '' ? 1 : 0;
            echo json_encode($emptyError);
            
        }else{
            
                $mail = '<strong>Ad Soyad : </strong>'.$name.'<br><strong>Konu : </strong>'.$subject.'<br><strong>Açıklama : </strong>'.$message;
                
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.yandex.com',
                    'smtp_port' => 465,
                    'smtp_crypto' => 'ssl',
                    'smtp_timeout' => 5,            
                    'smtp_user' => 'noreply@sm724projects.com',
                    'smtp_pass' => 'deneme',
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'           
                );

                

                $this->email->initialize($config);
                $this->email->from('noreply@sm724projects.com',"İletişim Formu");
                $this->email->to('info@selcup.com.tr');
                $this->email->subject("Selcup İletişim Formu");
                $this->email->message($mail);

                $send =  $this->email->send();
                
                if($send){
                    echo 'successful';
                    redirect(base_url().'contact');
                }else{
                    echo "send_error";
                }
            
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */