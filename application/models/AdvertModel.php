<?php

class AdvertModel extends CI_Model {
    
    function insertAdvert($advert){
        $this->db->insert('advert', $advert);
        return $this->db->insert_id();
    }
    
    function getAdvert($id){
        $this->db->select('*');
        $this->db->where('advert_id', $id);
        $query = $this->db->get('advert');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getAdverts(){
        $this->db->select('*');
        $this->db->where('advert_deleted', 0);
        $query = $this->db->get('advert');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getActivatedAdverts(){
        $this->db->select('*');
        $this->db->where('advert_deleted', 0);
        $this->db->where('advert_activated', 1);
        $query = $this->db->get('advert');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function updateAdvert($advert){
        $this->db->where('advert_id', $advert->advert_id);
        return $this->db->update('advert', $advert);
    }
    
    function deleteAdvert($id){
        $this->db->where('advert_id', $id);
        return$this->db->update('advert', array('advert_deleted' => 1));
    }
    
    function activateAdvert($id){
        $this->db->where('advert_id', $id);
        return$this->db->update('advert', array('advert_activated' => 1));
    }
    
    function deactivateAdvert($id){
        $this->db->where('advert_id', $id);
        return$this->db->update('advert', array('advert_activated' => 0));
    }
    
}
