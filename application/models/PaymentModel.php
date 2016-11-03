<?php

class PaymentModel extends CI_Model {
    
    function insertPayment($payment){
        $this->db->insert('payment', $payment);
        return $this->db->insert_id();
    }

    function getPayments(){
        $this->db->select('*');
        $query = $this->db->get('v_payment');
        return ($query->num_rows()) ? $query->result() : [];
    }

    function getUserPayments($user_id){
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('payment');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getPayment($id){
        $this->db->select('*');
        $this->db->where('payment_id', $id);
        $query = $this->db->get('v_payment');
        return ($query->num_rows()) ? $query->row() : null;
    }

    function getPayment2($transaction_id){
        $this->db->select('*');
        $this->db->where('transaction_id', $transaction_id);
        $query = $this->db->get('v_payment');
        return ($query->num_rows()) ? $query->row() : null;
    }

    function usePayment($payment_code){
        $data = array('used'=> 1, 'date_used'=> $this->penguin->getTime());
        $this->db->where('transaction_id', $payment_code);
        return $this->db->update('payment', $data);
    }
    
    
}
