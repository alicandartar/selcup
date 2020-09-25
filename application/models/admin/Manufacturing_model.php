<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Manufacturing_model extends CI_Model
{

    private $table = 'manufacturing_process';

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
        $title = $this->input->post('title');
        //$section_name = $this->input->post('section_name');
        $sequence = $this->input->post('sequence');
        $images = 'uploads/'.$this->input->post('cover');;
        
        $insert = array(
            'title' => $title,
            'image' => $images,
            'section_name' => "Manufacturing Process",
            'sequence' => $sequence,
        );
        $this->db->insert($this->table, $insert);
    }

    function UpdateContent($id,$images)
    {
        $title = $this->input->post('title');
        $section_name = "Manufacturing Process";
        $sequence = $this->input->post('sequence');
        $images = $this->input->post('cover');;
        if(substr($images, 0,8) != 'uploads/'){
            $images = 'uploads/'.$images;
        }
        $edit = array(
            'title' => $title,
            'image' => $images,
            'section_name' => $section_name,
            'sequence' => $sequence,
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $edit);
    }
    
    function CreateSlug($Slug, $ID = NULL)
    {
        if($ID == NULL){
            $Query = $this->db->where('slug', $Slug)->get($this->table);
            $ResultNum = $Query->num_rows();
            if($ResultNum > 0){
                $LastCharacter = substr($Slug,-1);
                if(ctype_digit($LastCharacter)){
                    $LastCharacter = (int)$LastCharacter + 1;
                    $Slug = substr($Slug,0,-1).$LastCharacter;
                    $Slug = $this->CreateSlug($Slug);
                }else{
                    $Slug = $Slug.'-1';
                    $Slug = $this->CreateSlug($Slug);
                }
            }
        }else{
            $Query = $this->db->where('slug', $Slug)->where('id !=',$ID)->get($this->table);
            $ResultSlug = $Query->result();
            $ResultNum = $Query->num_rows();
            if($ResultNum > 0)
            {
                $LastCharacter = substr($ResultSlug->Slug,-1);
                if(ctype_digit($LastCharacter))
                {
                    $LastCharacter = (int)$LastCharacter + 1;
                    $Slug = substr($Slug,0,-1).$LastCharacter;
                    $this->CreateSlug($Slug,$ID);
                }else{
                    $Slug = $Slug.'-1';
                    $Slug = $this->CreateSlug($Slug,$ID);
                }
            }
        }
        return $Slug;
    }
}
?>