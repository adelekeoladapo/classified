<?php

class VisitModel extends CI_Model {
    
    function insertVisit($visit){
        $this->db->insert('visit', $visit);
        return $this->db->insert_id();
    }
    
    function getVisit($id){
        $this->db->select('*');
        $this->db->where('visit_id', $id);
        $query = $this->db->get('visit');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
}
