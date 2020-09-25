<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Statik_model extends CI_Model{

    private $table = 'static';

    function __construct(){
        parent::__construct();
    }

    function TotalContent(){

        return $this->db->get($this->table)->num_rows();

    }

    function ListContent(){

        $query = $this->db->order_by('id','ASC')->get($this->table);
        return $query->result();

    }

    function SetContent($images){

        $discover = $this->input->post('discover');
        $contactforinquiry = $this->input->post('contactforinquiry');
        $adres = $this->input->post('adres');
        $contactnumber = $this->input->post('contactnumber');
        $social = $this->input->post('social');
        $getintouch = $this->input->post('getintouch');
        $moreabout = $this->input->post('moreabout');
        $compostable = $this->input->post('compostable');
        $papercup = $this->input->post('papercup');
        $findoutmore = $this->input->post('findoutmore');
        $productsize = $this->input->post('productsize');
        $details = $this->input->post('details');
        $contactus = $this->input->post('contactus');
        $allrightsreserved = $this->input->post('allrightsreserved');
        $contactinfo = $this->input->post('contactinfo');
        $contactform = $this->input->post('contactform');
        $name = $this->input->post('name');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $ihaveread = $this->input->post('ihaveread');
        $selcup = $this->input->post('selcup');
        $cupsize = $this->input->post('cupsize');
        $capacity = $this->input->post('capacity');
        $product_code = $this->input->post('product_code');
        $height = $this->input->post('height');
        $brim_diameter = $this->input->post('brim_diameter');
        $pack_quantity = $this->input->post('pack_quantity');
        $case_quantity = $this->input->post('case_quantity');
        $specification = $this->input->post('specification');
        $usage_place = $this->input->post('usage_place');
    
        $insert = array(
                'discover' => $discover,
                'contactforinquiry' => $contactforinquiry,
                'adres' => $adres,
                'contactnumber' => $contactnumber,
                'social' => $social,
                'getintouch' => $getintouch,
                'moreabout' => $moreabout,
                'compostable' => $compostable,
                'papercup' => $papercup,
                'findoutmore' => $findoutmore,
                'productsize' => $productsize,
                'details' => $details,
                'contactus' => $contactus,
                'allrightsreserved' => $allrightsreserved,
                'contactinfo' => $contactinfo,
                'contactform' => $contactform,
                'name' => $name,
                'subject' => $subject,
                'message' => $message,
                'ihaveread' => $ihaveread,
                'selcup' => $selcup,
                'cupsize' => $cupsize,
                'capacity' => $capacity,
                'product_code' => $product_code,
                'height' => $height,
                'brim_diameter' => $brim_diameter,
                'pack_quantity' => $pack_quantity,
                'case_quantity' => $case_quantity,
                'specification' => $specification,
                'usage_place' => $usage_place,
        );
        $this->db->insert($this->table, $insert);
    }

    function FindContent($id){

        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();

    }

    function UpdateContent($id){

        $discover = $this->input->post('discover');
        $contactforinquiry = $this->input->post('contactforinquiry');
        $adres = $this->input->post('adres');
        $contactnumber = $this->input->post('contactnumber');
        $social = $this->input->post('social');
        $getintouch = $this->input->post('getintouch');
        $moreabout = $this->input->post('moreabout');
        $compostable = $this->input->post('compostable');
        $papercup = $this->input->post('papercup');
        $findoutmore = $this->input->post('findoutmore');
        $productsize = $this->input->post('productsize');
        $details = $this->input->post('details');
        $contactus = $this->input->post('contactus');
        $allrightsreserved = $this->input->post('allrightsreserved');
        $contactinfo = $this->input->post('contactinfo');
        $contactform = $this->input->post('contactform');
        $name = $this->input->post('name');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $ihaveread = $this->input->post('ihaveread');
        $selcup = $this->input->post('selcup');
        $cupsize = $this->input->post('cupsize');
        $capacity = $this->input->post('capacity');
        $product_code = $this->input->post('product_code');
        $height = $this->input->post('height');
        $brim_diameter = $this->input->post('brim_diameter');
        $pack_quantity = $this->input->post('pack_quantity');
        $case_quantity = $this->input->post('case_quantity');
        $specification = $this->input->post('specification');
        $usage_place = $this->input->post('usage_place');
        
        

         $edit = array(
                'discover' => $discover,
                'contactforinquiry' => $contactforinquiry,
                'adres' => $adres,
                'contactnumber' => $contactnumber,
                'social' => $social,
                'getintouch' => $getintouch,
                'moreabout' => $moreabout,
                'compostable' => $compostable,
                'papercup' => $papercup,
                'findoutmore' => $findoutmore,
                'productsize' => $productsize,
                'details' => $details,
                'contactus' => $contactus,
                'allrightsreserved' => $allrightsreserved,
                'contactinfo' => $contactinfo,
                'contactform' => $contactform,
                'name' => $name,
                'subject' => $subject,
                'message' => $message,
                'ihaveread' => $ihaveread,
                'selcup' => $selcup,
                'cupsize' => $cupsize,
                'capacity' => $capacity,
                'product_code' => $product_code,
                'height' => $height,
                'brim_diameter' => $brim_diameter,
                'pack_quantity' => $pack_quantity,
                'case_quantity' => $case_quantity,
                'specification' => $specification,
                'usage_place' => $usage_place
        );	
       
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);

    }

    function ListDelete($ID)
    {
        foreach($ID as $DeleteID){
            $this->db->delete($this->table, array('id' => $DeleteID));
        }
    }

}
?>