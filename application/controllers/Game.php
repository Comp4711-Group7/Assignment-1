<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->load->model('player');
        $this->data['pagebody'] = 'game';	// this is the view we want shown
        $this->data['title'] = 'Game Page';
        $this->render();
    }
}