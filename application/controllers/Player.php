<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {


    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['players'] = $this->getPlayers();
        $this->data['pagebody'] = 'players';	// this is the view we want shown
        $this->render();
    }

    public function getPlayers() {
        $query = $this->db->get('players');

        //foreach ($query->result() as $row)
        //{
        //    echo $row->Player;
        //}

        return $query->result_array();
    }

    public function getPlayerInfo($name) {
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
