<?php

class State extends CI_Controller {
    
    private $model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('StateModel');
        $this->model = new StateModel();
    }
    
    function getCountryStates(){
        $countryID = $this->input->post('country-id');
        echo json_encode($this->model->getCountryStates($countryID));
    }
    
}
