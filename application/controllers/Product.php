<?php

class Product extends CI_Controller {
    
    private $model;
    private $categoryModel;
    private $user_model;
    private $advert_model;
            
    function __construct() {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $this->load->model('UserModel');
        $this->load->model('AdvertModel');
        $this->load->model('LocationModel');
        $this->model = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->user_model = new UserModel();
        $this->advert_model = new AdvertModel();
    }
    
    /*
     * Post Ad
     */
    function postAd(){
        $data['base_categories'] = $this->categoryModel->getBaseCategories();
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="ci-error help-block smk-error-msg">', '</div>');

        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('sub-category', 'Sub Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        //$this->form_validation->set_rules('price', 'Price', 'trim|required');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('post-ad', $data);
        }else{
            $product = new stdClass();
            $product->product_name = $this->input->post('title');
            $product->product_description = $this->input->post('description');
            $product->product_price = $this->input->post('price');
            $product->product_slug = $this->penguin->getSlug($product->product_name);
            $product->product_user_id = $this->session->user_id;
            $product->product_date_posted = $this->penguin->getTime();
            $product->product_location_id = $this->session->user_location_id;
            
            $category = $this->input->post('category');
            $sub_category = $this->input->post('sub-category');
            $product->product_category_id = ($sub_category) ? $sub_category : $category;
            
            $product_id = $this->model->insertProduct($product);
            
            $this->uploadProductImage($product_id, 'photo-1');
            $this->uploadProductImage($product_id, 'photo-2');
            $this->uploadProductImage($product_id, 'photo-3');
            $this->uploadProductImage($product_id, 'photo-4');
            
            redirect(base_url()."ad-posted-successfully");
        }
        
    }
    
    function uploadProductImage($product_id, $image_name){
        $this->load->model('ImageModel');
        $image_model = new ImageModel();
        
        $upload = $this->upload->uploadImage($image_name);
        if($upload->status){
            $data = $upload->message;
            $media = new stdClass();
            $media->image_name = $data['file_name'];
            $media->image_type = $data['image_type'];
            $media->image_size = $data['file_size'];
            $media->image_dimension = $data['image_width']." x ".$data['image_height'];
            $media->image_url = $data['full_path'];
            $media->image_title = $data['raw_name'];
            $media->image_caption = "";
            $media->image_product_id = $product_id;
            $media->image_date_created = $this->penguin->getTime();
            $image_model->insertImage($media);
            $d = array('status' => true, 'message' => $media->image_name);
            return json_encode($d);
        }else{
            $d = array('status' => false, 'message' => $upload->message);
            return json_encode($d);
        }
    }
    
    /*
     * View product
     */
    function viewAd($slug_id){
        $query = $this->penguin->prepareSlug($slug_id);
        $product = $this->model->getProductWithSlugAndID($query->id, $query->slug);
        if(!$product){
            show_404();
            exit();
        }
        $data['product_images'] = $this->model->getProductImages($product->product_id);
        $data['product'] = $product;
        $data['category'] = $this->categoryModel->getCategory($product->category_parent_id);
        $data['seller'] = $this->user_model->getUser($product->product_user_id);
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        
        if(!($product->product_user_id == $this->session->user_id)){
            $this->model->updateViews($query->id);
        }
        
        $this->load->view('product', $data);
    }
    
    /*
     * Show Ads in a Category
     */
    function viewCategoryAds($slug_id){
        $query = $this->penguin->prepareSlug($slug_id);
        $data['products'] = $this->model->getCategoryAds($query->id, $query->slug);
        $data['category_name'] = $this->categoryModel->getCategory($query->id)->category_name;
        $data['base_categories'] = $this->categoryModel->getBaseCategories();
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        $this->load->view('ads', $data);
    }
    
    /** Update Ad **/
    function updateAd(){
        $id = $this->input->post('product-id');
        
        $product = new stdClass();
        $product->product_name = $this->input->post('title');
        $product->product_description = $this->input->post('description');
        $product->product_price = $this->input->post('price');
        $product->product_slug = $this->penguin->getSlug($product->product_name);
        $product->product_user_id = $this->session->user_id;

        $category = $this->input->post('category');
        $sub_category = $this->input->post('sub-category');
        $product->product_category_id = ($sub_category) ? $sub_category : $category;

        $this->model->updateProduct($id, $product);
        echo 'done';
    }
    
    /** Get Products **/
    function getProducts(){
        echo json_encode($this->model->getProducts());
    }
    
    /** Get Product **/
    function getProduct(){
        $id = $this->input->post('product-id');
        echo json_encode($this->model->getProduct($id));
    }
    
    /** Get Product Images **/
    function getProductImages(){
        $product_id = $this->input->post('product-id');
        echo json_encode($this->model->getProductImages($product_id));
    }
    
    /** Get Most Viewed **/
    function getMostViewed(){
        echo json_encode($this->model->getMostViewedProducts());
    }
    
    /** Get Least Viewed **/
    function getLeastViewed(){
        echo json_encode($this->model->getLeastViewedProducts());
    }

    /** Delete Product **/
    function deleteProduct(){
        $product_id = $this->input->post('product-id');
        $this->model->deleteProduct($product_id);
    }
    
}








