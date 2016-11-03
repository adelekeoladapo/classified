<?php

class CountryModel extends CI_Model{
    
    function insertCountry($country){
        $this->db->insert('country', $country);
        return $this->db->insert_id();
    }
    
    function getCountry($id){
        $this->db->select('*');
        $this->db->where('country_id', $id);
        $query = $this->db->get('country');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getCountries(){
        $this->db->select('*');
        $query = $this->db->get('country');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
}
