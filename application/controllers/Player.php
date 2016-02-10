<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {


    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pagebody'] = 'players';	// this is the view we want shown
        $this->render();
    }
}
