<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends Application
{
    public $xml = null;
    public $state;
    public $round;

    function __construct()
    {
        parent::__construct();
        $this->xml = simplexml_load_file('http://bsx.jlparry.com/status');
        $this->getStatus();
    }

    public function index() {
        $this->load->model('player');
        $this->data['pagebody'] = 'game';	// this is the view we want shown
        $this->data['title'] = 'Game Page';
        $this->render();
    }

    public function getStatus() {
        $this->round = $this->xml->round;
        $this->state = $this->xml->state;
    }
}