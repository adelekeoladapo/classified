<?php

class AdminModel extends CI_Model {
    
    function insertAdmin($admin){
        $this->db->insert('admin', $admin);
        return $this->db->insert_id();
    }
    
    function getAdmin($id){
        $this->db->select('*');
        $this->db->where('admin_id', $id);
        $query = $this->db->get('admin');
        return ($query->num_rows()) ? $query->row() : null;
    }

    function getAdmins(){
        $this->db->select('*');
        $query = $this->db->get('admin');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function doLogin($username, $password){
        $this->db->select('*');
        $this->db->where(array('admin_username' => $username, 'admin_password' => $password));
        $query = $this->db->get('admin');
        if($query->num_rows()){
            $id = $query->row()->admin_id;
            $this->setSession($id);
            return $id;
        }else{
            return false;
        }
    }
    
    function setSession($adminID){
        $admin = $this->getAdmin($adminID);
        $data = array(
                'admin_id' => $admin->admin_id,
                'admin_logged_in' => TRUE
        );
        $this->session->set_userdata($data);
    }

    /*
     * Update last logged in
     */
    function updateLastLoggedIn($admin_id){
        $this->db->where('admin_id', $admin_id);
        $data = array('admin_last_loged_in' => $this->penguin->getTime());
        $this->db->update('admin', $data);
    }

    
}
