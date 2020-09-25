<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyAdminImages {

    public function SetCover($data,$result = "")
    {
        if($data != "null" AND !empty($data)):
            $images = json_decode($data, true);
            foreach ($images as $key => $value):
                if($value["status"] == 1):
                    $result = base_url().'uploads/'.$value["image"];
                endif;
            endforeach;
            if(empty($result)):
                $result = base_url().'uploads/'.$images[0]["image"];
            endif;
        else:
           $result = "https://placehold.it/100?text=No Image";
        endif;
        return $result;
    }

    public function images_empty_filter($images)
    {
        $result = array();
        foreach ($images as $image):
            if(!empty($image["image"])):
                $result[] = $image;
            endif;
        endforeach;
        if(empty($result)):
            unset($result);
        else:
            $result = $result;
        endif;
        return $result;
    }

    public function files_empty_filter($images)
    {
        $result = array();
        foreach ($images as $image):
            if(!empty($image["file"])):
                $result[] = $image;
            endif;
        endforeach;
        if(empty($result)):
            unset($result);
        else:
            $result = $result;
        endif;
        return $result;
    }
}