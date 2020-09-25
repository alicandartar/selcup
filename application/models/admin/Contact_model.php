<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Contact_model extends CI_Model
{

    private $table = 'contact';

    function __construct()
    {
        parent::__construct();
    }
    
    function TotalContent()
    {
        return $this->db->get($this->table)->num_rows();
    }    
    
    function ListContent()
    {
        $query = $this->db->order_by('id','asc')->get($this->table);
        return $query->result();
    }

    function ListContentProduct(){
        return $this->db->get('cups_name')->result();
    }

    
    function FindContent($id)
    {
        $query = $this->db->where('id',$id)->get($this->table);
        return $query->row();
    }

    function ListDelete($ID)
    {
        foreach($ID as $DeleteID){
            $this->db->delete($this->table, array('id' => $DeleteID));
        }
    }

    function SetContent()
    {
        $address = $this->input->post('address');
        $hidden = $this->input->post('hidden');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');                
        
        $insert = array(
            'address' => $address,
            'hidden_address' =>$hidden,
            'phone' => $phone,
            'mobile'=> $mobile,            
            'fax'=> $fax,
            'email'=> $email,            
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id)
    {
        $address = $this->input->post('address');
        $hidden = $this->input->post('hidden');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');      
        
        $edit = array(
            'address' => $address,
            'hidden_address' =>$hidden,
            'phone' => $phone,
            'mobile'=> $mobile,            
            'fax'=> $fax,
            'email'=> $email,   
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
        
    }
    
}
?>