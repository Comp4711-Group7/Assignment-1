<?php

class Users extends MY_Model {
  public function __construct() {
    parent::__construct('users', 'id');
  }
  
  public function getUserByUserName($username){
      $this->db->where('username', $username);
      $this->db->from('users');
      $query = $this->db->get();
        if ($query->num_rows() < 1)
            return null;
        return $query->row();
  }
}