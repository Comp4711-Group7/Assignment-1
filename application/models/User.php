<?php

class User extends MY_Model
{
    public function __construct()
    {
        parent::__construct('users', 'id');
    }

    /**
     * @return array of all of the users in the database
     * PORTED OVER, needs testing
     */
    public function getUsers() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 'player');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserNames(){
        $this->db->select('username')->from('users');
        $query = $this->db->get();
        $init_result = $query->result_array();
        $result = array();
        foreach($init_result as $value){
            foreach($value as $name)
                $result[$name] = $name;
        }
        return $result;
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

    /**
     * return array of specific user info
     * @param $name
     * @return mixed
     */
    public function getUserInfo($name){
        // Query gets user with specific name
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $name);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get the holdings of specific user
     * @param $name
     * @return mixed
     */
    public function getUserHoldings($name) {
        $this->db->select('*');
        $this->db->from('holdings');
        $this->db->where('player', $name);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * get the selected players transactions
     * @param $name
     * @return mixed
     */
    public function getUserTransaction($name){
        $this->db->select('*');
        $this->db->from('transactions');
        $this->db->where('player', $name);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * @param $username
     * @param $filetype
     */
    public function register($username, $filetype){
        $data = array  (
                    'username' => $this->input->post('username'),
                    'avatar' => $username . "." . $filetype,
                    'password' => password_hash($this -> input -> post('password'), PASSWORD_DEFAULT),
                    'role' => 'player'
	        );
	    $this->db->insert('users', $data);
    }

    /**
     * Save Current Holdings
     * @param $info
     */
    public function addToHoldings($info){

        $data = array(
            'token' => $info->token,
            'stock' => $info->stock,
            'player' => $this->session->userdata('username'),
            'quantity' => $info->amount
        );
        $this->db->insert('holdings', $data);

        $data = array(
            'Stock' => $info->stock,
            'DateTime' => $info->datetime,
            'Player' => $this->session->userdata('username'),
            'Trans' => 'buy',
            'Quantity' => $info->amount
        );
        $this->db->insert('transactions', $data);
    }

}