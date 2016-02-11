<?php
/**
 * Created by PhpStorm.
 * User: jox-MAC
 * Date: 2016-02-07
 * Time: 9:33 PM
 */
class Player extends CI_Model {

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array of all of the players in the database
     */
    public function getPlayers() {
        $query = $this->db->get('players');
        return $query->result_array();
    }

    public function getPlayerInfo($name){
        // Query gets player with specific name
        $this->db->select('*');
        $this->db->from('players');
        $this->db->where('Player', $name);
        $query = $this->db->get();
        return $query->result_array();
    }

}