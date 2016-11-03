<?php

class UserModel extends CI_Model {
    
    function insertUser($user){
        $this->db->insert('user', $user);
        return $this->db->insert_id();
    }
    
    function getUsers(){
        $this->db->select('*');
        $query = $this->db->get('v_user');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getUser($id){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('v_user');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getUser1($id){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getUserByEmail($email){
        $this->db->select('*');
        $this->db->where('user_email', $email);
        $query = $this->db->get('user');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    /*
     * Activate Account
     */
    function updateUser($id, $user){
        $this->db->where('user_id', $id);
        return $this->db->update('user', $user);
    }
    
    /*
     * Log user in
     */
    function login($username, $password){
        $this->db->select('user_id');
        $this->db->where(array('user_username' => $username, 'user_password' => $password));
        $query = $this->db->get('user');
        if($query->num_rows()){
            $userID = $query->row()->user_id;
            $this->setSession($userID);
            $this->updateLastLoggedIn($userID);
            return $userID;
        }else{
            return false;
        }
    }
    
    /*
     * Set user session
     */
    function setSession($userID){
        $user = $this->getUser($userID);
        $data = array(
                'user_id' => $user->user_id,
                'user_firstname' => $user->user_firstname,
                'user_lastname' => $user->user_lastname,
                'user_email' => $user->user_email,
                'user_phone' => $user->user_phone,
                'user_date_last_lodded_in' => $user->user_date_last_logged_in,
                'user_location_id' => $user->user_location_id,
                'logged_in' => TRUE
        );
        $this->session->set_userdata($data);
    }
    
    /*
     * Update last logged in
     */
    function updateLastLoggedIn($userID){
        $this->db->where('user_id', $userID);
        $data = array('user_date_last_logged_in' => $this->penguin->getTime());
        $this->db->update('user', $data);
    }
    
    /*
     * Get user's account type
     */
    function getAccountType($user_id){
        $this->db->select('user_account_type');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        return ($query->num_rows()) ? $query->row()->user_account_type : null;
    }

    function getUserStatus($user_id){
        $this->db->select('user_status');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        return ($query->num_rows()) ? $query->row()->user_status : null;
    }
    
    function changePassword($user_id, $new_password){
        $this->db->where('user_id', $user_id);
        return $this->db->update('user', array('user_password' => $new_password));
    }
    
    function confirmEmail($email){
        $this->db->select('user_id');
        $this->db->where('user_email', $email);
        $query = $this->db->get('user');
        return ($query->row_nums()) ? true : false;
    }
    
    function confirmPassword($user_id, $password){
        $this->db->select('user_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('user_password', $password);
        $query = $this->db->get('user');
        return ($query->num_rows()) ? true : false;
    }
    
    function redirect_if_not_logged_in(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }
    }
    
    function updateAccoutType($user_id, $new_type){
        $data = array('user_account_type'=> $new_type);
        $this->db->where('user_id', $user_id);
        return $this->db->update('user', $data); echo 'Account updated';
    }

    function UpdateUserStatus($user_id, $new_status){
        $data = array('user_status'=> $new_status);
        $this->db->where('user_id', $user_id);
        return $this->db->update('user', $data);
    }

    function premiumExist(){
        $this->db->where('user_account_type', 2);
        $query = $this->db->get('v_user');
        return ($query->num_rows()) ? true : false;
    }
}
