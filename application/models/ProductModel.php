<?php

class ProductModel extends CI_Model {
    
    function insertProduct($product){
        $this->db->insert('product', $product);
        return $this->db->insert_id();
    }
    
    function getProduct($id){
        $this->db->select('*');
        $this->db->where('product_id', $id);
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getProducts(){
        $this->db->select('*');
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getProductCount(){
        $this->db->select('*');
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->num_rows() : 0;
    }
    
    function getSomeProducts($limit, $offset, $sort = FALSE){
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        
        if($sort){
            $this->db->order_by($sort, 'DESCR');
        }
        
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->result() : null;
    }
    
    function getPrimaryImage($product_id){
        $this->db->select('image_name');
        $this->db->where('image_product_id', $product_id);
        $query = $this->db->get('image');
        return ($query->num_rows()) ? $query->row()->image_name : null;
    }
    
    function getProductWithSlugAndID($id, $slug){
        $this->db->select("*");
        $this->db->where(array('product_id' => $id, 'product_slug' => $slug));
        $query = $this->db->get("v_product");
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getProductImages($product_id){
        $this->db->select("image_name");
        $this->db->where('image_product_id', $product_id);
        $query = $this->db->get('image');
        return ($query->num_rows()) ? $query->result() : null;
    }
    
    function getCategoryAds($id, $slug){
        $this->db->select("*");
        $this->db->where(array('category_parent_id' => $id));
        $query = $this->db->get("v_product");
        return ($query->num_rows()) ? $query->result() : null;
    }
    
    function getUserProducts($user_id){
        $this->db->select('*');
        $this->db->where('product_user_id', $user_id);
        $query = $this->db->get("v_product");
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function updateProduct($product_id, $product){
        $this->db->where('product_id', $product_id);
        return $this->db->update('product', $product);
    }
    
    function deleteProduct($id){
        $this->db->where('product_id', $id);
        $data = array('product_deleted' => 1);
        return $this->db->update('product', $data);
    }
    
    function getUserProductCount($user_id){
        $this->db->select('product_id');
        $this->db->where('product_user_id', $user_id);
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->num_rows() : 0;
    }
    
    function updateViews($product_id){
        $this->db->query('CALL updateProductView('.$product_id.')');
    }
    
    function getMostViewedProducts(){
        $this->db->select('*');
        $this->db->order_by('product_views', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getLeastViewedProducts(){
        $this->db->select('*');
        $this->db->order_by('product_views', 'ASC');
        $this->db->limit(5);
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getPremiumProducts(){
        $this->db->select('*');
        $this->db->order_by('product_views', 'ASC');
        $this->db->limit(5);
        $query = $this->db->get('v_product');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
}
