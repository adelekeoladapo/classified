<?php

class Category extends CI_Controller {
    
    private $model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('CategoryModel');
        $this->model = new CategoryModel();
    }
    
    function getSubCategories(){
        $parentID = $this->input->post('parent-id');
        echo json_encode($this->model->getSubCategories($parentID));
    }
    
    /** Get Categories **/
    function getCategories(){
        echo json_encode($this->model->getCategories());
    }
    
    /** Add Category **/
    function addCategory(){
        $data = new stdClass();
        $data->category_name = $this->input->post('category_name');
        $data->category_slug = $this->penguin->getSlug($data->category_name);
        
        $image = $this->upload->uploadImage('category_image');
        
        if($image->status){
            $data->category_image = $image->message['file_name'];
        }elseif(!$image->status && $image->message == "<p>You did not select a file to upload.</p>"){
            
        }else{
            echo json_encode($image);
            return;
        }
        $this->model->insertCategory($data);
        echo json_encode(array('status'=> true, 'message'=> 'Category Successfully Inserted'));
    }
    
    /** Add Sub Category **/
    function addSubCategory(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        $data->category_slug = $this->penguin->getSlug($data->category_name);
        echo $this->model->insertCategory($data);
    }
	
    
    /** Update Category **/
    function updateCategory(){
//        $data = new stdClass();
//        $data = json_decode(file_get_contents('php://input'));
//        $data->category_slug = $this->penguin->getSlug($data->category_name);
//        echo $this->model->updateCategory($data);
        
        $data = new stdClass();
        $data->category_id = $this->input->post('category_id');
        $data->category_name = $this->input->post('category_name');
        $data->category_slug = $this->penguin->getSlug($data->category_name);
        
        $image = $this->upload->uploadImage('category_image');
        if($image->status){
            $data->category_image = $image->message['file_name'];
        }elseif(!$image->status && $image->message == "<p>You did not select a file to upload.</p>"){
            
        }else{
            echo json_encode($image);
            return;
        }
        $this->model->updateCategory($data);
        echo json_encode(array('status'=> true, 'message'=> 'Category Successfully Updated'));
        
    }
    
}
