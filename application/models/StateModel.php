<?php

class StateModel extends CI_Model {
    
    function insertState($state){
        $this->db->insert('state', $state);
        return $this->db->insert_id();
    }
    
    function getState($id){
        $this->db->select('*');
        $this->db->where('state_id', $id);
        $query = $this->db->get('state');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getCountryStates($countryID){
        $this->db->select('*');
        $this->db->where('state_country_id', $countryID);
        $query = $this->db->get('state');
        return ($query->num_rows()) ? $query->result() : null;
    }
    
}
