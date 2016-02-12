<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends Application {


    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('player');
        $this->data['players'] = $this->player->getPlayers();  // When the page loads, list all players in db
        $this->data['pagebody'] = 'players';	// this is the view we want shown
        $this->data['title'] = 'Player\'s List';
        $this->render();
    }

//    /**
//     * @return array of all of the players in the database
//     */
//    public function getPlayers() {
//        $query = $this->db->get('players');
//        return $query->result_array();
//    }

    /**
     * @param $name Takes a name and returns a view with that player's profile
     */
    public function getPlayerInfo($name) {
        $this->load->model('player');

        $this->data['playerprofile']  = $this->player->getPlayerInfo($name);
        $this->data['playerholdings'] = $this->player->getPlayerHoldings($name);
        $this->load->helper('form');

        $this->data['pagebody'] = 'playerprofile';	// this is the view we want shown
        $js = 'id="shirts" onChange="nameChange(this.value);"';
        $this->data['playerdropdown'] = form_dropdown('player',$this->player->getPlayerNames(), $name, $js);
        $this->data['playerprofile'] = $this->player->getPlayerTransaction($name);
        //$this->data['playersholding'] = $this->player->getPlayerTransaction($name);
        $this->data['user'] = $name;
        $this->data['title'] = 'Player\'s List';
        $this->render();
    }

    public function getMovements() {

    }
}
