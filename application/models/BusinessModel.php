<?php

class BusinessModel extends CI_Model {
    
    function insertBusiness($business){
        $this->db->insert('BUSINESS', $business);
        return $this->db->insert_id();
    }
    
    function getBusiness($id){
        $this->db->select('*');
        $this->db->where('business_id', $id);
        $query = $this->db->get('BUSINESS');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
}
