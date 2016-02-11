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

}