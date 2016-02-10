<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {


    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['players'] = $this->getPlayers();  // When the page loads, list all players in db
        $this->data['pagebody'] = 'players';	// this is the view we want shown
        $this->render();
    }

    /**
     * @return array of all of the players in the database
     */
    public function getPlayers() {
        $query = $this->db->get('players');
        return $query->result_array();
    }

    /**
     * @param $name Takes a name and returns a view with that player's profile
     */
    public function getPlayerInfo($name) {
        // Query gets player with specific name
        $this->db->select('*');
        $this->db->from('players');
        $this->db->where('Player', $name);
        $query = $this->db->get();

        $this->data['playerprofile'] = $query->result_array();
        $this->data['pagebody'] = 'playerprofile';	// this is the view we want shown
        $this->render();
    }

    public function getMovesments() {

    }
}
