<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends Application
{
    function __construct()
    {
        parent::__construct();
        $this->restrict(array(ROLE_ADMIN));
    }

    public function index() {
        $this->load->model('player');
        $this->data['pagebody'] = 'management';	// this is the view we want shown
        $this->data['title'] = 'Agent Management';
        $this->render();
    }
}