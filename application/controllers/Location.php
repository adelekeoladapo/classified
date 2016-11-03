<?php

class Location extends CI_Controller {
    
    private $model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('LocationModel');
        $this->model = new LocationModel();
    }
    
    /** Add Country **/
    function addCountry(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->insertCountry($data);
    }
    
    /** Add State **/
    function addState(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->insertState($data);
    }
    
    /** Get Countries **/
    function getCountries(){
        echo json_encode($this->model->getCountries());
    }
    
    /** Get States **/
    function getStates(){
        echo json_encode($this->model->getStates());
    }
    
    /** Update Country **/
    function updateCountry(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->updateCountry($data);
    }
    
    /** Update State **/
    function updateState(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        echo $this->model->updateState($data);
    }
    
}
