<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends Application {


    function __construct()
    {
        parent::__construct();
        $this->load->model('player');
    }

    public function index()
    {
        if($this->session->userdata('logged_in')){
            $this->getPlayerInfo($this->session->userdata['username']);
        }
    }

    /**
     * @param $name Takes a name and returns a view with that player's profile
     */
    public function getPlayerInfo($name) {


        $this->data['playerprofile']  = $this->player->getPlayerInfo($name);
        $this->data['playerholdings'] = $this->player->getPlayerHoldings($name);
        $this->load->helper('form');

        $this->data['pagebody'] = 'playerprofile';	// this is the view we want shown
        $js = 'id="shirts" onChange="nameChange(&quot;players&quot;,this.value);"';
        $this->data['playerdropdown'] = form_dropdown('player',$this->player->getPlayerNames(), $name, $js);
        $this->data['playerprofile'] = $this->player->getPlayerTransaction($name);
        //$this->data['playersholding'] = $this->player->getPlayerTransaction($name);
        $this->data['user'] = $name;
        $this->data['title'] = 'Player\'s Profile';
        $this->render();
    }


}
