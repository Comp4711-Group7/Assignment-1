<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends Application
{

    function __construct()
    {
        parent::__construct();
        $this->restrict(array(ROLE_USER));
        $this->load->model('game');
        $this->load->library('session');
    }

    public function index() {
        $this->data['pagebody'] = 'game';	// this is the view we want shown
        $this->data['title'] = 'Game Page';
        $this->data['gameStatus'] = $this->game->getStatus();
        $this->register($this->data['gameStatus']);
        $this->data["stocks"] = $this->game->getStocks();
        $this->render();
    }
<<<<<<< HEAD
    
    public function purchase() {
        
    }
=======

    private function register($status){
        if($status[0]["state"] == 3 || $status[0]["state"] == 4){
           $this->game->register("http://bsx.jlparry.com/register", "tuesday");
        }
    }

    public function buy(){
        $code = $this->input->post('code');
        $quantity = $this->input->post('quantity');
        $this->game->buy($code, $quantity);
    }

>>>>>>> e48797103a4be0d8a848cb8eaf68bc0582c60254
}