<?php

class User extends MY_Model
{
    public function __construct()
    {
        parent::__construct('users', 'id');
    }

    public function getUserByUserName($username)
    {
        $this->db->where('username', $username);
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }
    public function register($username, $filetype){
        $data = array  (
                    'username' => $this-> input -> post('username'),
                    'avatar' => $username . "." . $filetype,
                    'password' => password_hash($this -> input -> post('password'), PASSWORD_DEFAULT),
                    'role' => 'player'
	        );
	$this -> db -> insert('users', $data);
        
    }
}