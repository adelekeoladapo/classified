<?php

class LocationModel extends CI_Model {
    
    function insertLocation($location){
        $this->db->insert('location', $location);
        return $this->db->insert_id();
    }
    
    function getLocation($id){
        $this->db->select('*');
        $this->db->where('location_id', $id);
        $query = $this->db->get('location');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getCountryStates($country_id){
        $this->db->select('*');
        $this->db->where('state_country_id', $country_id);
        $query = $this->db->get('state');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function insertCountry($country){
        $this->db->insert('country', $country);
        return $this->db->insert_id();
    }
    
    function insertState($state){
        $this->db->insert('state', $state);
        return $this->db->insert_id();
    }
    
    function getCountries(){
        $this->db->select('*');
        $query = $this->db->get('country');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getStates(){
        $this->db->select('*');
        $query = $this->db->get('state');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function updateCountry($country){
        $this->db->where('country_id', $country->country_id);
        return $this->db->update('country', $country);
    }
    
    function updateState($state){
        $this->db->where('state_id', $state->state_id);
        return $this->db->update('state', $state);
    }
    
}
