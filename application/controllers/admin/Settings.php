<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
var $file_path;
    function __construct()
    {

        parent::__construct();
        $this->load->model('admin/settings_model','model',TRUE);
        $this->load->library('Admin/MyAdminLogin', $params = NULL, 'my_login');
        $this->load->library('Admin/MyAdminView', $params = NULL, 'my_view');
        $this->load->library('Admin/MyAdminImages', $params = NULL, 'my_images');
        $this->load->library('Admin/MyAdminUrl', $params = NULL, 'my_url');
        $this->load->library('Admin/MyPages', $params = NULL, 'my_pages');
        $this->data["user_info"] = $this->my_login->check_session();
        $this->file_path = APPPATH . 'uploads/csv';

    }

    public function general()
    {
        $viewpage = array('settings/static_view');
        $generalInfo = $this->model->generalInfo();
        $generalInfo = json_decode($generalInfo->content);
        $this->data["info"] = $generalInfo;
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();
        if(!$_POST){
            //print_r($this->data["info"]); die();
            $this->my_view->default_view($this->data,$viewpage);
        }else{
            $this->model->general();
            redirect($this->my_url->thisMainPage());
        }
    }

    public function contact()
    {
        $viewpage = array('settings/contact_view');
        $contactInfo = $this->model->contactInfo();
        $contactInfo = json_decode($contactInfo->content);
        $this->data["info"] = $contactInfo;
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();
        if(!$_POST){
            $this->my_view->default_view($this->data,$viewpage);
        }else{
            $this->model->contact();
            redirect($this->my_url->thisMainPage());
        }
    }

    public function form()
    {
        $viewpage = array('settings/form_view');
        $formInfo = $this->model->formInfo();
        $formInfo = json_decode($formInfo->content);
        $this->data["info"] = $formInfo;
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();
        if(!$_POST){
            $this->my_view->default_view($this->data,$viewpage);
        }else{
            $this->model->form();
            redirect($this->my_url->thisMainPage());
        }
    }

    public function subs()
    {
        $viewpage = array('settings/subs_view');
        $List = $this->model->subList();
        $this->data["list"] = $List;
        $this->data['PageUrl'] = $this->my_url->CurrentUrl();

//Abone listesinin csv olarak indirilmesi
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $this->data['count'] = $this->model->subCount();

        $report = $this->model->getCSV();
        $delimiter = ",";
        $newline = "\r\n";
        $new_report = $this->dbutil->csv_from_result($report, $delimiter, $newline);
//



        if(!$_POST){
            $this->my_view->default_view($this->data,$viewpage);
        }else{
            force_download('Subs_list.csv', $new_report);
        }



    }

    function get_report(){
        $this->load->model('my_model');
        $this->load->dbutil();
        $this->load->helper('file');
        /* get the object   */
        $report = $this->model->s();
        /*  pass it to db utility function  */
        $new_report = $this->dbutil->csv_from_result($report);
        /*  Now use it to write file. write_file helper function will do it */
        write_file('csv_file.csv',$new_report);
        /*  Done    */
    }

    public function edit($id)
    {
        $this->data['CurrentUrl'] = $this->my_url->CurrentUrl();
        $this->data['info'] = $this->model->FindContent($id);
        $viewpage = array('settings/social/edit_view');
        if(!$_POST){

            $this->my_view->default_view($this->data,$viewpage);

        }else{

            $this->model->UpdateContent($id);
            redirect($this->my_url->thisMainPage());

        }

    }

    public function logout()
    {
        $this->my_login->logout();
    }


}

/* End of file welcome.php */
