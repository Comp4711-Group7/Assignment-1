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

    public function index()
    {
        $this->data['pagebody'] = 'game';    // this is the view we want shown
        $this->data['title'] = 'Game Page';
        $this->data['gameStatus'] = $this->game->getStatus();
        $this->data['currentPlayer'] = $this->game->getCurrentPlayer();
        $this->data['holdings'] = $this->game->getPlayerHoldings();
        $this->data['trend'] = $this->game->getTrend();
        $this->register($this->data['gameStatus']);
        $this->data["stocks"] = $this->game->getStocks();
        $this->data["message"] = $this->session->flashdata('item');
        $this->data["flag"] = $this->session->flashdata('flag');
        $this->render();
    }

    private function register($status)
    {
        if ($status[0]["state"] == 3 || $status[0]["state"] == 4) {
            $this->game->register(BSX_SERVER."register", "tuesday");
        }
    }

    public function buy(){
        $status = $this->game->getStatus();
        if($status[0]["state"] == 3 || $status[0]["state"] == 4) {
            $this->session->set_flashdata('item', 'Successfully bought Stock');
            $this->session->set_flashdata('flag', 'alert-success');
            $code = $this->input->post('code');
            $quantity = $this->input->post('quantity');
            $this->game->buy($code, $quantity);
        }else{
            $this->session->set_flashdata('item', 'Game is Close');
            $this->session->set_flashdata('flag', 'alert-danger');
        }

        redirect('/games');
    }

    public function sell()
    {
        $message = "";
        $status = $this->game->getStatus();
        if($status[0]["state"] == 3 || $status[0]["state"] == 4) {
            $this->session->set_flashdata('item', 'Successfully sold Stock');
            $this->session->set_flashdata('flag', 'alert-success');
            $code = $this->input->post('code');
            $quantity = $this->input->post('quantity');
            $token = $this->input->post('token');
            $message = $this->game->sell($code, $quantity, $token);
            var_dump($message);
        }else{
            $this->session->set_flashdata('item', 'Game is Close');
            $this->session->set_flashdata('flag', 'alert-danger');
        }

        if($message->message){
            $this->session->set_flashdata('item', (string)$message->message);
            $this->session->set_flashdata('flag', 'alert-danger');
        }
        redirect('/games');
    }
}