<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends Application
{
    function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('userRole') == 'admin')
        {
            redirect('auth'); // the user is not logged in, redirect them!
        }
    }

    public function index() {
        $this->load->model('player');
        $this->data['pagebody'] = 'management';	// this is the view we want shown
        $this->data['title'] = 'Agent Management';
        $this->render();
    }
}