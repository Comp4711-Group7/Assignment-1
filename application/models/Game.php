<?php

class Game extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('stock');
        $this->load->model('user');
    }

    public function getStatus() {
        $xml = simplexml_load_file('http://bsx.jlparry.com/status');

        $round = $xml->round;
        $state = $xml->state;
        $countdown = $xml->countdown;

        if($state == 0) {
            $message =  "Game is not running";
        } elseif($state == 1) {
            $message =  "Game is in setup mode";
        } elseif($state == 2) {
            $message = "Game is ready!";
        } elseif($state == 3) {
            $message = "Game is active";
        } else {
            $message = "The current round is over";
        }

        $status = array("round"=>$round,"state"=>$state,"countdown"=>$countdown,"message"=>$message);

        return array($status);
    }

    public function getStocks(){
        return $this->stock->getStocks('http://bsx.jlparry.com/data/stocks');
    }

}