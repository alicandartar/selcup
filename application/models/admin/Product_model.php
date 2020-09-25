<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Product_model extends CI_Model
{

    private $table = 'cups_size';

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

    function SetContent($images)
    {
        $size = $this->input->post('size');
        $capacity = $this->input->post('capacity');
        $product_code = $this->input->post('product_code');
        $height = $this->input->post('height');
        $brim_diameter = $this->input->post('brim_diameter');
        $pack_quantity = $this->input->post('pack_quantity');
        $case_quantity = $this->input->post('case_quantity');
        $specification = $this->input->post('specification');
        $images = 'uploads/'.$this->input->post('cover');
        $images2 = 'uploads/'.$this->input->post('cover1');
        $catalog = 'uploads/'.$this->input->post('cover3');
        $not = $this->input->post('not');
        $not2 = $this->input->post('not2');
        $status = $this->input->post('status');
        $status2 = $this->input->post('status2');
        $cup_name_id = $this->input->post('cupname');
        
        
        $insert = array(
            'name' => $size,
            'capacity' =>$capacity,
            'product_code' => $product_code,
            'height'=> $height,
            'brim_diameter'=> $brim_diameter,
            'pack_quantity'=> $pack_quantity,
            'case_quantity'=> $case_quantity,
            'specification'=> $specification,
            'usage_place'  => $images,
            'usage_place2' => $images2,
            'content'      => $not,
            'content2'     => $not2,
            'status'       => $status,
            'status2'      => $status2,
            'catalog'      => $catalog,
            'cup_name_id'  => $cup_name_id,
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id,$images)
    {
        $size = $this->input->post('size');
        $capacity = $this->input->post('capacity');
        $product_code = $this->input->post('product_code');
        $height = $this->input->post('height');
        $brim_diameter = $this->input->post('brim_diameter');
        $pack_quantity = $this->input->post('pack_quantity');
        $case_quantity = $this->input->post('case_quantity');
        $specification = $this->input->post('specification');
        $usage_place = $this->input->post('cover1');
        $usage_place2 = $this->input->post('cover2');
        $catalog = $this->input->post('cover3');
        $not = $this->input->post('not');
        $not2 = $this->input->post('not2');
        $cup_name_id = $this->input->post('cupname');
        $images = $this->input->post('cover');
        $status = $this->input->post('status');
        $status2 = $this->input->post('status2');
        
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
        if(substr($usage_place, 0,8) != 'uploads/'){
            $usage_place = 'uploads/'.$usage_place;
        }
        if(substr($usage_place2, 0,8) != 'uploads/'){
            $usage_place2 = 'uploads/'.$usage_place2;
        }
        if(substr($catalog, 0,8) != 'uploads/'){
            $catalog = 'uploads/'.$catalog;
        }

        $edit = array(
            'name' => $size,
            'capacity' =>$capacity,
            'product_code' => $product_code,
            'height'       => $height,
            'brim_diameter'=> $brim_diameter,
            'pack_quantity'=> $pack_quantity,
            'case_quantity'=> $case_quantity,
            'specification'=> $specification,
            'usage_place'  => $usage_place,
            'usage_place2' => $usage_place2,
            'content'      => $not,
            'content2'     => $not2,
            'status'       => $status,
            'status2'      => $status2,
            'catalog'      => $catalog,
            'cup_name_id'  => $cup_name_id,
        );

        $edit2 = array(
            'image' => $images
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);

        $this->db->where('id', $cup_name_id);
        $this->db->update('cups_name', $edit2);

        $this->db->where('sub_menu_state', $cup_name_id);
        $this->db->update('sub_menu', $edit2);
    }
    
}
?>