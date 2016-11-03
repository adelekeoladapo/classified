<?php

class MY_Upload extends CI_Upload {
    
    function uploadImage($form_file_name){
        $result = new stdClass();
        $config['upload_path'] = 'assets/images/uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG';
        $config['max_size'] = 1024;
        $this->initialize($config);
        
        if ( ! $this->do_upload($form_file_name)){
                $result->status = false;
                $result->message = $this->display_errors();
        }else{
                $data = $this->data();
                $result->status = true;
                $result->message = $data;
        }
        return $result;
    }
    
}
