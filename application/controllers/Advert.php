<?php

class Advert extends CI_Controller {
    
    private $model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('AdvertModel');
        $this->model = new AdvertModel();
    }
    
    function getAdverts_1(){
        return $this->model->getAdverts();
    }
    
    /** Get Adverts **/
    function getAdverts(){
        echo json_encode($this->model->getAdverts());
    }
    
    /** Insert Advert **/
    function addAdvert(){
        $data = new stdClass();
        $data->advert_title = $this->input->post('advert_title');
        $data->advert_position = $this->input->post('advert_position');
        $data->advert_type = $this->input->post('advert_type');
        $data->advert_date_added = $this->penguin->getTime();
        
        if($data->advert_type == "Code"){
            $data->advert_content = $this->input->post('advert_content');
        }else{
            $image = $this->upload->uploadImage('advert_content');
            if($image->status){
                $data->advert_content = $image->message['file_name'];
            }else{
                echo json_encode($image);
                return;
            }
        }
        echo $this->model->insertAdvert($data);
    }
    
    /** Update Advert **/
    function updateAdvert(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->updateAdvert($advert);
    }
    
    /** Delete Advert **/
    function deleteAdvert(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->deleteAdvert($data->id);
    }
    
    /** Activate Advert **/
    function activateAdvert(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->activateAdvert($data->id);
    }
    
    /** deactivate Advert **/
    function deactivateAdvert(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->deactivateAdvert($data->id);
    }
    
}
