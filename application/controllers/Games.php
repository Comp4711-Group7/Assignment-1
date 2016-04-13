<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends Application
{
    public $xml = null;
    private $state;
    private $round;
    private $countdown;

    function __construct()
    {
        parent::__construct();
        $this->restrict(array(ROLE_USER));
        $this->load->model('game');
    }

    public function index() {
        $this->data['pagebody'] = 'game';	// this is the view we want shown
        $this->data['title'] = 'Game Page';
        $this->data["stocks"] = $this->game->getStocks();
        $this->render();
    }
    
    public function purchase() {
        
    }
}