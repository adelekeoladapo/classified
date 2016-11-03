<?php

class MiscModel extends CI_Model {
    
    function scrample($len){
        $pwd = '';
        //$d = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
        $d = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9');
        for($i = 0; $i <= $len; $i++){
            $pwd .= $d[mt_rand(0, count($d)-1)];
        }
        return $pwd;
    }
    
    function tableHasID($table, $column, $id){
        $this->db->select('*');
        $this->db->where($column, $id);
        $query = $this->db->get($table);
        return ($query->row()) ? true : false;
    }
    
    function generateID($prefix, $table, $column, $len){
        $id = $prefix.''.$this->scrample($len);
        if($this->tableHasID($table, $column, $id)){
            return $this->generateID($table, $column);
        }
        return $id;
    }
    
}
