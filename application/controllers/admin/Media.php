<?php

class Media extends CI_Controller {
    
    private $model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('MediaModel');
        $this->model = new MediaModel();
    }
    
    function addMedia(){
        $upload = $this->upload->uploadImage('photo');
        if($upload->status){
            $data = $upload->message;
            $media = new stdClass();
            $media->Name = $data['file_name'];
            $media->Type = $data['image_type'];
            $media->Size = $data['file_size'];
            $media->Dimension = $data['image_width']." x ".$data['image_height'];
            $media->Url = $data['full_path'];
            $media->Title = $data['raw_name'];
            $media->Caption = "";
            $media->AdminID = 1;
            $media->DateCreated = $this->penguin->getTime();
            $this->model->insertMedia($media);
            $d = array('status' => true, 'message' => $media->Name);
            echo json_encode($d);
        }else{
            $d = array('status' => false, 'message' => $upload->message);
            echo json_encode($d);
        }
    }
    
}
