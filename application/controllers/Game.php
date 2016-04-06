<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends Application
{
    public $xml = null;
    private $state;
    private $round;
    private $countdown;

    function __construct()
    {
        parent::__construct();
        $this->getStatus();
        $this->checkRound();
    }

    public function index() {
        $this->load->model('player');
        $this->data['pagebody'] = 'game';	// this is the view we want shown
        $this->data['title'] = 'Game Page';
        $this->render();
    }

    // Populates data memebers with current status from BSX server
    public function getStatus() {
        $this->xml = simplexml_load_file('http://bsx.jlparry.com/status');

        $this->round = $this->xml->round;
        $this->state = $this->xml->state;
        $this->countdown = $this->xml->countdown;
    }

    // Checks what state the server is in, then takes an action depending on that state
    public function checkRound() {
        // Ensure the status is up to date before preforming any action
        $this->getStatus();
        $state = $this->getState();
        if($state == 0) {
            echo "Game is not running";
        } elseif($state == 1) {
            echo "Game is in setup mode";
        } elseif($state == 2) {
            echo "Game is ready!";
        } elseif($state == 3) {
            echo "Game is active";
        } else {
            echo "The current round is over";
        }
    }

    public function getState() {
        return $this->state;
    }
}