<?php

class Admin extends CI_Controller {
    
    private $model;
    
    private $user_model;
    
    private $product_model;
    
    private $category_model;
    
    private $location_model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->model = new AdminModel();
        $this->load->model('UserModel');
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $this->load->model('LocationModel');
        $this->user_model = new UserModel();
        $this->product_model = new ProductModel();
        $this->category_model = new CategoryModel();
        $this->location_model = new LocationModel();
    }
            
    function index(){
        if(!$this->session->admin_logged_in){
            redirect(base_url()."admin/login");
        }
        $this->load->view('admin/home');
    }
    
    function login(){
        $data['error'] = '';
        $this->load->view('admin/login', $data);
    }
    
    function doLogin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $id = $this->model->doLogin($username, $this->encrypt->encode_password($password));
        if($id){
            $this->model->updateLastLoggedIn($id);
            redirect(base_url()."admin#/dashboard");
        }else{
            $data['error'] = 'Invalid username and/or password';
            $this->load->view('admin/login', $data);
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url()."admin/login");
    }
    
    function init(){
        $data['users'] = $this->user_model->getUsers();
        $data['products'] = $this->product_model->getProducts();
        $data['categories'] = $this->category_model->getCategories();
        $data['countries'] = $this->location_model->getCountries();
        $data['states'] = $this->location_model->getStates();
        
        echo json_encode($data);
    }

    function getAdmins(){
        echo json_encode($this->model->getAdmins());
    }

    function getAdmin(){
        $admin_id = $this->input->post('admin-id');
        echo json_encode($this->model->getAdmin($admin_id));
    }

    function insertAdmin(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        $data->admin_date_added = $this->penguin->getTime();
        $data->admin_password = $this->encrypt->encode_password($data->admin_password);


        echo $this->model->insertAdmin($data);
    }
    
}
