<?php

class ImageModel extends CI_Model {
    
    function insertImage($image){
        $this->db->insert('image', $image);
        return $this->db->insert_id();
    }
    
    function getImage($id){
        $this->db->select('*');
        $this->db->where('image_id', $id);
        $query = $this->db->get('image');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
}
