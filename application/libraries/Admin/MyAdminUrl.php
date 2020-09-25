<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyAdminUrl{

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function CurrentUrl()
    {
        $result = base_url().$this->CI->uri->uri_string();
        return $result;
    }

    public function thisMainPage()
    {
        $segmentArray = array();
        $segmentArray = $this->CI->uri->segment_array();
        if(in_array('add', $segmentArray) or in_array('edit', $segmentArray) or in_array('clone_page', $segmentArray))
        {
            $result = base_url().$segmentArray[1].'/'.$segmentArray[2];
        }else
        {
            $result = base_url().$this->CI->uri->uri_string();
        }
        return $result;
    }

}