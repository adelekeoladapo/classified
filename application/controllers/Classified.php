<?php

class Classified extends CI_Controller {
    
    private $product_model;
    private $category_model;
    private $location_model;
    private $advert_model;
    private $user_model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $this->load->model('UserModel');
        $this->load->model('LocationModel');
        $this->load->model('AdvertModel');
        $this->product_model = new ProductModel();
        $this->category_model = new CategoryModel();
        $this->location_model = new LocationModel();
        $this->advert_model = new AdvertModel();
        $this->user_model = new UserModel();
    }
    
    function index($offset = FALSE){
        $no_of_products = $this->product_model->getProductCount();
        $config['base_url'] = base_url();
        $config['total_rows'] = $no_of_products;
        $config['per_page'] = 25;
        $config['full_tag_open'] = '<nav style="margin: auto"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['last_link'] = 'Last';
        $config['first_link'] = 'First';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        
        $sort = 'product_date_posted';//$this->input->get('order-by');
        
        $data['products'] = $this->product_model->getSomeProducts($config['per_page'], $offset, $sort);
        $data['no_of_product'] = $no_of_products;
        $data['pagination'] = $this->pagination->create_links();
        $data['base_categories'] = $this->category_model->getBaseCategories();
        
        /** Get States. Nigeria by default **/
        $data['states'] = $this->location_model->getCountryStates(1);
        
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        
        $data['premium_exist'] = $this->user_model->premiumExist();
        
        $this->load->view('home2', $data);
    }
    
    function view($page){
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        $this->load->view($page, $data);
    }
}
