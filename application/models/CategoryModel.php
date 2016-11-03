<?php

class CategoryModel extends CI_Model {
    
    function insertCategory($category){
        $this->db->insert('category', $category);
        return $this->db->insert_id();
    }
    
    function getCategory($id){
        $this->db->select('*');
        $this->db->where('category_id', $id);
        $query = $this->db->get('category');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getCategories(){
        $this->db->select('*');
        $query = $this->db->get('category');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getBaseCategories(){
        $this->db->select('*');
        $this->db->where('category_parent_id', 0);
        $query = $this->db->get('category');
        return ($query->num_rows()) ? $query->result() : null;
    }
    
    function getSubCategories($parentID){
        $this->db->select('*');
        $this->db->where('category_parent_id', $parentID);
        $query = $this->db->get('category');
        return ($query->num_rows()) ? $query->result() : null;
    }
    
    function getParentCategory($parent_id){
        $this->db->select('category_name');
        $this->db->where('category_id', $parent_id);
        $query = $this->db->get('category');
        return ($query->num_rows()) ? $query->row()->category_name : null;
    }
    
    function getBaseCategoryProductCount($base_category_id){
        $this->db->select('product_id');
        $this->db->where('category_parent_id', $base_category_id);
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->num_rows() : 0;
    }
    
    function updateCategory($category){
        $this->db->where('category_id', $category->category_id);
        return $this->db->update('category', $category);
    }
    
}
